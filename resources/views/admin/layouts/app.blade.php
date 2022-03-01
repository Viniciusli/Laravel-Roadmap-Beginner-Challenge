<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @component('admin.layouts.head')
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

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        @component('admin.components.header.index')
        @endcomponent
    </header>

    <div class="container-fluid">
        <div class="row">
            @component('admin.components.nav.index')
            @endcomponent
        </div>
    </div>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        @yield('content')
    </main>

    <footer class="blog-footer">
        @component('admin.components.footer.index')
        @endcomponent
    </footer>


    @component('admin.layouts.scripts')
    @endcomponent

</body>
</html>
