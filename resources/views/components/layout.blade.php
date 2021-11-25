@props(['name'])
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <title>Invoice application</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <script defer src="https://unpkg.com/alpinejs@3.5.0/dist/cdn.min.js"></script>

        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
	    {{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jautocalc@1.3.1/dist/jautocalc.js"></script> --}}
        {{-- <script src="{{ asset('js/autocalc.js') }}"></script> --}}
        
        {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
        <script src="{{ mix('/js/app.js') }}"></script>

        
        {{-- <script src="https://unpkg.com/vue@next"></script> --}}


    </head>
    <body class="bg-gray-200 text-sm text-gray-800 tracking-wider font-weight-500 mb-10">
        <header>
            <nav class="p-6 bg-white flex justify-between mb-7 hover-text-gray-700">
                @auth
                    <div class="pl-5">
                        <button class="pr-3 tracking-wider">
                            <a href="{{ route('dashboard.index') }}">Dashboard</a>
                        </button> 

                        <button class="pr-3 tracking-wider">
                            <a href="{{ route('invoices.index') }}">Invoices</a>
                        </button> 
                     
                        <button class="tracking-wider hover-text-800">
                            <a href="{{ route('clients') }}">Clients</a>
                        </button>
                    </div>
                @endauth

                @guest
                <div class="w-8">    
                    <img src="images/invoice2.png" alt="Invoice app logo">
                </div>
                @endguest
                
                @auth
                <div>
                    <button class="pr-3">
                        <a href="{{ route('user') }}" class="tracking-wider">{{ auth()->user()->first_name }}</a>
                    </button>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="mr-8 tracking-wider">Logout</button> 
                    </form>  
                </div>                    
                @endauth

                @guest
                    <ul class="flex">
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