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
                <button>
                    <a href="" class="p-3">Dashboard</a>
                </button>
                {{-- <ul class="flex align-items-center">
                    <li>
                        <a href="" class="p-3">Home</a>
                    </li>
                    <li>
                        <a href="" class="p-3">Invoices</a>
                    </li>
                </ul> --}}
                <ul class="flex align-items-center">
                    <li>
                        <a href="" class="p-3">Admin</a>
                    </li>
                    <li>
                        <a href="" class="p-3">Login</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="p-3">Register</a>
                    </li>
                    <li>
                        <a href="" class="p-3">Logout</a>
                    </li>
                </ul>
            </nav>
        </header>

        
        
        {{ $slot }}
    </body>
</html>