<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('scripts')
    </head>
    <body>
        <div class=" h-screen flex flex-col">
            <header class=" py-4.5 bg-white shadow-sm z-10 ">
                <h2 class=" text-secondary text-2xl font-bold text-center ">Budget Tracker</h2>
            </header>
            <main class=" flex flex-1 justify-center bg-backgr ">
                <div class=" bg-white shadow-sm/20 mt-6 rounded-md h-fit w-5/6 md:w-1/2 xl:w-1/3 px-12 py-8 ">
                    @yield('content')
                </div>
            </main>
        </div>
    </body>
</html>