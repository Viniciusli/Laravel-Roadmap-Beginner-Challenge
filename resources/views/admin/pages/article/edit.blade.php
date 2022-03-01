@extends('layouts.app')

@section('links')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="container px-5 ">
        @include('includes.mensagem')
        <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype=”multipart/form-data”>
            @method('PUT')
            @csrf
            <div class="row mt-3 justify-content-md-center">
                <div class="form-group col col-lg-5">
                    <label for="title">{{ __('Title') }}</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $article->title }}">
                </div>
                <div class="form-group col col-lg-5">
                    <label for="image">Image</label>
                    <input class="form-control form-control-file" type="file" name="image"
                        value="{{ $article->image ?? null }}">
                </div>
            </div>

            <div class="row mt-4 justify-content-md-center">
                <div class="form-group col col-lg-5">
                    <label for="category_id">Category</label>
                    <select id="category_id" class="form-control" name="category_id">
                        @foreach ($categories as $id => $category)
                            <option value="{{ $id }}" {{ $id == $article->category->id ? 'selected' : '' }}>
                                {{ $category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col col-lg-5">
                    <label for="tags_id[]">Tag</label>
                    <select class="form-control select-tag" name="tags_id[]" multiple="multiple">
                        @foreach ($tags as $id => $tag)
                            <option value="{{ $id }}"
                                {{ in_array($id, $article->tag->pluck('id')->toArray()) ? 'selected' : '' }}>
                                {{ $tag }}</option>
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
