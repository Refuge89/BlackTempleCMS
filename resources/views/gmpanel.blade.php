@extends('layouts.default')

@section('title')
    GM Panel
@stop

@section('body')
    <h2>Gamemaster Panel</h2>
    @include('includes.err_message')
    <div id="accountpcontent_left">
        <ul class="accpanel">
            <a href="#"><div id="accountbutton"><li>Ban User</li></div></a>
            <a href="#"><div id="accountbutton"><li>View Tickets</li></div></a>
            <a href="#"><div id="accountbutton"><li>View Player Inventory</li></div></a>
        </ul>
    </div>
    <div id="accountpcontent_right">
        <ul class="accpanel">
            <a href="#"><div id="accountbutton"><li>Show Server Info</li></div></a>
            <a href="#"><div id="accountbutton"><li>Placeholder</li></div></a>
            <a href="#"><div id="accountbutton"><li>Placeholder</li></div></a>
        </ul>
    </div>
@stop