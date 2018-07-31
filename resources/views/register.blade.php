@extends('layouts.default')

@section('title')
    Register
@stop

@section('body')
    <h2>Register</h2>
    @include('includes.err_message')

    {!! Form::open(array('url' => '/register')) !!}

    <div id="leftside">
        {!! Form::label('username', 'Username') !!}<br><br>
        {!! Form::text('username') !!}<br><br>

        {!! Form::label('password', 'Password') !!}<br><br>
        {!! Form::password('password') !!}<br><br>

        {!! Form::label('password2', 'Repeat Password') !!}<br><br>
        {!! Form::password('password2') !!}<br><br>
    </div>

    <div id="rightside">
        {!! Form::label('email', 'Email') !!}<br><br>
        {!! Form::email('email') !!}<br><br>
        {!! Form::label('forumname', 'Forum Name') !!}<br><br>
        {!! Form::text('forumname') !!}<br><br>
    </div>

    {!! Form::submit('Register', array('id' => 'button')) !!}
    {!! Form::close() !!}

@stop

