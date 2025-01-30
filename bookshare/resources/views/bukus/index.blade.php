<!-- resources/views/bukus/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Buku</h1>

        <a href="{{ route('bukus.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>
        <a href="{{ url('/dashboard') }}" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @foreach ($bukus as $buku)
            <div class="col-md-4">
                <div class="card mb-4">
                    @if ($buku->cover_image)
                        <img src="{{ asset('storage/' . $buku->cover_image) }}" class="card-img-top" alt="Cover Image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $buku->judul }}</h5>
                        <p class="card-text">{{ $buku->penulis }}</p>
                        <a href="{{ route('bukus.show', $buku->id) }}" class="btn btn-info">Lihat</a>
                        <a href="{{ route('bukus.edit', $buku->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('bukus.destroy', $buku->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
         @endforeach
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" defer></script>
</body>
</html>
