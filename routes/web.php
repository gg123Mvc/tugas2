<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $books = \App\Models\Book::all();
    return view('index', compact('books'));
});


Route::resource('books', BookController::class);
Route::resource('categories', CategoryController::class);
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
