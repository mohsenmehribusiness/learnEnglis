<!doctype html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body>
@include('layouts.nav_top')
<div class="container">
    @yield('content')
    @include('layouts.footer')
</div>
@include('layouts.script')
</body>
</html>