@extends('layout')

@section('title', 'Login')

@section('content')
    <h1>Login</h1>

    <form action="/login" method="post">
        @csrf
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label>Email</label>
            <input type="text" placeholder="Email" class="form-control" name="email" value="{{ Request::old('email') }}">
        </div>
        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label>Password</label>
            <input type="password" placeholder="Password" class="form-control" name="password">
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-log-in"></span>    Log in</button>
        </div>
    </form>

@endsection