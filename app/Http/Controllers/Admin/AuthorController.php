<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.author.index', [
            'title' => 'Data Penulis',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.author.create', [
            'title' => 'Tambah Penulis'
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
        # validasi form
        $this->validate($request, [
            'name' => 'required|min:3',
        ]);

        # memasukan data ke table
        Author::create($request->only('name'));

        # return ke halaman penulis index
        return redirect()->route('admin.author.index')
            ->with('success', 'Data penulis berhasil ditambahkan');
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
    public function edit(Author $author)
    {
        return view('admin.author.edit', [
            'author' => $author,
            'title' => 'Edit Penulis'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        # validasi form
        $this->validate($request, [
            'name' => 'required|min:3',
        ]);

        # proses update data di table
        $author->update($request->only('name'));

        # return ke halaman penulis index
        return redirect()->route('admin.author.index')
            ->with('info', 'Data penulis berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('admin.author.index')
            ->with('danger', 'Data penulis berhasil dihapus');
    }
}
