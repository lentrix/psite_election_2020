@extends('main')

@section('content')

<h1>Confirm Your Nomination</h1>

{!! Form::open(['url'=>'/election/nominate/confirm','method'=>'post']) !!}
{{Form::hidden('election_id', $election->id)}}
<p class="alert alert-info">
    You have nominated the following people:
    <ul style='font-size: 1.5em'>
        @foreach($nominees as $nominee)
        {{Form::hidden('nominee[]',$nominee->id)}}
        <li>{{$nominee->lname}}, {{$nominee->fname}} | {{$nominee->institution}}</li>
        @endforeach
    </ul>
</p>
<p>
    <button type="submit" class="btn btn-primary btn-lg">Confirm Nomination</button>
</p>
{!! Form::close() !!}

@stop
