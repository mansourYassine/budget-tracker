<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Register</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class=" h-screen flex flex-col">
            <header class=" py-4.5 bg-white shadow-xs z-10 ">
                <h2 class=" text-secondary text-2xl font-bold text-center ">Budget Tracker</h2>
            </header>
            <main class=" flex flex-1 justify-center bg-backgr ">
                <div class=" bg-white shadow-sm/20 mt-6 rounded-md h-fit w-5/6 md:w-1/2 xl:w-1/3 px-12 py-8 ">
                    <h2 class=" font-bold text-2xl ">Create Account</h2>
                    <form action="/register" method="post" class="mt-5">
                        <div class=" flex flex-col mb-4">
                            <label for="form-name" class=" text-sm font-medium text-gray-600 mb-2.5 ">FULL NAME</label>
                            <input type="text" name="name" id="form-name" placeholder="John Doe" class=" border border-gray-300 bg-backgr rounded-md h-9 focus:border-blue-500 focus:outline-none pl-3">
                        </div>
                        <div class=" flex flex-col mb-4">
                            <label for="form-email"  class=" text-sm font-medium text-gray-600 mb-2.5 ">EMAIL ADDRESS</label>
                            <input type="email" name="email" id="form-email" placeholder="name@email.com" class=" border border-gray-300 bg-backgr rounded-md h-9 focus:border-blue-500 focus:outline-none pl-3 ">
                        </div>
                        <div class=" flex flex-col mb-4">
                            <label for="form-pass"  class=" text-sm font-medium text-gray-600 mb-2.5 ">PASSWORD</label>
                            <input type="password" name="password" id="form-pass" placeholder="••••••••" class=" border border-gray-300 bg-backgr rounded-md h-9 focus:border-blue-500 focus:outline-none pl-3 ">
                        </div>
                        <button type="submit" class=" bg-secondary text-white font-medium px-5 py-3 rounded-md w-full mt-3 cursor-pointer">Create Account</button>
                    </form>
                </div>
            </main>
        </div>
    </body>
</html>