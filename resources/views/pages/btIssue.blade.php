@extends('layouts.tracker')

<?php use App\Libraries\TrackerLib; ?>

@section('title')
    Issue Tracker
@stop

@section('body')
    <h2>{{$issue->title}}</h2>
    <div id="trackerbody">
       <p>{!! $issue->description !!}</p>
    </div>

@stop