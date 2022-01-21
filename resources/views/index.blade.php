@extends('layouts.website')

@section('head')
@endsection

@section('content')
        <!-- CONTENT -->
        <div>
            <div class="rounded-t-lg shadow-md mx-32 bg-white">
                <div>
                    <div class="border-b pt-4 pb-2 px-4">
                        <h1 class="text-lg ">Lastest Book</h1>
                    </div>
                    <div>
                        <div class="grid grid-cols-4 gap-6 px-8 pt-8 ">
                            @foreach ($books as $book)
                            <div class="rounded-t-xl shadow">
                                <div>
                                    <div class="h-[24rem]">
                                        <img src="{{ asset('storage/BookCoverImages/' . $book->cover) }}" class="rounded-t-xl w-full object-cover h-full" alt="">
                                    </div>
                                    <div class="flex flex-col p-2 items-center">
                                        <p class="font-bold">{{$book->title}}</p>
                                        <p class="">{{$book->author}}</p>
                                        <div class="my-2 ">
                                            <a href="{{route('book.show', ['author' => $book->author, 'title' => $book->title])}}" class="bg-gray-700 px-4 py-1 rounded-md text-white hover:text-slate-400 hover:bg-slate-100 transition">View Book</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex justify-end mt-4 px-4 py-2 pb-4">
                        <p><a href="#"  class="hover:text-gray-200 transition">View More...</a></p>
                    </div>
                </div>
            </div>

            <div class="rounded-t-lg shadow-md mx-32 mt-16 bg-white">
                <div>
                    <div class="border-b pt-4 pb-2 px-4">
                        <h1 class="text-lg ">Lastest Novel</h1>
                    </div>
                    <div>
                        <div class="grid grid-cols-4 gap-6 px-8 pt-8 ">
                            @foreach ($novels as $novel)
                            <div class="rounded-t-xl shadow">
                                <div>
                                    <div class="h-[24rem]">
                                        <img src="{{ asset('storage/NovelCoverImages/' . $novel->cover) }}" class="rounded-t-xl w-full object-cover h-full" alt="">
                                    </div>
                                    <div class="flex flex-col p-2 items-center">
                                        <p class="font-bold">{{$novel->title}}</p>
                                        <p class="">{{$novel->author}}</p>
                                        <div class="my-2 ">
                                            <a href="{{route('novel.show', ['author' => $novel->author, 'title' => $novel->title])}}" class="bg-gray-700 px-4 py-1 rounded-md text-white hover:text-slate-400 hover:bg-slate-100 transition">View Novel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex justify-end mt-4 px-4 py-2 pb-4">
                        <p><a href="#"  class="hover:text-gray-200 transition">View More...</a></p>
                    </div>
                </div>
            </div>

            {{-- <div class="rounded-t-lg shadow-md mx-32 mt-16 bg-white">
                <div>
                    <div class="border-b pt-4 pb-2 px-4">
                        <h1 class="text-lg">Lastest Book</h1>
                    </div>
                    <div>
                        <div class="grid grid-cols-4 gap-6 px-8 pt-8">
                            @foreach ($books as $book)
                            <div class="rounded-t-xl shadow">
                                <div>
                                    <div class="h-[24rem]">
                                        <img src="{{ asset('storage/BookCoverImages/' . $book->cover) }}" class="rounded-t-xl w-full object-cover h-full" alt="">
                                    </div>
                                    <div class="flex flex-col p-2 items-center">
                                        <p class="font-bold">{{$book->title}}</p>
                                        <p class="">{{$book->author}}</p>
                                        <div class="my-2 ">
                                            <a href="#" class="bg-gray-700 px-4 py-1 rounded-md text-white hover:text-slate-400 hover:bg-slate-100 transition">View Book</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex justify-end mt-4 px-4 py-2 pb-4">
                        <p><a href="#"  class="hover:text-gray-200 transition">View More...</a></p>
                    </div>
                </div>
            </div>

            <div class="rounded-t-lg shadow-md mx-32 mt-16 bg-white">
                <div>
                    <div class="border-b pt-4 pb-2 px-4">
                        <h1 class="text-lg">Lastest Book</h1>
                    </div>
                    <div>
                        <div class="grid grid-cols-4 gap-6 px-8 pt-8">
                            @foreach ($books as $book)
                            <div class="rounded-t-xl shadow">
                                <div>
                                    <div class="h-[24rem]">
                                        <img src="{{ asset('storage/BookCoverImages/' . $book->cover) }}" class="rounded-t-xl w-full object-cover h-full" alt="">
                                    </div>
                                    <div class="flex flex-col p-2 items-center">
                                        <p class="font-bold">{{$book->title}}</p>
                                        <p class="">{{$book->author}}</p>
                                        <div class="my-2 ">
                                            <a href="#" class="bg-gray-700 px-4 py-1 rounded-md text-white hover:text-slate-400 hover:bg-slate-100 transition">View Book</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex justify-end mt-4 px-4 py-2 pb-4">
                        <p><a href="#"  class="hover:text-gray-200 transition">View More...</a></p>
                    </div>
                </div>
            </div>

            <div class="rounded-t-lg shadow-md mx-32 mt-16 bg-white">
                <div>
                    <div class="border-b pt-4 pb-2 px-4">
                        <h1 class="text-lg">Lastest Book</h1>
                    </div>
                    <div>
                        <div class="grid grid-cols-4 gap-6 px-8 pt-8">
                            @foreach ($books as $book)
                            <div class="rounded-t-xl shadow">
                                <div>
                                    <div class="h-[24rem]">
                                        <img src="{{ asset('storage/BookCoverImages/' . $book->cover) }}" class="rounded-t-xl w-full object-cover h-full" alt="">
                                    </div>
                                    <div class="flex flex-col p-2 items-center">
                                        <p class="font-bold">{{$book->title}}</p>
                                        <p class="">{{$book->author}}</p>
                                        <div class="my-2 ">
                                            <a href="#" class="bg-gray-700 px-4 py-1 rounded-md text-white hover:text-slate-400 hover:bg-slate-100 transition">View Book</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex justify-end mt-4 px-4 py-2 pb-4">
                        <p><a href="#"  class="hover:text-gray-200 transition">View More...</a></p>
                    </div>
                </div>
            </div> --}}
        </div>


@endsection
