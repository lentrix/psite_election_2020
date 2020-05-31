@extends('main')

@section('content')

<h1>@if($election) {{strtoupper($election->status)}} @else No Active Election @endif</h1>

@if(!$election)

<div class="alert alert-warning">
    <h3>Sorry there is currently no active election.</h3>
    <p>We will inform you through email when the nomination process will start.</p>
</div>

@endif

@if($election)
    @if($election->status == 'nomination')

        @include('elections._nominations')

    @endif
@endif

@stop


@section('scripts')

<script>
    var count = 0;
    $(document).ready(function(){
        $(".checker").click(function(){
            if($(this).is(":checked")) {
                count++;
            }else {
                count--;
            }

            if(count>{{$election ? $election->no_of_candidates : 0}}) {
                $("#submit").prop("disabled", true);
                $("#warning").show();
            }else{
                $("#submit").prop("disabled", false);
                $("#warning").hide();
            }
        })
        $("#clear").click(function(){
            count = 0;
            $("#submit").prop("disabled", false);
            $("#warning").hide();
        })
    })
</script>

@stop
