<?php

namespace App\Http\Controllers;

use DB;
use Request;
use Redirect;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Auth;

class TrackerController extends Controller
{
    public function getAllIssues()
    {
        $issues = DB::table('bt_issues')->orderBy('updated', 'desc')->simplePaginate(20);
        return view('pages.tHome', ['issues' => $issues]);
    }

    public function getIssue($id)
    {
        $issue = DB::table('bt_issues')->where('id', $id)->first();
        return view('pages.btIssue', ['issue' => $issue]);
    }

    public function getAllIssuesSortedBy($column, $dir)
    {

    }

    public function accessNewIssue()
    {
        if(Session::has('Username'))
            return view('tNewIssue');
        else
            Redirect::to('/login');
    }

    public function submitNewIssue()
    {

    }
}