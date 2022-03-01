@extends('layouts.app')

@section('content')
    <style>
        .mx-6 {
            margin-left: 8%;
            margin-right: 8%;
        }

        .new-article {
            margin-left: 8%;
            margin-bottom: 1rem;
            margin-top: 3px;
        }

    </style>

    @include('includes.mensagem')

    <div class="btn-group new-article" role="group" aria-label="Button group">
        <a href="{{ route('admin.articles.create') }}" class="btn btn-success" type="button">New article</a>
    </div>

    <div class="d-flex justify-content-center mx-6 ">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Author</td>
                    <td>Title</td>
                    <td>Content</td>
                    <td>Options</td>
                </tr>
            </thead>
            <tbody>
                @if (count($articles))
                    @foreach ($articles as $article)
                        <tr>
                            <th>{{ $article->user->name }}</th>
                            <th>{{ $article->title }}</th>
                            <th>{{ $article->strimText(50) }}</th>
                            <th class="row">
                                <a href="{{ route('admin.articles.show', $article) }}" type="button"
                                    class="col col-md-2 btn btn-primary mx-2">View</a>
                                <a href="{{ route('admin.articles.edit', $article) }}" type="button"
                                    class="col col-md-2 btn btn-primary">Edit</a>
                                <form class="col col-md-2" action="{{ route('admin.articles.destroy', $article) }}"
                                    method="POST">
                                    @method('delete')
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </th>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th colspan="4">{{ __('Não há artigos cadastrados') }}</th>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
