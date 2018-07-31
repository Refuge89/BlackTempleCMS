@extends('layouts.default')

@section('title')
    Change Password
@stop

@section('body')
    <h2>Change Account Password</h2>
    @include('includes.err_message')
    <form method="POST" action="/changepass" class="no-p-mar">

        <p>Old Password</p>
        <input type="password" id="password_old" name="passwordold"><br><br>

        <p>New Password</p>
        <input type="password" id="password_new" name="passwordnew"><br><br>
        <p>Confirm Password</p>
        <input type="password" id="password_verify" name="passwordnew2"><br><br>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" value="Change"/>
    </form>
@stop

