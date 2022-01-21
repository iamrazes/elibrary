<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use App\Http\Requests\UpdateMangaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MangaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtmanga = Manga::all();
        return view('admin.mangas.index',compact('dtmanga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mangas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMangaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cover' => ['required', 'image']
        ]);

         //  dd($request->all());

         $randomString = Str::random(10);
         $imgName = $randomString . str_replace(' ', '-', $request->file('cover')->getClientOriginalName());
         $dir = 'public/MangaCoverImages';
         // dd($imgName);

         Manga::create([
            'title' => $request->title,
            'author'=> $request->author,
            'synopsis'=> $request->synopsis,
            'cover'=> $imgName,
            'status'=> $request->status,
            ]);

         $request->file('cover')->storeAs($dir, $imgName);

        return redirect()->route('admin.mangas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manga  $manga
     * @return \Illuminate\Http\Response
     */
    public function show($author, $title)
    {
        $manga = Manga::where(['author' => $author, 'title' => $title])->first();

        return view('library.mangas.show',compact('manga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manga  $manga
     * @return \Illuminate\Http\Response
     */
    public function edit(Manga $manga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMangaRequest  $request
     * @param  \App\Models\Manga  $manga
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMangaRequest $request, Manga $manga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manga  $manga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $manga = Manga::findOrFail($id);

        if (Storage::disk('local')->exists('public/MangaCoverImages/' . $manga->cover)) {
            Storage::disk('local')->delete('public/MangaCoverImages/' . $manga->cover);
        }

        $manga->delete();

        return redirect()->route('admin.mangas')->with('status', 'Data has been removed!');
    }
}
