@extends('layouts.default')

@section('title')
    Login
@stop

@section('body')
    <h2>Login</h2>

    @include('includes.err_message')

    {!! Form::open(array('url' => '/login')) !!}

        {!! Form::label('username', 'Username:') !!} <br>
        {!! Form::text('username') !!}<br><br>

        {!! Form::label('password', 'Password:') !!}<br>
        {!! Form::password('password') !!}<br><br>

        {!! Form::submit('Login') !!}<br><br>
    {!! Form::close() !!}
@stop