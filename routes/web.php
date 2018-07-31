<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@getNews');
    

    //Authentication Module (AuthController)
    Route::get('register/{id?}', 'AuthController@accessRegister');
    Route::post('register', 'AuthController@doRegister');

    Route::get('login', 'AuthController@accessLogin');
    Route::post('login', 'AuthController@doLogin');

    Route::get('logout', 'AuthController@doLogout');
    Route::post('logout', 'AuthController@doLogout');

    //ACP Module (ACPController)
    Route::get('account', 'ACPController@accessACP');

    Route::get('account/changepass', 'ACPController@accessChangePass');
    Route::post('account/changepass', 'ACPController@doChangePass');

    Route::get('account/addauth', 'ACPController@AccessAuth');
    Route::get('account/removeauth', 'ACPController@AccessRemAuth');
    
    Route::get('account/setauth', 'ACPController@doEnableAuth');
    Route::post('account/removeauth', 'ACPController@doDisableAuth');

    //Vote Module (VPController)
    Route::get('account/vote', 'VPController@accessVP');

    //Donate Module (DController)
    //Store Module (SController)
    //Boosts Module (BoostController)

    //DB Controlled Pages (PageController)
    Route::get('page/{page}', 'PageController@getPage');

    //apply 
    Route::get('apply/QA', 'ApplicationFormController@accessQAForm');
    Route::get('apply/Dev', 'ApplicationFormController@accessDevForm');
    //Route::get('apply/GM', 'ApplicationFormController@accessGMForm');
    Route::post('apply/QA', 'ApplicationFormController@doSubmitQAForm');
    Route::post('apply/Dev', 'ApplicationFormController@doSubmitDevForm');
    //Route::post('apply/GM', 'ApplicationFormController@doSubmitGMForm');
    Route::get('apply', 'ApplicationFormController@accessApply');

    //BugTracker
    Route::get('issues', 'TrackerController@getAllIssues');
    Route::get('issues/new', 'TrackerController@accessNewIssue');
    Route::post('issues/new', 'TrackerController@submitNewIssue');
    Route::get('issues/{id}', 'TrackerController@getIssue');

    //AdminCP
    
    //GMPanel
    
    Route::get('gmpanel', 'GMController@accessPanel');
    
    Route::get('gmpanel/ban', 'GMController@accessBan');
    Route::post('gmpanel/ban', 'GMController@doBan');
    
    Route::get('gmpanel/info', 'GMController@accessInfo');
    Route::post('gmpanel/info', 'GMController@doShowInfo');
    
    Route::get('gmpanel/tickets', 'GMController@accessTickets');
    Route::post('gmpanel/tickets', 'GMController@doShowTickets');
    
    
    
    //bugs
    Route::get('bugs/report', 'ApplicationFormController@accessBugForm');
    Route::post('bugs/report', 'ApplicationFormController@doReportBug');
