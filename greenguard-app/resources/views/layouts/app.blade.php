<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('Greengard', 'Greengard') }}</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>

    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body class="bg-slate-100">
    <div class="w-full sm:w-[500px] bg-[#FDFDFD] m-auto p-0">
        @if (auth()->check())
            <x-header />
        @endif
        <main>

            @yield('content')
        </main>
        @if (auth()->check())
            <x-bottom-nav />
        @endif
    </div>
</body>

</html>
