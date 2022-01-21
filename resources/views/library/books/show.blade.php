@extends('layouts.website')

@section('content')


<div>
    <div class="rounded-t-lg shadow-md mx-32 bg-white">
            <div class="my-3 pl-3 border-b">
                <h1 class="text-xl pt-2 pl-2 pb-2">Book Details</h1>
            </div>
        <div >
            <div class="flex flex-row px-10 pt-5 pb-8 ">

                <div class="h-[42rem] w-[32rem]">
                    <img src="{{ asset('storage/BookCoverImages/' . $book->cover) }}"
                    class="rounded-xl w-full object-cover h-full"
                    alt="">
                </div>

                <div class="flex flex-col gap-2 pl-10">
                    <div class="font-bold text-3xl">
                        <h1>"{{$book->title}}"</h1>
                    </div>
                    <div class="pt-3 text-xl font-semibold">
                        <h1>{{$book->author}}</h1>
                    </div>
                    <div class="w-[32rem]">
                        <h1>Synopsis :</h1>
                        <p>{{$book->synopsis}}</p>
                    </div>
                    <div class="pt-3">
                        <p>The Books are : {{$book->status}}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
