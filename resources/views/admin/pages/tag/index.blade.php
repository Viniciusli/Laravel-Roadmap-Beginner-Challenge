@extends('layouts.app')

@section('content')
    <div class="container px-5">
        @include('includes.mensagem')
        <div class="btn-group " role="group" aria-label="Button group">
            <a href="{{ route('admin.tags.create') }}" class="btn btn-success" type="button">New tag</a>
        </div>
        <div class="d-flex justify-content-center">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Options</td>
                    </tr>
                </thead>
                <tbody>
                    @if (count($tags))
                        @foreach ($tags as $tag)
                            <tr>
                                <th>{{ $tag->name }}</th>
                                <th>
                                    <a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-primary"
                                        type="button">Edit</a>
                                    <form class="btn" action="{{ route('admin.tags.destroy', $tag) }}"
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
                            <th colspan="2">{{ __('Não há tags registradas') }}</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
