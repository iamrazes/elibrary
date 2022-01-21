<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class AllComicController extends Controller
{
    public function index()
    {

    $comics = Comic::all();
    return view('library.comics.allcomic', compact('comics'));
    }
}
