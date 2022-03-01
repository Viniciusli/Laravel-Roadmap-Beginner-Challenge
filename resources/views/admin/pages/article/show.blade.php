@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <div class="title">
            <h1>{{ $article->title }}</h1>
            <small class="d-flex justify-content-center">
                @foreach ($article->tag as $tag)
                    {{ $tag->name }}
                @endforeach
            </small>
            <p class="d-flex justify-content-center">By {{ $article->user->name }}</p>
        </div>


    </div>
    <div class="d-flex justify-content-center mt-4">
        <p style="font-size: 17px">{{ $article->article }}</p>
    </div>
@endsection
