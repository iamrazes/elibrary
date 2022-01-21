@extends('layouts.website')

@section('content')


<div>
    <div class="rounded-lg shadow-lg mx-32 bg-white">
            <div class="my-3 pl-3 border-b">
                <h1 class="text-xl pt-2 pl-2 pb-2">All Books</h1>
            </div>

            <div class="grid grid-cols-6 gap-6 px-8 py-8 ">
                @foreach ($books as $book)
                <div class="rounded-t-xl shadow-md">
                    <div>
                        <div class="h-[12rem]">
                            <img src="{{ asset('storage/BookCoverImages/' . $book->cover) }}" class="rounded-t-xl w-full object-cover h-full" alt="">
                        </div>
                        <div class="flex flex-col p-2 items-center">
                            <p class="font-bold text-center lg:text-sm sm:text-sm">{{$book->title}}</p>
                            <div class="my-4 text-center">
                                <a href="{{route('book.show', ['author' => $book->author, 'title' => $book->title])}}" class="bg-gray-700 px-4 py-1 rounded-md text-white hover:text-slate-400 hover:bg-slate-100 transition">View Book</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
    </div>
</div>

@endsection

