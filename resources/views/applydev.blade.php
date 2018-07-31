@extends('layouts.default')

@section('title')
    QA Team Application
@stop

@section('body')
    <h2>Apply For The Dev Team</h2>
    @include('includes.err_message')
    <form method="POST" action="/apply/Dev" class="no-p-mar">
        <div id="leftside">
            <p>Name</p>
            <input type="text" name="name"><br><br>
            <p>Age</p>
            <input type="text" name="age"><br><br>
            <p>Hours To Devote</p>
            <input type="text" name="hours"><br><br>
        </div>
        <div id="rightside">
            <p>Email</p>
            <input type="email" name="email"><br><br>
            <p>Skype</p>
            <input type="text" name="discord"><br><br>
            <p>Developer Type</p>
            <select name ="content_type">
                <option value="database">Database</option>
                <option value="core">Core</option>
            </select><br><br><br><br><br>
        </div>
        <div>
            <p style="float:right;margin-top:25px;">Tell us about yourself</p>
            <textarea name="about" ></textarea><br><br>
        </div><br><br>
        <div>
            <p style="text-align:center;">How can you help the project?</p><br>
            <textarea name="experience" ></textarea><br><br>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div><input style="margin-left:350px;" type="submit" value="Submit"/></div>
    </form>
@stop

@section('bottomjs')
@stop
