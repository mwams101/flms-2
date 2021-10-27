@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center mt-5">
        <img src="{{ asset('img/soccer.png') }}" width="10%" height="20%">
        <h1>Welcome to FLMS</h1>

        <p>This is the laravel appliciation from team meny</p>

        <div class="row justify-content-center">
            <div class="trumbowyg-button-group">
                <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Login</a>
                <a class="btn btn-success btn-lg" href="{{ route('register') }}" role="button">Register </a>
            </div>
        </div>
    </div>
@endsection

