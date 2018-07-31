<?php

namespace App\Http\Controllers;

use DB;
use Request;
use Redirect;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Auth;

class HomeController extends Controller
{
    public function getNews()
    {
        $posts = DB::table('blog_posts')->orderBy('id','desc')->get();
        return view('pages.home', ['posts' => $posts]);
    }
}