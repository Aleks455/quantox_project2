@props(['name'])
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Invoice application</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="bg-gray-200">
        <header class="">
            <nav class="p-6 bg-white flex justify-between mb-7">
                @auth
                    <div class="pl-5">
                        <button class="pr-5">
                            <a href="{{ route('invoices') }}">Invoices</a>
                        </button> 
                     
                        <button class="pl-2">
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
                        <a href="{{ route('user') }}" class="p-3">{{ auth()->user()->first_name }}</a>
                    </button>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="mr-8">Logout</button> 
                    </form>  
                </div>                    
                @endauth

                @guest
                    <ul class="flex align-items-center">
                        <li>
                            <a href="{{ route('login') }}" class="p-3">Login</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="p-3">Register</a>
                        </li>
                    </ul>
                @endguest                  
            </nav>
        </header>
  
        {{ $slot }}
    </body>
</html>