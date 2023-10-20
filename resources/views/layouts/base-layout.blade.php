<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="/assets/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.min.css">
    @stack('css')
    <style>.container {
            max-width: 720px;
        }</style>
    <title>@yield('page.title', config('app.name'))</title>
</head>
<body>

<div class="d-flex flex-column justify-content-between min-vh-100">
    @include('includes.header')
    <main>@yield('content')</main>
    <div class="mt-auto p-2">
        @include('includes.footer')
    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/js/bootstrap.min.js"></script>
@stack('js')
</body>
</html>