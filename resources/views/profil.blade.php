<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Mahasiswa</title>
</head>
<body>
    <h1>Profil Mahasiswa</h1>
    <p>Nama: <strong>{{ $nama }}</strong></p>
    <p>NIM: <strong>{{ $nim }}</strong></p>
    <p>Program Studi: {{ $prodi }}</p>
    <p>Semester: {{ $semester }}</p>

    <h3>Keahlian:</h3>
    <ul>
        @foreach($keahlian as $skill)
            <li>{{ $skill }}</li>
        @endforeach
    </ul>

    <hr>
    <a href="{{ route('katalog.index') }}">Lihat Katalog Produk</a> |
    <a href="{{ route('statis.about') }}">Tentang Kami</a>
</body>
</html>
