@extends('layouts.default')

@section('title')
    Account Panel
@stop

@section('body')
    <h2>Account Panel</h2>
    @include('includes.err_message')

    <h4>Welcome back, {{ Session::get('username') }}.</h4>

    <div id="accountpcontent_left">
        <ul class="accpanel">
            <a href="account/changepass"><div id="accountbutton"><li>Change Password</li></div></a>
            <a href="#"><div id="accountbutton"><li>Placeholder</li></div></a>
            <a href="/bugs/report"><div id="accountbutton"><li>Report A Bug</li></div></a>
            <!-- @if(!\App\Libraries\CMSHelper::hasAuthenticatorKey())
                <a href="/account/addauth"><div id="accountbutton"><li>Enable Authenticator</li></div></a>
            @else
                <a href="/account/removeauth"><div id="accountbutton"><li>Remove Authenticator</li></div></a>
            @endif -->

        </ul>
    </div>
    <div id="accountpcontent_right">
        <ul class="accpanel">
            <a href="#"><div id="accountbutton"><li>Placeholder</li></div></a>
            <a href="#"><div id="accountbutton"><li>Unstuck</li></div></a>
            <a href="/apply"><div id="accountbutton"><li>Apply For Staff</li></div></a>
            <a href="/bugs/report"><div id="accountbutton"><li>Placeholder</li></div></a>
        </ul>
    </div>
@stop