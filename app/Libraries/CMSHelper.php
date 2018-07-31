<?php

namespace App\Libraries;

use DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class CMSHelper
{
    public static function getOnlinePlayers()
    {
        if(!Cache::has('playercount'))
        {
            $count = (string)DB::connection('chardb')->table('characters')->where('online', '1')->count();
            Cache::put('playercount', $count, 2);
        }

        return Cache::get('playercount');
    }
    
    public static function getServerStatus()
    {
        try{
            if(fsockopen("logon.black-temple.org", 8085))
                echo "<p id = \"online\">ONLINE";
        } catch (\Exception $e) {
            echo "<p id = \"offline\">OFFLINE";
        }
    }

    public static function hasAuthenticatorKey()
    {

        $key = DB::connection('authdb')->table('account')->where('username', Session::get('username'))->value('tokenKey');

        if (!$key)
            $key = "";

        $result = ((empty($key)) ? false : true);

        return $result;
    }

    public static function getAuthenticatorKey()
    {
        
        $key = DB::connection('authdb')->table('account')->where('username', Session::get('username'))->value('tokenKey');
        
    }

}
