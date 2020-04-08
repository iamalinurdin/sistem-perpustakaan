<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('dashboard');

# route data
Route::get('/author/data', 'DataController@authors')->name('author.data');
Route::get('/book/data', 'DataController@books')->name('book.data');
Route::get('/borrow/data', 'DataController@borrows')->name('borrow.data');

# route borrow
Route::get('/borrow', 'BorrowController@index')->name('borrow.index');
Route::put('/borrow/{borrowHistory}/return', 'BorrowController@returnBook')->name('borrow.return');

# route report
Route::get('report/top-book', 'ReportController@topBook')->name('report.topBook');
Route::get('report/top-user', 'ReportController@topUser')->name('report.topUser');

# route author
Route::resource('author', 'AuthorController')->except(['show']);
Route::resource('book', 'BookController');

