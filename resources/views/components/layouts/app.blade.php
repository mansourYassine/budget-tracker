<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <x-sidebar />
        <div class=" right-page h-screen flex flex-col ml-16 md:ml-16">
            <header class=" py-4.5 bg-white shadow-sm z-10 ">
                <h2 class=" text-secondary text-2xl font-bold ml-5 ">{{ $title }}</h2>
            </header>
            <main class=" flex-1 bg-backgr ">
                {{ $slot }}
            </main>
        </div>
        @stack('scripts')
    </body>
</html>