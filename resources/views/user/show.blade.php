@extends('layout')

@section('title',request()->session()->get('user_name'));

@section('content')
    <h1>{{ request()->session()->get('user_name') }}</h1>
    <strong>Address : </strong>{{ $user->address }}<br>
    <strong>Email : </strong>{{ $user->email }}<br>
    <strong>Registered at : </strong>{{ $user->created_at->todatestring() }}<br>
    <form method="post" action="/user/{{ $user->id }}">
        @method('DELETE')
        @csrf
        <button class="btn btn-danger" onclick="return confirm('Are you sure to delete your account?')">
            Delete Account
        </button>
    </form>
@endsection