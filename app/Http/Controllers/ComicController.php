<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use App\Http\Requests\UpdateComicRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtcomic = Comic::all();
        return view('admin.comics.index',compact('dtcomic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreComicRequest  $request
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
         $dir = 'public/ComicCoverImages';
         // dd($imgName);

         Comic::create([
            'title' => $request->title,
            'author'=> $request->author,
            'synopsis'=> $request->synopsis,
            'cover'=> $imgName,
            'status'=> $request->status,
            ]);

         $request->file('cover')->storeAs($dir, $imgName);

        return redirect()->route('admin.comics');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show($author, $title)
    {
        $comic = Comic::where(['author' => $author, 'title' => $title])->first();

        return view('library.comics.show',compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateComicRequest  $request
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComicRequest $request, Comic $comic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic = Comic::findOrFail($id);

        if (Storage::disk('local')->exists('public/ComicCoverImages/' . $comic->cover)) {
            Storage::disk('local')->delete('public/ComicCoverImages/' . $comic->cover);
        }

        $comic->delete();

        return redirect()->route('admin.comics')->with('status', 'Data has been removed!');
    }
}
