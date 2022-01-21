@extends('layouts.website')

@section('content')


<div>
    <div class="rounded-lg shadow-lg mx-32 bg-white">
            <div class="my-3 pl-3 border-b">
                <h1 class="text-xl pt-2 pl-2 pb-2">All Novels</h1>
            </div>

            <div class="grid grid-cols-6 gap-6 px-8 py-8 ">
                @foreach ($novels as $novel)
                <div class="rounded-t-xl shadow-md">
                    <div>
                        <div class="h-[12rem]">
                            <img src="{{ asset('storage/NovelCoverImages/' . $novel->cover) }}" class="rounded-t-xl w-full object-cover h-full" alt="">
                        </div>
                        <div class="flex flex-col p-2 items-center">
                            <p class="font-bold text-center lg:text-sm sm:text-sm">{{$novel->title}}</p>
                            <div class="my-4 text-center">
                                <a href="{{route('novel.show', ['author' => $novel->author, 'title' => $novel->title])}}" class="bg-gray-700 px-4 py-1 rounded-md text-white hover:text-slate-400 hover:bg-slate-100 transition">View Novel</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
    </div>
</div>

@endsection

