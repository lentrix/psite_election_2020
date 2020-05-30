<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <title>PSITE Central Visayas | Convention Manager</title>
</head>
<body>

    @include('navbar')

    @if (session('Error'))
        <div class="alert alert-danger">
            <div class="container">
                {{ session('Error') }}
            </div>
        </div>
    @endif

    @if (session('Info'))
        <div class="alert alert-info">
            <div class="container">
                {{ session('Info') }}
            </div>
        </div>
    @endif

    @if(session('errors'))
        <div class="alert alert-danger">
            <div class="container">
                Please fix the following errors
                <ul>
                    @foreach(session('errors')->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="container">
        <br>
        @yield('content')

    </div>

    @yield('scripts')

</body>
</html>
