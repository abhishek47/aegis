<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
    	$books = Book::paginate(10);
    	return view('v2.books.index', compact('books'));
    }

    public function show(Book $book)
    {
    	return view('v2.books.show', compact('book'));
    }
}
