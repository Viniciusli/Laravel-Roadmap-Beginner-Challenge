@extends('layouts.app')

@section('content')
    @include('includes.mensagem')
    <div class="container px-5">
        <form action="{{ route('admin.tags.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name<small style="color: red">*</small></label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Tag name">
            </div>
            <div class="d-grid gap-2 d-md-block mt-4">
                <button class="btn btn-success " type="submit">Submit</button>
                <a href="{{ route('admin.tags.index') }}" class="btn btn-info" type="button">Back</a>
            </div>
        </form>
    </div>
@endsection
