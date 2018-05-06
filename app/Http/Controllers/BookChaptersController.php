<?php

namespace App\Http\Controllers;

use App\Book;
use App\BookChapter;
use Illuminate\Http\Request;

class BookChaptersController extends Controller
{
    public function show(Book $book, BookChapter $chapter)
    {
    	return view('v2.bookchapters.show', compact('chapter'));
    }
}
