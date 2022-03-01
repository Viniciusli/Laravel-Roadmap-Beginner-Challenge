@extends('layouts.app')

@section('content')
    <div class="container px-5">
        @include('includes.mensagem')
        <form class="row mx-6 mt-3" action="{{ route('admin.categories.update', $category) }}" method="POST">
            @csrf
            @method('put')
            <div class="col">
                <label for="name">Name<small style="color: red">*</small></label>
                <input id="name" class="form-control" type="text" name="name" value="{{ $category->name ?? '' }}">
            </div>
            <div class="d-grid gap-2 d-md-block mt-4 ml-6">
                <button class="btn btn-success " type="submit">Submit</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-info" type="button">Back</a>
            </div>
        </form>
    </div>
@endsection
