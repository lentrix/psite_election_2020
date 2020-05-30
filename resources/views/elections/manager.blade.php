@extends('main')

@section('content')

<a href='{{url("/election/member")}}' class="btn btn-primary btn-lg float-right">View as Member</a>

<h1>Election Manager</h1>

@if(!$election)

<div class="alert alert-warning">
    <strong>Sorry!</strong> There is currently no active election. <br>
</div>
<a href="{{url('/election/create')}}" class="btn btn-primary btn-lg">Create Election</a>

@endif

<h3>List of Elections</h3>

<table class="table table-bordered table-striped">
    <thead>
        <th>Title</th>
        <th>Status</th>
        <th>Status Date</th>
    </thead>
    <tbody>
        @foreach($elections as $el)
        <tr>
            <td>
                <a href='{{url("/election/$el->id")}}' class="link">{{$el->title}}</a>
            </td>
            <td>{{$el->status}}</td>
            <td>{{$el->status_at->format('F d, Y g:i:s A')}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop
