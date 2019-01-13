@extends('layout')

@section('title','Add Book')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ url('my-book') }}">Books</a></li>
        <li class="active">Add Book</li>
    </ol>
@endsection

@section('content')
    <h1>Add new book</h1>

    <form method="post" enctype="multipart/form-data" action="/book">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group {{ $errors->has('book_name') ? 'has-error' : '' }}">
                    <label>Enter Book Name</label>
                    <input name="book_name"  type="text" placeholder="Book Name" class="form-control" value="{{ Request::old('book_name') }}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group {{ $errors->has('author_name') ? 'has-error' : '' }}">
                    <label>Enter Author Name</label>
                    <input  name="author_name" type="text" placeholder="Author Name" class="form-control" value="{{ Request::old('author_name') }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group {{ $errors->has('publisher') ? 'has-error' : '' }}">
                    <label>Enter Publisher</label>
                    <input name="publisher" type="text" placeholder="Publisher" class="form-control" value="{{ Request::old('publisher') }}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group {{ $errors->has('book_image') ? 'has-error' : '' }}">
                    <label>Select Picture</label>
                    <input name="book_image" type="file" class="form-control" value="{{ Request::old('book_image') }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-primary">Add Book</button>
            </div>
        </div>
    </form>


@endsection