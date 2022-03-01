@extends('layouts.app')

@section('content')
    <div class="container px-5">
        <form class="row" action="{{ route('admin.categories.store') }}" method="post">
            @csrf
            <div class="form-group mt-3 col">
                <label for="name">Name<small style="color: red">*</small></label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Name of category">
            </div>
            <div class="d-grid gap-2 d-md-block mt-4">
                <button class="btn btn-success " type="submit">Submit</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-info" type="button">Back</a>
            </div>
        </form>
    </div>
@endsection
