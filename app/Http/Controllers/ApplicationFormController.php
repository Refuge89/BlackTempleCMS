<?php

namespace App\Http\Controllers;

use DB;
use Redirect;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Auth;
use Mail;
use Illuminate\Support\Facades\Input;
use GrahamCampbell\GitHub\Facades\GitHub;

class ApplicationFormController extends Controller
{
    
    private function redirectWithError($error, $redirect)
    {
        Input::flash();
        return Redirect::to($redirect)->withFlashMessage($error);
    }
    
    public function accessQAForm()
    {
        if (Session::has('username'))
            return view('applyqa');
        else
        {
            Session::flash('alert-danger', 'You need to login first');
            return Redirect::to("/login");
        }
            
    }
    
    public function doSubmitQAForm(Request $request)
    {
        $username = Session::get('username');
        
        Input::flash();
        
        $this->validate($request, [
           
            'name' => 'required',
            'age'  => 'required',
            'hours' => 'required',
            'email'  => 'required|email',
            'discord' => 'required',
            'content_type'  => 'required',
            'experience' => 'required'
        ]);
        
        $name = Input::get('name');
        $age = Input::get('age');
        $hours = Input::get('hours');
        $email = Input::get('email');
        $contact = Input::get('discord');
        $content = strtoupper(Input::get('content_type'));
        $paragraph = Input::get('experience');
        
        
        
        $data = array(
                'username' => $username,
                'name'     => $name,
                'age'      => $age,
                'hours'    => $hours,
                'email'    => $email,
                'discord'  => $contact,
                'content'  => $content,
                'text'     => $paragraph
        );
        
        Mail::send('emails.sendqa', $data, function ($message) use ($username) {
            $message->to('applications@black-temple.org')->subject(strtoupper($username) . ' - QA APPLICATION');         
        });
        
            Session::flash('alert-success', 'QA Application Sent!');      
            return Redirect::to('/account');
        
    }
    
    public function accessDevForm()
    {
        
        if (Session::has('username'))
            return view('applydev');
        else
        {
            Session::flash('alert-danger', 'You need to login first');
            return Redirect::to("/login");
        }
    }
    
    public function doSubmitDevForm(Request $request)
    {
        $username = Session::get('username');
        
        Input::flash();
        
        $this->validate($request, [
           
            'name'          => 'required',
            'age'           => 'required',
            'hours'         => 'required',
            'email'         => 'required|email',
            'discord'       => 'required',
            'content_type'  => 'required',
            'about'         => 'required',
            'experience'    => 'required'
        ]);
        
        $name = Input::get('name');
        $age = Input::get('age');
        $hours = Input::get('hours');
        $email = Input::get('email');
        $contact = Input::get('discord');
        $content = strtoupper(Input::get('content_type'));
        $about = Input::get('about');
        $experience = Input::get('experience');
        
        
        
        $data = array(
                'username'      => $username,
                'name'          => $name,
                'age'           => $age,
                'hours'         => $hours,
                'email'         => $email,
                'discord'       => $contact,
                'content'       => $content,
                'about'         => $about,
                'experience'    => $experience
            
        );
        
        Mail::send('emails.senddev', $data, function ($message) use ($username) {
            $message->to('applications@black-temple.org')->subject(strtoupper($username) . ' - DEV APPLICATION');         
        });
        
            Session::flash('alert-success', 'Developer Application Sent!');      
            return Redirect::to('/account');
    }
    
    public function accessGMForm()
    {
        $this->isLoggedIn('applygm');
    }
    
    public function accessApply()
    {
        return view('apply');
    }
    
    public function accessBugForm()
    {
        if (Session::has('username'))
        {
            $milestoneArray = array(
                "HellFire Peninsula"        => 1,
                "Terrokar Forest"           => 2,
                "Zangarmarsh"               => 3,
                "Nagrand"                   => 4,
                "Blade's Edge Mountains"    => 5,
                "Shadowmoon Valley"         => 6,
                "Netherstorm"               => 7,
                "Warlock"                   => 8,
                "Warrior"                   => 9,
                "Shaman"                    => 10,
                "Mage"                      => 11,
                "Paladin"                   => 12,
                "Priest"                    => 13,
                "Druid"                     => 14,
                "Rogue"                     => 15,
                "Karazhan"                  => 16,
                "Hellfire Ramparts"         => 17,
                "Blood Furnace"             => 18,
            );
            
            return view('bug')->with('milestoneArray', $milestoneArray);
        }
        else
        {
            Session::flash('alert-danger', 'You need to login first');
            return Redirect::to("/login");
        }
    }
    
    public function doReportBug(Request $request)
    {
        $username = Session::get('username');
        
        //Input::flash();
        
        $this->validate($request, [
           
            'bugtitle'      => 'required',
            'bugtype'       => 'required',
            'report'        => 'required',
        ]);
        
        $title = Input::get('bugtitle');
        $type = Input::get('bugtype');
        $report = Input::get('report');
        
        $appendedReport = 'Bug Reported By: ' . strtoupper($username) . "\r\n" . $report;
        
        $issueData = array(
            'title'     => $title,
            'body'      => $appendedReport,
            'milestone' => $type,
        );
        
        GitHub::issue()->create('NetherstormTeam', 'IssueTracker', $issueData);
        
        Session::flash('alert-success', 'Bug Report Sent! We appreciate your contribution.');      
        return Redirect::to('/account');
        
    }
}
