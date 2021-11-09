@props(['name'])
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Invoice application</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        {{-- <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500&display=swap');

            
        </style> --}}
    </head>
    <body class="bg-gray-200 text-sm text-gray-800 tracking-wider font-weight-500">
        <header class="">
            <nav class="p-6 bg-white flex justify-between mb-7 hover-text-gray-700 ">
                @auth
                    <div class="pl-5">
                        <button class="pr-5 tracking-wider">
                            <a href="{{ route('invoices.index') }}">Invoices</a>
                        </button> 
                     
                        <button class="pl-2 tracking-wider hover-text-800">
                            <a href="{{ route('clients') }}">Clients</a>
                        </button>
                    </div>
                @endauth

                @guest
                    <img src="" alt="Invoice app logo">
                @endguest
                
                @auth
                <div>
                    <button class="pr-5">
                        <a href="{{ route('user') }}" class="p-3 tracking-wider">{{ auth()->user()->first_name }}</a>
                    </button>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="mr-8 tracking-wider">Logout</button> 
                    </form>  
                </div>                    
                @endauth

                @guest
                    <ul class="flex align-items-center">
                        <li>
                            <a href="{{ route('login') }}" class="p-3 tracking-wider">Login</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="p-3 tracking-wider">Register</a>
                        </li>
                    </ul>
                @endguest                  
            </nav>
        </header>
  
        {{ $slot }}
    </body>
</html>