<?php

namespace App\Http\Controllers;

use DB;
use Request;
use Redirect;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Auth;

class PageController extends Controller
{
    public function getPage($page)
    {
        $page = DB::table('pages')->where('URL',$page)->first();

        if (!$page)
            return '404'; //return something better lol

        return view('page', ['page' => $page]);
    }
}