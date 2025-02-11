<!DOCTYPE html>
<html lang="id">
<head>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
</head>
<body>
    <h1>Edit Buku</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data"> 
    @csrf 
    @method('PUT') 

    <label>Kode Buku:</label> 
    <input type="text" name="kode_buku" value="{{ $book->kode_buku }}" readonly><br> 

    <label>Judul Buku:</label> 
    <input type="text" name="judul_buku" value="{{ $book->judul_buku }}" required><br> 

    <label>Pengarang:</label> 
    <input type="text" name="pengarang" value="{{ $book->pengarang }}" required><br> 

    <label>Penerbit:</label> 
    <input type="text" name="penerbit" value="{{ $book->penerbit }}" required><br> 

    <label for="tahun_terbit">Tahun Terbit:</label>
    <input type="month" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit', date('Y-m', strtotime($book->tahun_terbit))) }}" required>

    <label>Foto Cover:</label> 
    <input type="file" name="foto_cover"><br> 

    <button type="submit">Simpan Perubahan</button> 
</form>


    <a href="{{ route('books.index') }}"class="btn btn-secondary" >Kembali ke Daftar Buku</a>
</body>
</html>
