<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'মূলপাতা | আমার স্টুডেন্ট')</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- All Css Links -->
    @include('layouts.links.style');
    @yield('styles')

    <style>
        .admission-list a {
            padding: 9px 17px !important;
            background-color: rgb(152 0 255)
        }

    </style>
    <!-- END: Custom CSS-->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>


<body>
    <noscript>
        <strong>
            We're sorry but This Website doesn't work properly without JavaScript enabled. Please enable it to continue.
        </strong>
    </noscript>

    @include('frontend.partial.header')
    <main>
        @yield('content')
    </main>
    @include('frontend.partial.footer')


    <!-- All Js Links -->
    @include('layouts.links.script');

</body>

</html>
