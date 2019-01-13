<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Books')</title>
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/main-theme.css') }}">
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{url('/')}}">Welcome</a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row main-body">
        <div class="col-md-3 col-sm-3">
            @if ($message = Session::get('user_id'))
            <div class="list-group list-group-css">
                <a href="{{ url('/book') }}" class="list-group-item"><span class="glyphicon glyphicon-dashboard text-primary"></span> Dashboard</a>
            </div>
            <div class="list-group list-group-css">
                <a href="{{ url('/my-book') }}" class="list-group-item"><span class="glyphicon glyphicon-book text-primary"></span> My Books</a>
            </div>
            <div class="list-group list-group-css">
                <a href="/user/{{ request()->session()->get('user_id') }}" class="list-group-item"><span class="glyphicon glyphicon-user text-primary"></span> Hy {{ request()->session()->get('user_name') }}</a>
            </div>
            <div class="list-group list-group-css">
                <a href="{{ url('/logout') }}" class="list-group-item"><span class="glyphicon glyphicon-log-out text-primary"></span> Logout</a>
            </div>
            @else
                <div class="list-group list-group-css">
                    <a href="{{ url('/') }}" class="list-group-item"><span class="glyphicon glyphicon-pencil text-primary"></span> Home</a>
                </div>
                <div class="list-group list-group-css">
                    <a href="{{ url('/login') }}" class="list-group-item"><span class="glyphicon glyphicon-log-in text-primary"></span> Log in</a>
                </div>
                <div class="list-group list-group-css">
                    <a href="{{ url('/user/create') }}" class="list-group-item"><span class="glyphicon glyphicon-user text-primary"></span> Create new account</a>
                </div>
            @endif
        </div>
        <div class="col-sm-9 col-md-9">

            @yield('breadcrumb')

            <div class="well">

                @include('flash-message')

                @yield('content')

            </div> <!-- /.well -->

        </div> <!-- /.col-sm-9 col-md-9 -->
    </div> <!-- /.row main-body -->
    <hr>
    <p>Copyright © 2019 - All Rights Reserved.</p>
</div> <!-- /.container -->
<script src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
</body>
</html>