<?php

namespace App\Http\Controllers;

use DB;
use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App\Libraries\CMSHelper;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function accessLogin()
    {
        if (Session::has('username'))
            return Redirect::to('/account');
        else
            return view('login');
    }

    public function accessRegister($id = 0)
    {
        if (Session::has('username'))
            return Redirect::to('/account');
        else
            return view('register');
    }

    public function doLogin()
    {
        if (Session::has('username'))
            return Redirect::to('/account');

        $username = Input::get('username');
        $password = Input::get('password');

        $sha_pass = strtoupper(sha1(strtoupper($username) . ':' . strtoupper($password)));

        $account_info = DB::connection('authdb')->table('account')->where('username', $username)->where('sha_pass_hash', $sha_pass)->get();

        if ($account_info)
        {
            Session::put('username', $username);
            return Redirect::to('/account');
        }
        else
        {
            Session::flash('alert-danger', "The information you entered was incorrect.");
            return Redirect::to('/login');
        }
    }

    public function doLogout()
    {
        Session::flush();
        return Redirect::to("/home");
    }

    public function doRegister(Request $request)
    {
        if (Session::has('username'))
            return Redirect::to('/account');
        
        Input::flash();
        
        $this->validate($request, [
            'username'  => 'required',
            'password'  => 'required',
            'password2' => 'required',
            'email'     => 'required|email',
            'forumname' => 'required'
        ]);
        
        $username = Input::get('username');
        $password = Input::get('password');
        $password2 = Input::get('password2');
        $email = Input::get('email');
        $forumname = Input::get('forumname');
        

        if ($password != $password2)
        {
            Session::flash('alert-danger', "Your passwords did not match!");
            return Redirect::to('/register');
        }

        if (DB::connection('authdb')->table('account')->where('username', $username)->orwhere('email', $email)->get())
        {
            Session::flash('alert-danger', "That username or email is already taken!");
            return Redirect::to('/register');
        }
        
        if (DB::connection('forumdb')->table('user')->where('username', $forumname)->get())
        {
            Session::flash('alert-danger', "That forum name is already in use!");
            return Redirect::to('/register');
        }
        

        //Ok to insert
        $shapasshash = strtoupper(sha1(strtoupper($username) . ":" . strtoupper($password)));

        $id = DB::connection('authdb')->table('account')->insertGetId(
            array(
                'username'          => strtoupper($username),
                'sha_pass_hash'     => $shapasshash,
                'email'             => $email,
                'expansion'         => '1',
            )
        );

        //Do the vBulletin shizniz
        $salt = '';

        for ($i = 0; $i < 30; $i++)
        {
            $salt .= chr(rand(33, 126));
        }

        $newpass = md5($password);
        $vbPass = md5($newpass . $salt);

        $id = DB::connection('forumdb')->table('user')->insertGetId(
            array(
                'usergroupid'   => '2',
                'username'      => $forumname,
                'password'      => $vbPass,
                'email'         => $email,
                'joindate'      => time(),
                'salt'          => $salt,
            )
        );
        
        DB::connection('forumdb')->table('userfield')->insert(
            ['userid' => $id, 'temp' => NULL]
        );
        
        DB::connection('forumdb')->table('usertextfield')->insert(
            array(
                'userid'      => $id,
                'subfolders'  => NULL,
                'pmfolders'   => NULL,
                'buddylist'   => NULL,
                'ignorelist'  => NULL,
                'signature'   => NULL,
                'searchprefs' => NULL,
                'rank'        => NULL,
            )
        );
        
        Session::put('username', strtoupper($username));
        return Redirect::to('/account');
    }

    public function accessACP()
    {
        if (Session::has('username'))
        {
            $accid = CMSHelper::getAccountIdByName(Session::get('username'));

            $info = array (
                'dp'    => (string)CMSHelper::getDP(Session::get('username')),
                'vp'    => (string)CMSHelper::getVP(Session::get('username')),
                'rank'  => CMSHelper::getRankString($accid),
            );

            return var_dump($info);
            //return view('account')->with('info', $info);
        }
        else
            return Redirect::to("/login");
    }
}
