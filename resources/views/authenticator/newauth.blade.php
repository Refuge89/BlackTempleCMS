@extends('themes.default.template')

@section('title')
    Authenticator Information
@stop

@section('body')
    <h2>Authenticator Info</h2>
    <br>
    <h3>Please be sure to copy down your key to a place where you won't lose it! You need this key to remove the authenticator from your account!</h3>

    <p>Your key: {{ $key }}</p>
    <br><br><br>

    {{ Html::image($qrURL) }}


@stop