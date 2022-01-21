<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use Illuminate\Http\Request;

class AllMangaController extends Controller
{
    public function index()
    {

    $mangas = Manga::all();
    return view('library.mangas.allmanga', compact('mangas'));
    }
}
