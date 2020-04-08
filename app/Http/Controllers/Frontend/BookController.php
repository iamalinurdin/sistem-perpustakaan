<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function index()
    {
    	$books = Book::paginate(10);
    	return view('frontend.book.index', [
    		'books' => $books,
    	]);
    }

    public function show(Book $book)
    {
    	return view('frontend.book.show', [
    		'book' => $book,
    	]);
    }

    public function borrow(Book $book)
    {
    	$user = auth()->user();

    	if ($user->borrow()->stillBorrowed($book->id)) {
			return redirect()->route('homepage')->with('toast', 'Kamu sudah meminjam buku ' . $book->title);
    	}

    	$user->borrow()->attach($book);
    	$book->decrement('quantity');

    	return redirect()->route('homepage')->with('toast', 'Buku '. $book->title .' berhasil dipinjam.');
    }
}
