<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buku Tamu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <main>
        <nav class="navbar navbar-light bg-light">
            <a href="{{Route('index')}}">Dashboard</a>
            <a href="{{Route('create')}}">Tamu Baru</a>
            @auth
            @php
                $user
            @endphp
                <span>Selamat Datang {{auth()->user()->name}}</span>
                <a href="{{Route('listUser', auth()->user()->id)}}">List Tamu Anda</a>
                <form method="POST" action="{{Route('auth.logout')}}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>    
                @else
                <a href="{{Route('auth.login')}}">Login</a>
                <a href="{{Route('auth.register')}}">Register</a>
            @endauth
        </nav>
        {{-- @yield('content') --}}
        {{ $slot }}
        <footer>
            <img src="{{asset('images/ruka_pc.png')}}" alt="" srcset="">
        </footer>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> 
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-swal-message />
</body>
</html>