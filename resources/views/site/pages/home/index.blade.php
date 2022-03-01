@extends('site.layouts.app')

@section('content')
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
            <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and
                efficiently about what’s most interesting in this post’s contents.</p>
            <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
        </div>
    </div>

    <div class="row mb-2">
        @foreach ($articles as $article)
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong
                            class="d-inline-block mb-2 text-{{ $loop->first ? 'primary' : 'success' }}">{{ $article->category->name }}</strong>
                        <h3 class="mb-0">{{ $article->title }}</h3>
                        <div class="mb-1 text-muted">{{ $article->created_at }}</div>
                        <p class="card-text mb-auto">{{ $article->strimText(50) }}</p>
                        <a href="#" class="stretched-link">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img src="{{ asset('storage/uploads/' . $article->image) }}" width="200" height="250">
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row g-5">
        <div class="col-md-4">
            <div class="p-4">
                <h4 class="fst-italic">Social</h4>
                <ol class="list-unstyled">
                    <li><a href="https://github.com/Viniciusli">GitHub</a></li>
                    <li><a href="https://twitter.com/vinicius_lee_">Twitter</a></li>
                    <li><a href="https://www.instagram.com/vinicius_lee">Instagram</a></li>
                </ol>
            </div>
        </div>
    </div>
    </div>
@endsection
