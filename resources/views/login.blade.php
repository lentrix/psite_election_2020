@extends('main')

@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <h3>User Login</h3>
            </div>
            {!! Form::open(['url'=>'/login','method'=>'post']) !!}
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4 d-flex align-items-center">
                        <img src="{{asset('images/user_avatar.png')}}"
                            alt="user" style="width: 100%"
                            class="mt-auto mb-auto">
                    </div>

                    <div class="col-sm-8">

                        <div class="form-group">
                            {{Form::label('email',null,['class'=>'form-label'])}}
                            {{Form::email('email',session('email')?session('email'):null,['class'=>'form-control'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('password',null,['class'=>'form-label'])}}
                            {{Form::password('password',['class'=>'form-control'])}}
                        </div>

                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary btn-lg" type="submit">Login</button>
            </div>
            {!! Form::close() !!}
        </div>
        <div style="margin-top: 20px">
            Can't access your account? <a href="{{url('/recovery')}}" class="link">Click here</a> to recover your password.
        </div>
    </div>
</div>


@stop
