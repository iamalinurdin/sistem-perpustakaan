<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BorrowHistory;
use Carbon\Carbon;

class BorrowController extends Controller
{
    public function index()
    {
    	return view('admin.borrow.index');
    }

    public function returnBook(Request $request, BorrowHistory $borrowHistory)
    {
    	$borrowHistory->update([
    		'returned_at' => Carbon::now(),
    		'admin_id' => auth()->user()->id,
    	]);

        $borrowHistory->book()->increment('quantity');

    	return redirect()->back()->withSuccess('Buku berhasil dikembalikan');
    }
}
