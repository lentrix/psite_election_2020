@extends('main')

@section('content')

<br>

<div class="jumbotron">
    <h1>Welcome!</h1>
    <p class="lead">
        Welcome to PSITE Central Visayas first ever "Virtual Convention"!
    </p>
    <hr>
    <p>
        The unique virtual endeavor where IT educators and professionals from all over
        Central Visayas and beyond gather together to tackle pressing matters in the
        advancement of IT Education in country and the world.
    </p>
    <p class="lead">
        <a href="{{url('/login')}}" class="btn btn-primary btn-lg">&#10004; User Login</a>
    </p>
</div>


@stop
