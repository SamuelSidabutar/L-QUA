<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Detail Buku</h1>

        <div class="card mb-4">
            @if ($buku->cover_image)
                <img src="{{ asset('storage/' . $buku->cover_image) }}" class="card-img-top" alt="Cover Image">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $buku->judul }}</h5>
                <p class="card-text"><strong>Penulis:</strong> {{ $buku->penulis }}</p>
                <p class="card-text"><strong>Deskripsi:</strong> {{ $buku->deskripsi }}</p>

                <h5>Komentar</h5>
                <form action="{{ route('komentars.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="buku_id" value="{{ $buku->id }}">
                    <div class="form-group">
                        <textarea name="isi_komentar" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Tambah Komentar</button>
                </form>

                @foreach ($komentars as $komentar)
                    <div class="mt-3">
                        <p>{{ $komentar->isi_komentar }} - <strong>{{ $komentar->user->name }}</strong></p>
                        @if ($komentar->user_id == auth()->id())
                            <form action="{{ route('komentars.destroy', $komentar->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <a href="{{ route('bukus.index') }}" class="btn btn-secondary">Kembali ke Daftar Buku</a>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" defer></script>
</body>
</html>
