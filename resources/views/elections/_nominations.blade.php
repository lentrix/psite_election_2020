@if(auth()->user()->nominated_at)

    <p class="alert alert-info">
        You are already placed your nomination.
    </p>

    <h3>Your Nomination</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Institution</th>
                <th>Total Nominations</th>
            </tr>
        </thead>
        <tbody>
            @foreach(auth()->user()->nominations($election->id) as $nomination)
            <tr>
                <td>{{$nomination->nominatedUser->lname}}, {{$nomination->nominatedUser->fname}}</td>
                <td>{{$nomination->nominatedUser->institution}}</td>
                <td>{{$nomination->nominatedUser->nominationCount($election->id)}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else

    <h3>List of Active Members for Nomination</h3>

    <div class="alert alert-info">
        We are currently in NOMINATION state. Please make your nominations by
        clicking on the checkbox beside the name of the person you wish to nominate. <br>
        After checking all the nominees, click on the 'Submit Nomination' button to proceed with
        the nomination. <br>
        <span class="text-danger bg-success">You can only nominate up to ({{$election->no_of_candidates}}) people.</span>
    </div>

    {!! Form::open(['url'=>'/election/nominate','method'=>'post']) !!}

    {{Form::hidden('election_id', $election->id)}}

    <table class="table table-bordered table-striped">
        <thead>
            <tr class="text-center">
                <th>&#10004;</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Institution</th>
                <th>Designation</th>
            </tr>
        </thead>
        <tbody>
            @foreach(\App\User::active() as $user)
            <tr>
                <td class="text-center">
                    {{Form::checkbox("check[]",$user->id,null,['class'=>'checker'])}}
                </td>
                <td>{{$user->lname}}</td>
                <td>{{$user->fname}}</td>
                <td>{{$user->institution}}</td>
                <td>{{$user->designation}}</td>
            </tr>
            @endforeach
        </tbody>

    </table>
    <p id="warning" class="alert alert-warning" style="display: none">
        The submit button is disabled because you are over the limit of {{$election->no_of_candidates}} nominations.
    </p>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-lg" id="submit">Submit Nomination</button>
        <button type="reset" class="btn btn-secondary btn-lg" id="clear">Clear</button>
    </div>

@endif

{!! Form::close() !!}
