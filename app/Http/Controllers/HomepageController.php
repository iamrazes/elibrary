<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Novel;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $books = Book::latest()->limit(4)->get();
        $novels = Novel::latest()->limit(4)->get();
        return view('index',compact('books', 'novels'));
    }
}
