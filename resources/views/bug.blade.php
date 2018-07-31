@extends('layouts.default')

@section('title')
    Bug Report
@stop

@section('body')
    <h2>Report An Issue</h2>
    @include('includes.err_message')
    <form method="POST" action="/bugs/report" class="no-p-mar">
        <p>Bug Title</p><br>
        <input type="text" style="width:97%" name="bugtitle"><br><br>
        <p>Type Of Bug</p><br>
        <select name="bugtype">
            @foreach($milestoneArray as $milestoneName => $milestoneIndex)
            <option value= "{{$milestoneIndex}}" >{{ $milestoneName }}</option>
            @endforeach
        </select><br><br><br>
        <p>Explain what the bug is and what it should be doing.</p><br>
        <textarea name="report" ></textarea><br><br>
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div><input style="margin-left:350px;" type="submit" value="Submit"/></div>
    </form>
@stop

@section('bottomjs')
@stop
