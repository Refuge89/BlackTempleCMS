@extends('themes.default.template')

@section('title')
    Authenticator Confirmation
@stop

@section('body')
    <h2>Account Panel</h2>
    <h4>Are you sure you want to enable the authenticator?</h4>

    <div id="accountpcontent_left">
        <ul class="accpanel">
            <a href="setauth"><div id="accountbutton"><li>Yes</li></div></a>
        </ul>
    </div>
    <div id="accountpcontent_right">
        <ul class="accpanel">
            <a href="/account"><div id="accountbutton"><li>No</li></div></a>
        </ul>
    </div>
@stop