@extends('main')

@section('content')

<h1>Create Election</h1>

<div class="row">

    <div class="col-md-6">
        {!! Form::open(['url'=>'/election','method'=>'post']) !!}

        <div class="form-group">
            {{Form::label('title')}}
            {{Form::text('title',null,['class'=>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('status')}}
            {{Form::select('status',[
                'pending'=>'Pending',
                'nomination'=>'Nomination',
                'election' => 'Election',
        ],null,['class'=>'form-control','placeholder'=>'Select status'])}}
        </div>
        <div class="form-group">
            {{Form::label('no_of_candidates','Number of Candidates')}}
            {{Form::number('no_of_candidates',null,['class'=>'form-control'])}}
        </div>
        <div class="form-group text-right">
            <button class="btn btn-primary" type="submit">Create Election</button>
        </div>

        {!! Form::close() !!}
    </div>
</div>

@stop
