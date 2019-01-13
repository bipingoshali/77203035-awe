<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{

    public function index()
    {
        $book = Book::all();
        $users_name = User::with('books')->get();

        return view('books.index')->with('books',$book)->with('users_name',$users_name);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        request()->validate([
           'book_name' => ['required', 'min:3', 'max:255'],
            'publisher' => ['required', 'min:3', 'max:255'],
            'author_name' => ['required', 'min:3', 'max:255'],
            'book_image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048']
        ]);

        $book = new Book();
        $book->user_id = $user->id;
        $book->book_name = $request->book_name;
        $book->publisher = $request->publisher;
        $book->author_name = $request->author_name;

        $file_name = $request->book_image->getClientOriginalName();
        request()->book_image->move(public_path('images'), $file_name);

        $book->book_image = $file_name;
        $book->save();

        return redirect('/book')->with('success', 'Congratulations! You have successfully added book.');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request)
    {
        request()->validate([
            'book_name' => ['required', 'min:3', 'max:255'],
            'publisher' => ['required', 'min:3', 'max:255'],
            'author_name' => ['required', 'min:3', 'max:255'],
            'book_image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048']
        ]);

        $book = Book::findorfail($request->book_id);

        $book->book_name = $request->book_name;
        $book->publisher = $request->publisher;
        $book->author_name = $request->author_name;

        $file_name = $request->book_image->getClientOriginalName();
        request()->book_image->move(public_path('images'), $file_name);

        $book->book_image = $file_name;
        $book->save();

        return redirect('/book')->with('success', 'Congratulations! You have successfully edited book.');

    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/book')->with('success', 'Successfully deleted book.');
    }
}
