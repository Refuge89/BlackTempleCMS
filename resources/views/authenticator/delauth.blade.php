@extends('themes.default.template')

@section('title')
    Authenticator Information
@stop

@section('body')
    <h2>Authenticator Removal</h2>
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
            @endif
        @endforeach
    </div>

    {!! Form::open(array('url' => 'account/removeauth')) !!}

    {!! Form::label('secretkey', 'Your Auth Key') !!} <br>
    {!! Form::text('secretkey') !!}<br><br>

    {!! Form::submit('Remove') !!}<br><br>
    {!! Form::close() !!}


@stop