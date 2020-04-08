<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;
use App\User;

class ReportController extends Controller
{
    public function topBook()
    {
    	$books = Book::withCount('borrowed')
    				->orderBy('borrowed_count', 'DESC')
    				->paginate(env('PAGINATION_ADMIN'));

    	return view('admin.report.topBook', [
    		'books' => $books
    	]);
    }

    public function topUser()
    {
    	$users = User::withCount('borrow')
    				->orderBy('borrow_count', 'DESC')
    				->paginate(env('PAGINATION_ADMIN'));

    	return view('admin.report.topUser', [
    		'users' => $users
    	]);
    }
}
