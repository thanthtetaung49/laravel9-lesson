<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
    <style>
        h1 {
            color: blue;
        }
    </style>
</head>
<body>
    <a href="{{ url("homePage/intro") }}">Home Page</a><span>|</span>
    <a href="{{ url("contactPage") }}">Contact Page</a><span>|</span>
    <a href="{{ url("aboutPage") }}">About Page</a><span>|</span>
    <a href="{{ route("svp") }}">Service Page</a>

    <hr>

    @yield('content')

    <h3 style="background-color: yellow;">This is the end of yield method.</h3>

    @yield('homePageFooter')

    @stack('javascript')

    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>