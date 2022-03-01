@extends('layouts.app')

@section('content')
    <style>
        .new-article {
            margin-left: 8%;
            margin-bottom: 1rem;
            margin-top: 3px;
        }

    </style>

    @include('includes.mensagem')

    <div class="container px-5">
        <div class="btn-group " role="group" aria-label="Button group">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-success" type="button">New category</a>
        </div>
        <div class="d-flex justify-content-center  ">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Options</td>
                    </tr>
                </thead>
                <tbody>
                    @if (count($categories))
                        @foreach ($categories as $category)
                            <tr>
                                <th>{{ $category->name }}</th>
                                <th>
                                    <a href="{{ route('admin.categories.edit', $category) }}" type="button"
                                        class="btn btn-primary">Edit</a>
                                    <form class="btn"
                                        action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                        @method('delete')
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="2">{{ __('Não há categorias cadastradas') }}</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
