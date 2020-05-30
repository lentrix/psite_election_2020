@extends('main')

@section('content')

<h1>Election</h1>

@if(!$election)

<div class="alert alert-warning">
    <h3>Sorry there is currently no active election.</h3>
    <p>We will inform you through email when the nomination process will start.</p>
</div>

@endif

@if($election->status == 'nomination')



@endif

@stop
