@extends('layouts.app')

@section('content')
    <div class="container px-5">
        @include('includes.mensagem')
        <form action="{{ route('admin.tags.update', $tag) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Name<small style="color: red">*</small></label>
                <input id="name" class="form-control" type="text" name="name" value="{{ $tag->name ?? '' }}">
            </div>
            <div class="d-grid gap-2 d-md-block mt-4 ml-6">
                <button class="btn btn-success " type="submit">Submit</button>
                <a href="{{ route('admin.tags.index') }}" class="btn btn-info" type="button">Back</a>
            </div>
        </form>
    </div>
@endsection
