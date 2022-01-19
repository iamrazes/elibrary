@extends('layouts.website')

@section('content')


<div>

    <p>Detils Book</p>
    <div >
        <div class="flex flex-row">
            <div>
                <img src="{{ asset('storage/BookCoverImages/' . $book->cover) }}" alt="">
            </div>
            <div>

            <h1>{{$book->title}}</h1>
            <h1>{{$book->author}}</h1>
            <h1>{{$book->synopsis}}</h1>
            <h1>{{$book->status}}</h1>
            </div>
        </div>
    </div>
</div>

@endsection
