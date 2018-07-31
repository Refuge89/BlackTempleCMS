@extends('layouts.default')

@section('title')
    QA Team Application
@stop

@section('body')
    <h2>Apply For QA Team</h2>
    @include('includes.err_message')
    <form method="POST" action="/apply/QA" class="no-p-mar">
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
            <p>Discord/Skype</p>
            <input type="text" name="discord"><br><br>
            <p>Preferred Content</p>
            <select name ="content_type">
                <option value="general">General</option>
                <option value="instances">Instances</option>
                <option value="outlands">Outlands</option>
                <option value="vanilla">Vanilla</option>
            </select><br><br><br><br><br>
        </div>
        <div>
            <p style="float:right;margin-top:25px;">Experience with TBC</p>
            <textarea name="experience" ></textarea><br><br>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div><input style="margin-left:350px;" type="submit" value="Submit"/></div>
    </form>
@stop
