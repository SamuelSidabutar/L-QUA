<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - BookShare</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px;
            background-color: #343a40;
            color: white;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
        }
        .sidebar .nav-item {
            margin-bottom: 10px;
        }
        .main-content {
            margin-left: 220px;
            padding: 20px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.8), rgba(240, 240, 240, 0.8));
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>BookShare</h2>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('bukus.index') }}">Daftar Buku</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('bukus.create') }}">Tambah Buku</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </div>

    <div class="main-content">
        <h1>Dashboard</h1>
        <p>Selamat datang, {{ Auth::user()->name }}!</p>

        <!-- Tambahkan konten dashboard lainnya di sini -->
        <div class="card">
            <div class="card-header">
                Statistik
            </div>
            <div class="card-body">
                <h5 class="card-title">Jumlah Buku</h5>
                <p class="card-text">{{ $jumlahBuku }}</p>
                <a href="{{ route('bukus.index') }}" class="btn btn-primary">Lihat Buku</a>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                Aktivitas Terbaru
            </div>
            <div class="card-body">
                <!-- Tambahkan daftar aktivitas terbaru di sini -->
                <ul class="list-group">
                    <li class="list-group-item">Pengguna {{ Auth::user()->name }} menambahkan buku baru.</li>
                    <!-- Tambahkan item lainnya -->
                </ul>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>

