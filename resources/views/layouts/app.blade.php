<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    {{--  Styles --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- Scripts : --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script defer src="{{ asset('js/search-autocomplete.js') }}"></script>
    <script defer src="{{ asset('js/fetchComments.js') }}"></script>      

    {{-- Including tailwind :  --}}
    <script defer src="https://cdn.tailwindcss.com"></script>

    {{-- Including bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    @livewireStyles
    <style>
        a {
            text-decoration: none;
        }

        .autocompleteLinks {
            transition: all 0.3s;
        }

        .autocompleteLinks:hover {
            color: red;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    @livewireScripts
</body>

</html>
