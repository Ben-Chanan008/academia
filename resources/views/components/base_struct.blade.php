<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name') . ' :: ' . $title ?: 'Home'}}</title>

    {{--  FONT AWESOME AND BOOTSTRAP LINKS  --}}
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/all.css')}}">

    {{--  CSS LINKS  --}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    {{--  FAVICON IMG  --}}
    <link rel="icon" href="{{asset('meta/favicon_io/favicon-16x16.png')}}">
</head>
<body class="body">
{{$slot}}
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>
