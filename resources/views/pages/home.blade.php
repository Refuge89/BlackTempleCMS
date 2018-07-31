@extends('layouts.default')

@section('title')
    News
@stop

@section('body')
    <img class="newsicon" src="images/icon.png"><div id="outlinebutton"><h4>CHANGES</h4></div><div id="greenbutton"><h4>NEWS ARCHIVE</h4></div><h2>Black Temple <span>News</span></h2>
    @foreach ($posts as $post)
        <div class="post">
            <div class="avatarrow">
                <img src="images/avatar/{{ $post->avatar }}" alt=""/>
                <h5>{{ $post->author }}</h5>
            </div>
            <div class="postrow">
                <div class="title">
                    <h3>{{ $post->title }} <span>{{ $post->added }}</span></h3>
                </div>
                <div class="divider"></div>
                <div class="body">
                    <p>{!! $post->text !!}</p>
                </div>
            </div>
        </div>
    @endforeach
@stop