@extends('layout')

@section('title', 'My-Book')

@section('content')
    <h1>My Books</h1>
    <a class="btn btn-success" href="{{ url('/book/create') }}">Add Book</a>
    <hr>
    <table class="table table-bordered">
        <thead>
        <th>S.N.</th>
        <th>Image</th>
        <th>Book Name</th>
        <th>Author Name</th>
        <th>Publisher</th>
        <th>Created Date</th>
        <th>Action</th>
        </thead>
        <tbody>
        <?php
        $count = 0;
        ?>
        @foreach($user->books as $book)
            <?php
            $count++;
            ?>
            <tr>
                <td><?php echo $count ?></td>
                <td><img src="images/{{ $book->book_image }}" class="book-pic"></td>
                <td>{{ $book->book_name }}</td>
                <td>{{ $book->author_name }}</td>
                <td>{{ $book->publisher }}</td>
                <td>{{ $book->created_at->todatestring() }}</td>
                <td>
                    <a id="edit_btn" href="/book/{{ $book->id }}/edit" class="btn btn-success btn-sm" title="Edit">Edit</a>
                    <form method="post" action="/book/{{ $book->id }}">
                        @method('DELETE')
                        @csrf
                        <input type="submit" onclick ="return confirm('Are you sure to delete?')" class="btn btn-danger btn-sm" value="Delete" title="Delete">
                    </form>
                </td>
            </tr>
                    @endforeach
        </tbody>
    </table>
@endsection