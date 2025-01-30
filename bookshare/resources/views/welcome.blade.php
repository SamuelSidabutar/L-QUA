<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BookShare</title>
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .hero {
            background: url('{{ asset('images/background.jpg') }}') no-repeat center center;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: black;
            text-align: center;
            padding: 0 20px;
        }
        .hero h1,
        .hero p {
            background-color: rgba(255, 255, 255, 0.8); /* Warna putih dengan transparansi */
            color: #000;
            padding: 10px 20px;
            border-radius: 8px;
            display: inline-block;
        }
        .hero h1 {
            font-size: 3rem;
        }
        .hero p {
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="hero">
        <div>
            <h1 class="text-4xl font-bold">Selamat Datang di BookShare</h1>
            <p class="text-xl mt-4">Tempat berbagi dan menemukan buku favoritmu!</p>
            @if (Route::has('login'))
                <div class="mt-6">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="bg-primary text-white font-bold py-2 px-4 rounded">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="bg-primary text-white font-bold py-2 px-4 rounded">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-secondary text-white font-bold py-2 px-4 rounded ml-2">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" defer></script>
</body>
</html>


           
