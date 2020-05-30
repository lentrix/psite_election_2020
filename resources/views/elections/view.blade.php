@extends('main')

@section('content')


@if($election->status!=='closed')
{!! Form::open(['url'=>'/election/status','method'=>'post','style'=>'float: right;']) !!}

{{Form::hidden('id', $election->id)}}
{{Form::hidden('status', $next)}}

<button class="btn btn-primary btn-lg" type="submit">{{$message}}</button>

{!! Form::close() !!}

@endif

<h1>View Election</h1>

@if($election->status=="closed")
<div class="alert alert-info">
    This election is already closed.
    <a href='{{url("/election/$election->id/results")}}' class="link">View Results</a>
</div>
@endif

<div class="row">
    <div class="col-md-6">
        {!! Form::model($election, ['url'=>"/election/$election->id",'method'=>'put']) !!}

        <div class="form-group">
            {{Form::label('title')}}
            {{Form::text('title',null,['class'=>'form-control'])}}
        </div>

        <div class="form-group text-right">
            <button class="btn btn-primary" type="submit">Update Election</button>
        </div>

        {!! Form::close() !!}
    </div>
</div>

@if($election->status=="nomination")

<hr>

<h3>Summary of Nominations</h3>


@endif

@stop
