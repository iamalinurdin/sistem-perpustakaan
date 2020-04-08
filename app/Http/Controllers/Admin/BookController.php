<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Author;
use App\Book;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.book.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        # menampilkan form tambah data buku
        return view('admin.book.create', [
            'title' => 'Tambah Buku',
            'authors' => Author::orderBy('name', 'ASC')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'short_description' => 'required|max: 100',
            'author_id' => 'required',
            'cover' => 'file|image',
            'quantity' => 'required|numeric',
        ]);

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover')->store('assets/cover');
        } else {
            $cover = 'assets/default.jpg';
        }

        Book::create([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'author_id' => $request->author_id,
            'quantity' => $request->quantity,
            'cover' => $cover,
        ]);

        return redirect()->route('admin.book.index')
            ->withSuccess('Data buku berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        # mengambil data penulis
        $authors = Author::orderBy('name', 'ASC')->get();

        # menampilkan form update data buku
        return view('admin.book.edit', [
            'title' => 'Ubah Data Buku',
            'book' => $book,
            'authors' => $authors,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        # proses validasi form
        $this->validate($request, [
            'title'             => 'required',
            'short_description' => 'required|max: 100',
            'author_id'         => 'required',
            'cover'             => 'file|image',
            'quantity'          => 'required|numeric',
        ]);

        # mengambil data buku sebelumnya
        $cover = $book->cover;

        # jika cover buku diganti
        if ($request->hasFile('cover')) {
            # hapus cover buku sebelumnya
            Storage::delete($book->cover);
            # simpan cover buku yg baru
            $cover = $request->file('cover')->store('assets/cover');
        }

        # proses update data buku
        $book->update([
            'title'             => $request->title,
            'short_description' => $request->short_description,
            'author_id'         => $request->author_id,
            'quantity'          => $request->quantity,
            'cover'             => $cover,
        ]);

        # feedback setelah proses update data buku
        return redirect()->route('admin.book.index')
            ->withInfo('success', 'Data buku berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        # proses menghapus data buku
        $book->delete();

        # feedback setelah proses menghapus data buku
        return redirect()->route('admin.book.index')
            ->withDanger('Data buku berhasil dihapus.');
    }
}
