<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class AllBookController extends Controller
{
    public function index()
    {

    $books = Book::all();
    return view('library.books.allbook', compact('books'));
    }
}
