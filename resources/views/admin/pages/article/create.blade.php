@extends('layouts.app')

@section('links')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    @include('includes.mensagem')
    <div class="container px-5 ">
        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mt-3 justify-content-md-center">
                <div class="form-group col col-lg-5">
                    <label for="title">{{ __('Title') }}</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Article title">
                </div>
                <div class="form-group col col-lg-5">
                    <label for="image">Image</label>
                    <input class="form-control form-control-file" type="file" name="image">
                </div>
            </div>

            <div class="row mt-4 justify-content-md-center">
                <div class="form-group col col-lg-5">
                    <label for="category_id">Category</label>
                    <select id="category_id" class="form-control" name="category_id">
                        <option>Select a category</option>
                        @foreach ($categories as $id => $category)
                            <option value="{{ $id }}">{{ $category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col col-lg-5">
                    <label for="tags_id[]">Tag</label>
                    <select class="form-control select-tag" name="tags_id[]" multiple="multiple" required>
                        @foreach ($tags as $id => $tag)
                            <option value="{{ $id }}">{{ $tag }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mt-4 justify-content-md-center">
                <div class="form-group col col-lg-5">
                    <label for="article">Content</label>
                    <textarea class="form-control" name="article" rows="3"></textarea>
                </div>
            </div>

            <div class="row mt-4 justify-content-md-center">
                <div class="col col-lg-5">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select-tag').select2();
        });
    </script>
@endsection
