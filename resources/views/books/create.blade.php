<!DOCTYPE html>
<html lang="id">
<head>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Tambah Buku</h1>

        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

            <label>Kode Buku:</label> 
            <input type="text" name="kode_buku" value="{{ old('kode_buku') }}" required><br> 

            <label>Judul Buku:</label> 
            <input type="text" name="judul_buku" value="{{ old('judul_buku') }}" required><br> 

            <label>Pengarang:</label> 
            <input type="text" name="pengarang" value="{{ old('pengarang') }}" required><br> 

            <label>Penerbit:</label> 
            <input type="text" name="penerbit" value="{{ old('penerbit') }}" required><br> 

            <label for="tahun_terbit">Tahun Terbit:</label>
            <input type="month" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit') }}" required><br>

            <label>Foto Cover:</label> 
            <input type="file" name="foto_cover"><br> 

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

            <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
