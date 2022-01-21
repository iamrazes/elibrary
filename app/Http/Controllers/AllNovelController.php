<?php

namespace App\Http\Controllers;

use App\Models\Novel;
use Illuminate\Http\Request;

class AllNovelController extends Controller
{
    public function index()
    {

    $novels = Novel::all();
    return view('library.novels.allnovel', compact('novels'));
    }
}
