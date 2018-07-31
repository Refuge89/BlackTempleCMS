@extends('layouts.default')

@section('title')
    Staff Applications
@stop

@section('body')
    <h2>Staff Application</h2>
    @include('includes.err_message')
    <div id="accountpcontent_left">
        <ul class="accpanel">
            <div id="accountbutton"><a href="/apply/QA"><li>Become A QA Member</li></a></div>
        </ul>
    </div>
    <div id="accountpcontent_right">
        <ul class="accpanel">
            <div id="accountbutton"><a href="/apply/Dev"><li>Become A Developer</li></a></div>
        </ul>
    </div>
@stop