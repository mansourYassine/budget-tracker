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
        <div class="flex">
            <aside class=" w-60 bg-blue-950 text-white ">
                <h2 class=" text-2xl font-semibold my-5 ml-7 ">Budget Tracker</h2>
                <ul class=" mx-7 mt-10">
                    <li><a class=" {{ request()->routeIs('dashboard') ? "bg-blue-500 text-white" : "text-gray-300 hover:bg-gray-500/50 hover:text-white" }} text-sm font-semibold block mb-1 py-2.5 pl-2 rounded-sm" href="{{ route('dashboard') }}"><i class="fa-solid fa-house"></i> Dashboard</a></li>
                    <li><a class=" {{ request()->routeIs('transactions.*') ? "bg-blue-500 text-white" : "text-gray-300 hover:bg-gray-500/50 hover:text-white" }} text-sm font-semibold block mb-1 py-2.5 pl-2 rounded-sm" href="{{ route('transactions.index') }}"><i class="fa-solid fa-receipt"></i> Transactions</a></li>
                    <li><a class=" {{ request()->routeIs('profile') ? "bg-blue-500 text-white" : "text-gray-300 hover:bg-gray-500/50 hover:text-white" }} text-sm font-semibold block mb-1 py-2.5 pl-2 rounded-sm" href=""><i class="fa-solid fa-user"></i> Profile</a></li>
                </ul>
            </aside>
            <div class=" flex-1 h-screen flex flex-col">
                <header class=" py-4.5 bg-white shadow-xs z-10 ">
                    <h2 class=" text-secondary text-2xl font-bold text-center ">Budget Tracker</h2>
                </header>
                <main class=" flex flex-1 justify-center bg-backgr ">
                </main>
            </div>
        </div>
    </body>
</html>