@extends('main')

@section('content')

<h1>User Registration</h1>
<hr>

{!! Form::open(['url'=>'/register','method'=>'post']) !!}

<div class="form-group row">

    <div class="col-md-6">
        <div style="font-style: italic; color: #888; margin-bottom: 20px">
            Fields marked with (*) are required.
        </div>
        <div class="form-group row">
            {{Form::label('username','Username*',['class'=>'col-sm-3 col-form-label'])}}
            <div class="col-sm-9">
                {{Form::text('username',null,['class'=>'form-control'])}}
            </div>
        </div>

        <div class="form-group row">
            {{Form::label('password','Password*',['class'=>'col-sm-3 col-form-label'])}}
            <div class="col-sm-9">
                {{Form::password('password',['class'=>'form-control'])}}
            </div>
        </div>

        <hr>

        <div class="form-group row">
            {{Form::label('lname','Last Name*',['class'=>'col-sm-3 col-form-label'])}}
            <div class="col-sm-9">
                {{Form::text('lname',null, ['class'=>'form-control'])}}
            </div>
        </div>
        <div class="form-group row">
            {{Form::label('fname','First Name*',['class'=>'col-sm-3 col-form-label'])}}
            <div class="col-sm-9">
                {{Form::text('fname',null, ['class'=>'form-control'])}}
            </div>
        </div>
        <div class="form-group row">
            {{Form::label('email','Email*',['class'=>'col-sm-3 col-form-label'])}}
            <div class="col-sm-9">
                {{Form::email('email',null, ['class'=>'form-control'])}}
            </div>
        </div>
        <div class="form-group row">
            {{Form::label('institution','Institution',['class'=>'col-sm-3 col-form-label'])}}
            <div class="col-sm-9">
                {{Form::text('institution',null, ['class'=>'form-control'])}}
            </div>
        </div>
        <div class="form-group row">
            {{Form::label('designation','Designation',['class'=>'col-sm-3 col-form-label'])}}
            <div class="col-sm-9">
                {{Form::text('designation',null, ['class'=>'form-control'])}}
            </div>
        </div>
        <div class="form-group row">
            {{Form::label('phone','Phone',['class'=>'col-sm-3 col-form-label'])}}
            <div class="col-sm-9">
                {{Form::text('phone',null, ['class'=>'form-control'])}}
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-lg float-right">&#10004; Register</button>
        </div>
    </div>

</div>

{!! Form::close() !!}

@stop
