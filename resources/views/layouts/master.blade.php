<!doctype html>
<html lang="en">
<head>
    @include('layouts.head')
    @yield('css')
</head>
<body>
@include('layouts.nav_top')
<div class="container">
    @yield('content')
    @include('layouts.footer')
</div>
@include('layouts.script')
<script src="{{ url('js/bootstrap.min.js') }}"></script>
@yield('script')
</body>
</html>
