@extends('layout')

@section('title', 'Create new account')

@section('content')
    <h1>Create new account</h1>

    <form action="/user" method="post">
        @csrf
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label>Name</label>
            <input type="text" placeholder="Name" class="form-control" name="name" value="{{ Request::old('name') }}">
        </div>
        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
            <label>Address</label>
            <input type="text" placeholder="Address" class="form-control" name="address" value="{{ Request::old('address') }}">
        </div>
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label>Email</label>
            <input type="text" placeholder="Email" class="form-control" name="email" value="{{ Request::old('email') }}">
        </div>
        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label>Password</label>
            <input type="password" placeholder="Password" class="form-control" name="password">
        </div>
        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label>Confirm Password</label>
            <input type="password" placeholder="Password" class="form-control" name="confirm_password">
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-send"></span>    Submit</button>
        </div>
    </form>

@endsection