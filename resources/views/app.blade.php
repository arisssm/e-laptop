<!DOCTYPE html>
<html lang="en">
<head>
    @include('component.header')
    <title>@yield('title', 'Elaptop | Admin ')</title>
</head>
<body>
    <div id="app">
        @include('component.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            @yield('content')
            @include('component.footer')
        </div>
    </div>
    @include('component.script')
    @yield('js')
</body>
</html>