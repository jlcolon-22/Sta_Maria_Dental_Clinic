<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Sta Maria Dental Clinic' }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


    @vite('resources/css/app.css')
    @livewireStyles
    <style>
        * {
            font-family: 'Roboto', sans-serif;
        }


    </style>


</head>

<body class="text-gray-50">



    @livewireScripts
</body>


</html>
