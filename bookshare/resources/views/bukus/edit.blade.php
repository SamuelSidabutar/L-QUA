<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Buku</h1>

        <form action="{{ route('bukus.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" id="judul" name="judul" class="form-control" value="{{ $buku->judul }}" required>
            </div>
            <div class="form-group">
                <label for="penulis">Penulis:</label>
                <input type="text" id="penulis" name="penulis" class="form-control" value="{{ $buku->penulis }}" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control">{{ $buku->deskripsi }}</textarea>
            </div>
            <div class="form-group">
                <label for="cover_image">Cover Image:</label>
                <input type="file" id="cover_image" name="cover_image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

        <a href="{{ route('bukus.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Buku</a>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" defer></script>
</body>
</html>

