<?php

namespace App\Http\Controllers;

use App\Libraries\CMSHelper;
use DB;
use Redirect;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Auth;
use PragmaRX\Google2FA\Google2FA;


class ACPController extends Controller
{
    public function genericAccessCheck($view)
    {
        if(Session::has('username'))
            return view($view);
        else
            return Redirect::to('/login');
    }

    public function accessACP()
    {
        if(Session::has('username'))
            return view('account');
        else
            return Redirect::to('/login');
    }
    
    public function doChangePass(Request $request)
    {
        $this->validate($request, [
            'passwordold' => 'required',
            'passwordnew' => 'required',
            'passwordnew2' => 'required',
        ]);

        $oldpassword = Input::get('passwordold');
        $newpassword = Input::get('passwordnew');
        $confirmpass = Input::get('passwordnew2');
        $username = Session::get('username');
        
        $sha_pass = strtoupper(sha1(strtoupper($username) . ':' . strtoupper($oldpassword)));

        $account_info = DB::connection('authdb')->table('account')->where('username', $username)->where('sha_pass_hash', $sha_pass)->get();
        
        if($newpassword != $confirmpass)
            return Redirect::to('account/changepass')->withFlashMessage('Your passwords did not match.');
        
        if($account_info)
        {
            $new_sha_pass = strtoupper(sha1(strtoupper($username) . ':' . strtoupper($newpassword)));
            DB::connection('authdb')->table('account')->where('username', $username)->update(['sha_pass_hash' => $new_sha_pass]);

            $salt = '';

            for ($i = 0; $i < 30; $i++)
            {
                $salt .= chr(rand(33, 126));
            }

            $newpass = md5($newpassword);
            $vbPass = md5($newpass . $salt);

            DB::connection('forumdb')->table('user')->where('username', $username)->update(['password' => $vbPass, 'salt' => $salt]);

            return Redirect::to('/account')->withFlashMessage('Password changed successfully.');
        }
        else
        {
            return Redirect::to('account/changepass')->withFlashMessage("Old password incorrect.");
        }
    }
    
    public function accessChangePass()
    {
        self::genericAccessCheck('changepass');
    }

    public function accessAuth()
    {
        return view('auth.auth');
    }

    public function accessRemAuth()
    {
        if(CMSHelper::hasAuthenticatorKey())
        {
            return view('auth.delauth');
        }
        else
        {
            Session::flash('alert-danger', 'You must have authentication enabled to remove it!');
            return Redirect::to("/account");
        }

    }

    public function doEnableAuth()
    {
        $google2fa = new Google2FA();

        $secretKey = $google2fa->generateSecretKey(32);
        
        DB::connection('authdb')->table('account')->where('username', strtoupper(Session::get('username')))->update(['tokenKey' => $secretKey]);
        $email = DB::connection('authdb')->table('account')->where('username', strtoupper(Session::get('username')))->value('email');

        $google2fa_url = $google2fa->getQRCodeGoogleUrl('BlackTemple', $email , $secretKey);

        return view('auth.newauth', ['key' => $secretKey, 'qrURL' => $google2fa_url]);

    }

    public function doDisableAuth(Request $request)
    {
        $this->validate($request, [
            'secretkey' => 'required',
        ]);
        
        $providedKey = Input::get('secretkey');
        $key = DB::connection('authdb')->table('account')->where('username', strtoupper(Session::get('username')))->value('tokenKey');
        
        if(strcmp($key, $providedKey) == 0)
        {
            DB::connection('authdb')->table('account')->where('username', strtoupper(Session::get('username')))->update(['tokenKey' => ""]);
            Session::flash('alert-success', 'You have removed the authenticator!');
            return Redirect::to('/account');
        }
        else
        {
            Session::flash('alert-danger', 'You entered the incorrect key!');
            return view('auth.delauth');
        }
    }
}