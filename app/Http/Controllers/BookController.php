<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'judul' => 'required|max:300',
            'halaman' => 'required|integer|min:10|max:1000',
            'kategori' => 'required|max:100',
            'penerbit' => 'required|max:200',
        ];

        $validated = $request->validate($rules);
        Book::create($validated);
        $request->session()->flash('success', "Berhasil menambahkan buku baru berjudul ".$validated['judul']);

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\book  $books
     * @return \Illuminate\Http\Response
     */
    public function show(book $books)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\book  $books
     * @return \Illuminate\Http\Response
     */
    public function edit(book $books)
    {
        return view('books.edit', compact ('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\book  $books
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, book $books)
    {
        $rules = [
            'judul' => 'required|max:300',
            'halaman' => 'required|integer|min:10|max:1000',
            'kategori' => 'required|max:100',
            'penerbit' => 'required|max:200',
        ];

        $validated = $request->validate($rules);
        $books->update($validated);
        $request->session()->flash('success', "Berhasil memperbaharui buku yang berjudul ".$validated['judul']);
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book  $books
     * @return \Illuminate\Http\Response
     */
    public function destroy(book $books)
    {
        $books->delete();
        return redirect()->route('books.index')->with('success', "Berhasil menghapus buku {$books['judul']}");
    }
}
