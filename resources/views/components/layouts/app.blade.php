<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Sta Maria Dental Clinic' }}</title>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> --}}
        <style>
            /* Hide the scrollbar for Chrome, Safari and Opera */
            .swiper::-webkit-scrollbar {
                display: none;
            }

            /* Hide the scrollbar for Internet Explorer, Edge and Firefox */
            .swiper {
                -ms-overflow-style: none;
                /* IE and Edge */
                scrollbar-width: none;
                /* Firefox */
            }

            .swiper-slide {
                max-height: 33rem;
                object-fit: cover;

            }

        </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * {
            font-family: 'Roboto', sans-serif;
        }

    </style>
    @livewireStyles



</head>

<body class="text-gray-50">


    {{ $slot }}
    @stack('s')

    @livewireScripts

</body>


</html>
