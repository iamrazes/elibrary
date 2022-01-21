<?php

namespace App\Http\Controllers;

use App\Models\Novel;
use App\Http\Requests\UpdateNovelRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NovelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtnovel = Novel::all();
        return view('admin.novels.index',compact('dtnovel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.novels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNovelRequest  $request
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
         $dir = 'public/NovelCoverImages';
         // dd($imgName);

         Novel::create([
            'title' => $request->title,
            'author'=> $request->author,
            'synopsis'=> $request->synopsis,
            'cover'=> $imgName,
            'status'=> $request->status,
            ]);

         $request->file('cover')->storeAs($dir, $imgName);

        return redirect()->route('admin.novels');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Novel  $novel
     * @return \Illuminate\Http\Response
     */
    public function show($author, $title)
    {
        $novel = Novel::where(['author' => $author, 'title' => $title])->first();

        return view('novels.show',compact('novel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Novel  $novel
     * @return \Illuminate\Http\Response
     */
    public function edit(Novel $novel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNovelRequest  $request
     * @param  \App\Models\Novel  $novel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNovelRequest $request, Novel $novel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Novel  $novel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $novel = Novel::findOrFail($id);

        if (Storage::disk('local')->exists('public/NovelCoverImages/' . $novel->cover)) {
            Storage::disk('local')->delete('public/NovelCoverImages/' . $novel->cover);
        }

        $novel->delete();

        return redirect()->route('admin.novels')->with('status', 'Data has been removed!');
    }
}
