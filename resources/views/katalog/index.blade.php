<h1>Daftar Produk</h1>
<table border="1" cellpadding="10">
    <tr>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Aksi</th>
    </tr>
    @foreach($produk as $p)
    <tr>
        <td>{{ $p['nama'] }}</td>
        <td>{{ $p['harga'] }}</td>
        <td><a href="{{ route('katalog.show', $p['id']) }}">Detail</a></td>
    </tr>
    @endforeach
</table>
<br>
<a href="{{ route('profil.index') }}">Kembali ke Profil</a>
