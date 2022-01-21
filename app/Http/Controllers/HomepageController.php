<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Novel;
use App\Models\Comic;
use App\Models\Manga;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $books = Book::latest()->limit(4)->get();
        $novels = Novel::latest()->limit(4)->get();
        $comics = Comic::latest()->limit(4)->get();
        $mangas = Manga::latest()->limit(4)->get();
        return view('index',compact('books', 'novels', 'comics', 'mangas'));
    }
}
