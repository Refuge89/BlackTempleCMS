<?php use App\Libraries\CMSHelper; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Black Temple - @yield('title')</title>
    <link href='https://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
    <link href="{{ Config::get('app.url') }}css/style.css" rel="stylesheet">
    @yield('includes')
</head>
<body>
<div id="header-vid">
    <video autoplay loop id="vid">
        <source src="{{ Config::get('app.url') }}movie/header-illidan.mp4" type="video/mp4">
        <source src="{{ Config::get('app.url') }}movie/header-illidan.webm" type="video/webm">
        Your browser does not support the video tag.
    </video>
</div>


<div id="nav">
    <div class="container">
        <div id="logo">
            <a href="/"><img src="{{ Config::get('app.url') }}images/logo.png"></a>
        </div>
        <div class="right">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="http://forums.black-temple.org">Forums</a></li>
                <li><a href="/page/how-to-connect">How To Connect</a></li>
                <li><a href="/apply">Apply</a></li>
                @if (!Session::has('username'))
                    <li><a href="/register">Register</a></li>
                    <li><a href="/login">Log In</a></li>
                @else
                    <li><a href="/account">Account Panel</a></li>
                    <li><a href="/logout">Log Out</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>

<div class="video-overlay">
    <div class="container">
        <div class="right">
            <div class="info-box">
                <h1>Welcome to <span>The Black Temple</span></h1>
                <p>You are not prepared,<br/>
                    to experience a 2.4.3 blizzlike realm with quality unseen.<br/><br/>

                    Developed with care, perfection and pristine quality as an ultimate goal, we will not stop at decent or good enough.
                    We know very well that the small things play a big role in the experience as a whole, which is why we have a lot of focus on just that,
                    the small things.<br/><br/>

                    What are you waiting for? Join the fight against the armies of Illidan and recreate your favorite memories today.
                </p>
            </div>
        </div>
    </div>
</div>