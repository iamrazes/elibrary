@extends('layouts.website')

@section('head')
@endsection

@section('content')

        <!-- CONTENT -->
        <div class="antialiased">

            <div class="rounded-lg shadow-lg mx-32 bg-white">
                <div>
                    <div class="border-b pt-4 pb-2 px-4">
                        <h1 class="text-lg ">Latest Book</h1>
                    </div>
                    <div>
                        <div class="grid grid-cols-4 gap-6 px-8 pt-8 ">
                            @foreach ($books as $book)
                            <div class="rounded-t-xl shadow">
                                <div>
                                    <div class="h-[26rem]">
                                        <img src="{{ asset('storage/BookCoverImages/' . $book->cover) }}" class="rounded-t-xl w-full object-cover h-full" alt="">
                                    </div>
                                    <div class="flex flex-col p-2 items-center">
                                        <p class="font-bold text-center">{{$book->title}}</p>
                                        <p class="">{{$book->author}}</p>
                                        <div class="my-4 ">
                                            <a href="{{route('book.show', ['author' => $book->author, 'title' => $book->title])}}" class="bg-gray-700 px-4 py-1 rounded-md text-white hover:text-slate-400 hover:bg-slate-100 transition">View Book</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex justify-end mt-4 px-4 py-2 pb-4">
                        <p><a href="{{ route('allbook') }}"  class="hover:text-gray-200 transition">View More...</a></p>
                    </div>
                </div>
            </div>

            <div class="rounded-lg shadow-lg mx-32 mt-16 bg-white">
                <div>
                    <div class="border-b pt-4 pb-2 px-4">
                        <h1 class="text-lg ">Latest Novel</h1>
                    </div>
                    <div>
                        <div class="grid grid-cols-4 gap-6 px-8 pt-8 ">
                            @foreach ($novels as $novel)
                            <div class="rounded-t-xl shadow">
                                <div>
                                    <div class="h-[26rem]">
                                        <img src="{{ asset('storage/NovelCoverImages/' . $novel->cover) }}" class="rounded-t-xl w-full object-cover h-full" alt="">
                                    </div>
                                    <div class="flex flex-col p-2 items-center">
                                        <p class="font-bold text-center">{{$novel->title}}</p>
                                        <p class="">{{$novel->author}}</p>
                                        <div class="my-4 ">
                                            <a href="{{route('novel.show', ['author' => $novel->author, 'title' => $novel->title])}}" class="bg-gray-700 px-4 py-1 rounded-md text-white hover:text-slate-400 hover:bg-slate-100 transition">View Novel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex justify-end mt-4 px-4 py-2 pb-4">
                        <p><a href="{{ route('allnovel') }}"  class="hover:text-gray-200 transition">View More...</a></p>
                    </div>
                </div>
            </div>

            <div class="rounded-lg shadow-lg mx-32 mt-16 bg-white">
                <div>
                    <div class="border-b pt-4 pb-2 px-4">
                        <h1 class="text-lg ">Latest Comic</h1>
                    </div>
                    <div>
                        <div class="grid grid-cols-4 gap-6 px-8 pt-8 ">
                            @foreach ($comics as $comic)
                            <div class="rounded-t-xl shadow">
                                <div>
                                    <div class="h-[26rem]">
                                        <img src="{{ asset('storage/ComicCoverImages/' . $comic->cover) }}" class="rounded-t-xl w-full object-cover h-full" alt="">
                                    </div>
                                    <div class="flex flex-col p-2 items-center justify-center">
                                        <p class="font-bold text-center">{{$comic->title}}</p>
                                        <p class="">{{$comic->author}}</p>
                                        <div class="my-4 ">
                                            <a href="{{route('comic.show', ['author' => $comic->author, 'title' => $comic->title])}}" class="bg-gray-700 px-4 py-1 rounded-md text-white hover:text-slate-400 hover:bg-slate-100 transition">View Comic</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex justify-end mt-4 px-4 py-2 pb-4">
                        <p><a href="{{ route('allcomic') }}"  class="hover:text-gray-200 transition">View More...</a></p>
                    </div>
                </div>
            </div>

            <div class="rounded-lg shadow-lg mx-32 mt-16 bg-white">
                <div>
                    <div class="border-b pt-4 pb-2 px-4">
                        <h1 class="text-lg ">Latest Manga</h1>
                    </div>
                    <div>
                        <div class="grid grid-cols-4 gap-6 px-8 pt-8 ">
                            @foreach ($mangas as $manga)
                            <div class="rounded-t-xl shadow">
                                <div>
                                    <div class="h-[26rem]">
                                        <img src="{{ asset('storage/MangaCoverImages/' . $manga->cover) }}" class="rounded-t-xl w-full object-cover h-full" alt="">
                                    </div>
                                    <div class="flex flex-col p-2 items-center justify-center">
                                        <p class="font-bold text-center">{{$manga->title}}</p>
                                        <p class="">{{$manga->author}}</p>
                                        <div class="my-4 ">
                                            <a href="{{route('manga.show', ['author' => $manga->author, 'title' => $manga->title])}}" class="bg-gray-700 px-4 py-2 rounded-md text-white hover:text-slate-400 hover:bg-slate-100 transition">View Manga</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex justify-end mt-4 px-4 py-2 pb-4">
                        <p><a href="{{ route('allmanga') }}"  class="hover:text-gray-200 transition">View More...</a></p>
                    </div>
                </div>
            </div>

        </div>

@endsection
