<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <aside class=" fixed top-0 left-0 bottom-0 z-20 w-60 bg-blue-950 text-white flex flex-col ">
            <div class="my-5 mx-6">
                <h2 class=" text-logo text-2xl font-semibold ">Budget Tracker</h2>
                <span class=" logo text-1xl font-bold h-8 hidden ">BT</span>
            </div>
            <ul class=" mx-4 mt-2 h-full flex flex-col">
                <li class="navlink"><a class=" {{ request()->routeIs('dashboard') ? "bg-blue-500 text-white" : "text-gray-300 hover:bg-gray-500/50 hover:text-white" }} text-sm font-semibold flex items-center gap-2 mb-1 py-2.5 px-2.5 rounded-sm" href="{{ route('dashboard') }}"><i class="fa-solid fa-house"></i> <span class=" ">Dashboard</span></a></li>
                <li class="navlink"><a class=" {{ request()->routeIs('transactions.*') ? "bg-blue-500 text-white" : "text-gray-300 hover:bg-gray-500/50 hover:text-white" }} text-sm font-semibold flex items-center gap-2 mb-1 py-2.5 px-2.5 rounded-sm" href="{{ route('transactions.index') }}"><i class="fa-solid fa-receipt"></i> <span class=" ">Transactions</span></a></li>
                <li class="navlink"><a class=" {{ request()->routeIs('profile') ? "bg-blue-500 text-white" : "text-gray-300 hover:bg-gray-500/50 hover:text-white" }} text-sm font-semibold flex items-center gap-2 mb-1 py-2.5 px-2.5 rounded-sm" href=""><i class="fa-solid fa-user"></i> <span class=" ">Profile</span></a></li>
                <li class=" sidebar-toggle mt-auto"><a class=" text-sm font-bold flex items-center gap-2 mb-1 py-2.5 px-2 rounded-sm bg-white text-blue-600" href="#"><i class="fa-solid fa-angles-right fa-xl rotate-180"></i> <span class=" text-[17px]">Collapse</span></a></li>
            </ul>
        </aside>
        <div class=" right-page h-screen flex flex-col ml-16 md:ml-60">
            <header class=" py-4.5 bg-white shadow-xs z-10 ">
                <h2 class=" text-secondary text-2xl font-bold text-center ">Budget Tracker</h2>
            </header>
            <main class=" flex flex-1 justify-center bg-backgr ">
            </main>
        </div>
    </body>
</html>