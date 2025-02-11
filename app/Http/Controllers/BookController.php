<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request) 
    { 
        // Validasi input
        $validated = $request->validate([ 
            'kode_buku'   => 'required', 
            'judul_buku'  => 'required', 
            'pengarang'   => 'required', 
            'penerbit'    => 'required', 
            'tahun_terbit'=> 'required|date_format:Y-m', 
            'foto_cover'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
        ]); 
    
        // Proses unggah foto
        if ($request->hasFile('foto_cover')) { 
            $fileName = time() . '.' . $request->foto_cover->extension(); 
            $request->foto_cover->move(public_path('images'), $fileName); 
            $validated['foto_cover'] = $fileName; 
        } 
    
        // Pastikan hanya menyimpan tahun dari input type="month"
        $validated['tahun_terbit'] = substr($request->tahun_terbit, 0, 4);
    
        // Simpan data ke database
        Book::create($validated); 
    
        return redirect()->route('books.index')->with('success', 'Data berhasil disimpan!');
    }
    
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'kode_buku'   => 'required',
            'judul_buku'  => 'required',
            'pengarang'   => 'required',
            'penerbit'    => 'required',
            'tahun_terbit'=> 'required|date_format:Y-m',
            'foto_cover'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Proses unggah foto jika ada file baru
        if ($request->hasFile('foto_cover')) {
            $fileName = time() . '.' . $request->foto_cover->extension();
            $request->foto_cover->move(public_path('images'), $fileName);
            $validated['foto_cover'] = $fileName;
        }

        // Pastikan hanya menyimpan tahun dari input type="month"
        $validated['tahun_terbit'] = substr($request->tahun_terbit, 0, 4);

        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }
}
