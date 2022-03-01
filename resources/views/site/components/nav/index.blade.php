@if (count($categories))
    @foreach ($categories as $category)
        <a class="p-2 link-secondary" href="#">{{ $category->name }}</a>
    @endforeach
@else
    <a class="p-2 link-secondary" href="#">{{ __('Não há categorias cadastradas') }}</a>
@endif
