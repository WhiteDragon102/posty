<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posty</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body class="bg-gray-300">
    {{-- Navation Bar --}}
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex align-items-center">
            <li>
                <a href="/" class="p-3">Home</a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('posts') }}" class="p-3">Post</a>
            </li>
        </ul>


        <ul class="flex align-items-center">
            {{-- check if user is logged in --}}
            {{-- @if (auth()->user()) --}}
            {{-- If user is logged in show details and logout --}}
            @auth 
            {{-- laravel auth function, checks if user is logged in --}}
                <li>
                    <a href="" class="p-3">{{  auth()->user()->name  }}</a>
                </li>
            
                <li>
                    <form action="{{ route('logout') }}" method="post" class="inline">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            @endauth  
            
            @guest
            {{-- laravel function if no user is logged in --}}
           
            {{-- @else --}}
            {{-- if not logged in show login and register links --}}
                <li>
                    <a href="{{ route('login')}}" class="p-3">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="p-3">Register</a>
                </li>
            {{-- @endif --}}

            @endguest
        </ul>
    </nav>
    {{-- End Navation Bar --}}
    @yield('content') 
    
</body>
</html>