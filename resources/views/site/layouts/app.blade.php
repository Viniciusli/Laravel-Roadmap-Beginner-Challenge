<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @component('site.layouts.head')
    @endcomponent

    @section('style')
        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }

        </style>
    @endsection
</head>

<body>

    <div class="container">
        <header class="blog-header py-3">
            @component('site.components.header.index')
            @endcomponent
        </header>

        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
                @if (count($categories))
                    @foreach ($categories as $category)
                        <a class="p-2 link-secondary" href="#">{{ $category }}</a>
                    @endforeach
                @endif
            </nav>
        </div>
    </div>


    <main class="container">
        @yield('content')
    </main>

    <footer class="blog-footer">
        @component('site.components.footer.index')
        @endcomponent
    </footer>


    @component('site.layouts.scripts')
    @endcomponent

</body>

</html>
