@extends('layouts.default')

@section('title')
    {{ $post->title }}
@stop

@section('body')
    <h2 class="blogtitle">{{ $post->title }}</h2>
    <p class="blogsub">Posted by {{ $post->author }} - {{ $post->added }}</p>
    <hr/>
    <p>{!! $post->text !!}</p>
@stop