<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Author;
use App\Book;
use App\BorrowHistory;

class DataController extends Controller
{
    public function authors()
    {
    	$authors = Author::orderBy('name', 'ASC');

    	return datatables()->of($authors)
    		->AddIndexColumn()
    		->addColumn('action', 'admin.author.action')
            ->rawColumns(['action'])
    		->toJson();
    }

    public function books()
    {
    	$books = Book::orderBy('title', 'ASC')->get();
        $books->load('author');

    	return datatables()->of($books)
            ->editColumn('cover', function (Book $book) {
                return '<img src="'. $book->cover .'" height="150">';
            })
    		->AddIndexColumn()
    		->addColumn('author', function (Book $book) {
                return $book->author->name;
            })
            ->addColumn('action', 'admin.book.action')
            ->rawColumns(['cover', 'action'])
    		->toJson();
    }

    public function borrows()
    {
        $borrows = BorrowHistory::isBorrowed()->latest()->get();
        $borrows->load('user', 'book');

        return datatables()->of($borrows)
            ->AddIndexColumn()
            ->addColumn('user_name', function (BorrowHistory $borrow) {
                return $borrow->user->name;
            })
            ->addColumn('book_title', function (BorrowHistory $borrow) {
                return $borrow->book->title;
            })
            ->addColumn('action', 'admin.borrow.action')
            ->rawColumns(['action'])
            ->toJson();
    }
}
