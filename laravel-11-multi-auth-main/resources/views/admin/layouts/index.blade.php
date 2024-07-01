<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Dokumentasi</h2>

        <!-- Tombol Tambah Dokumentasi -->
        <a href="{{ route('admin.dokumentasi.create') }}" class="btn btn-primary mb-3">Tambah Dokumentasi</a>

        <!-- Tabel untuk Menampilkan Dokumentasi -->
        <div class="row">
            <div class="col-md-6">
                <h3>Presentasi PKL</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Deskripsi</th>
                            <th>Jenis</th>
                            <th>Aksi</th> <!-- Kolom untuk tombol delete -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dokumentasi as $doc)
                            @if($doc->jenis == 'Persentasi PKL')
                                <tr>
                                    <td><img src="{{ asset('images/' . $doc->gambar) }}" alt="{{ $doc->deskripsi }}" style="max-width: 100px;"></td>
                                    <td>{{ $doc->deskripsi }}</td>
                                    <td>{{ $doc->jenis }}</td>
                                    <td>
                                        <form action="{{ route('admin.dokumentasi.delete', $doc->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <h3>Kegiatan PKL</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Deskripsi</th>
                            <th>Jenis</th>
                            <th>Aksi</th> <!-- Kolom untuk tombol delete -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dokumentasi as $doc)
                            @if($doc->jenis == 'Kegiatan PKL')
                                <tr>
                                    <td><img src="{{ asset('images/' . $doc->gambar) }}" alt="{{ $doc->deskripsi }}" style="max-width: 100px;"></td>
                                    <td>{{ $doc->deskripsi }}</td>
                                    <td>{{ $doc->jenis }}</td>
                                    <td>
                                        <form action="{{ route('admin.dokumentasi.delete', ['id' => $doc->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tombol Kembali ke Home -->
        <a href="{{ route('home') }}" class="btn btn-secondary">Kembali ke Beranda</a>

    </div>
</body>
</html>
