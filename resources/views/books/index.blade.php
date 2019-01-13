@extends('layout')

@section('title', 'Dashboard - Books')

@section('content')
    <h1><span class="glyphicon glyphicon-book"></span> Book List</h1><hr>
    <div class="row">
        <div class="col-lg-12">
        @foreach($users_name as $user_name)
            @foreach($user_name->books as $book)
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <img class="book-pic" src="images/{{ $book->book_image }}" alt="{{ $book->book_image }}" >
                                    </div>
                                    <div class="col-lg-9">
                                        <strong>Name : </strong>{{ $book->book_name }}<br>
                                        <strong>Author : </strong>{{ $book->author_name }}<br>
                                        <strong>Publisher : </strong>{{ $book->publisher }}<br>
                                        <strong>Uploaded By : </strong>{{ $user_name->name }}<br>
                                        <strong>Uploaded At : </strong>{{ $book->created_at->todatestring() }}<br>
                                    </div>
                                </div>
                            </div>
                        </div>
            @endforeach
        @endforeach
        </div>
    </div>


@endsection