<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtbook = Book::all();
        return view('admin.books.index',compact('dtbook'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
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
         $dir = 'public/BookCoverImages';
         // dd($imgName);

         Book::create([
            'title' => $request->title,
            'author'=> $request->author,
            'synopsis'=> $request->synopsis,
            'cover'=> $imgName,
            'status'=> $request->status,
            ]);

         $request->file('cover')->storeAs($dir, $imgName);

        return redirect()->route('admin.books');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($author, $title)
    {
        $book = Book::where(['author' => $author, 'title' => $title])->first();

        return view('books.show',compact('book'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        if (Storage::disk('local')->exists('public/BookCoverImages/' . $book->cover)) {
            Storage::disk('local')->delete('public/BookCoverImages/' . $book->cover);
        }

        $book->delete();

        return redirect()->route('admin.books')->with('status', 'Data has been removed!');
    }
}
