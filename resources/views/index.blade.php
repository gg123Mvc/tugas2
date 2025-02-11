<!-- Kode HTML -->
<h1>Daftar Buku</h1>
<a href="{{ route('books.create') }}"class="btn btn-secondary"> Tambah Buku</a>
<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<table border="1">
    <tr>
        <th>Kode Buku</th>
        <th>Judul Buku</th>
        <th>Pengarang</th>
        <th>Penerbit</th>
        <th>Tahun Terbit</th>
        <th>Foto Cover</th>
        <th>Aksi</th>
    </tr>
    @foreach ($books as $book)
    <tr>
        <td>{{ $book->kode_buku }}</td>
        <td>{{ $book->judul_buku }}</td>
        <td>{{ $book->pengarang }}</td>
        <td>{{ $book->penerbit }}</td>
        <td>{{ $book->tahun_terbit }}</td>
        <td>
            <img src="{{ asset('images/' . $book->foto_cover) }}" width="50">
        </td>
        <td>
            <a href="{{ route('books.edit', $book->id) }}"class="btn btn-secondary">Edit</a>
            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</button>
</form>

        </td>
    </tr>
    @endforeach
</table>
