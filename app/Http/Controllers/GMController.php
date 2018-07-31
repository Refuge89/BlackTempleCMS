<?php

namespace App\Http\Controllers;

use Redirect;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class GMController extends Controller
{

    public function canAccessPanel()
    {
        if(!Session::has('username'))
            Redirect::to('/login');
        
       $rank = DB::connection('authdb')->table('account')->where('username', Session::get('username'))->value('gmlevel');

        if (!$rank)
            $rank = 0;
        
        $result = (($rank >= 2) ? true : false);
        
        return $result;
    }
    
    public static function isLoggedIn()
    {
        
        
    }
    
    public function accessPanel()
    {
        if(self::canAccessPanel())
            return view('gmpanel');
        else
        {
            Session::flash('alert-danger', 'You must be a GM to access this panel!');
            return Redirect::to("/account");
        }
    }
    
    public function accessBan()
    {
        
    }
    
    public function accessInfo()
    {
        
    }
    
    public function accessTickets()
    {
        
    }
    
    public function doBan()
    {
        
    }
    
    public function doShowInfo()
    {
        
    }
    
    public function doShowTickets()
    {
        
    }
}