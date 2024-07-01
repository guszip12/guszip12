<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summary Page - My Laravel App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS untuk menambahkan jarak antara gambar dan garis card serta mengatur ukuran gambar */
        .custom-img {
            width: 200px; /* Lebar gambar */
            height: 300px; /* Tinggi gambar */
            object-fit: cover; /* Menyamakan aspek gambar dengan kotak yang diberikan */
            margin: 20px auto; /* Menambahkan jarak antara gambar dan konten card, serta membuatnya center */
            display: block; /* Agar gambar di center */
        }

        .card-body-custom {
            padding: 20px; /* Atur padding di dalam card body */
        }

        /* Styling untuk versi cetak */
        @media print {
            body * {
                visibility: hidden;
            }
            #printableArea, #printableArea * {
                visibility: visible;
            }
            #printableArea {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }

            /* Hilangkan tombol cetak saat mencetak */
            .btn-print {
                display: none;
            }
        }

        /* Styling untuk catatan */
        .note {
            margin-top: 50px;
            font-size: 0.9rem;
            text-align: left; /* Menyesuaikan teks kiri */
        }

        .note ul {
            padding-left: 20px; /* Menambahkan padding kiri ke dalam daftar */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Summary Page</h1>

        @if($submittedData)
            <div id="printableArea" class="card mb-4 shadow-sm">
                <div class="row g-0">
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <img src="{{ asset($submittedData['foto']) }}" alt="Foto" class="img-fluid custom-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body card-body-custom">
                            <h5 class="card-title bg-light p-3 rounded">Formulir Pengajuan</h5>
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>Nomor Registrasi</th>
                                        <td>{{ $submittedData['nomor_registrasi'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>No. KTP</th>
                                        <td>{{ $submittedData['ktp'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <td>{{ $submittedData['name'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{ $submittedData['alamat'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>HP</th>
                                        <td>{{ $submittedData['hp'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $submittedData['email'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Asal Sekolah</th>
                                        <td>{{ $submittedData['school_name'] }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="text-end me-3 mb-3">
                    <button class="btn btn-primary mt-3 btn-print" onclick="printDiv('printableArea')">Cetak Formulir</button>
                </div>
                <div class="note ms-3 mb-4">
                    <p><strong>Catatan:</strong></p>
                    <ul>
                        <li>Cetak dan lampirkan bukti formulir pendaftaran bersamaan dengan berkas <br> pengajuan (seperti surat resmi PKL dari sekolah/Universitas dan surat izin PKL dari <br> KESBANGPOL ke Kantor Dinas).</li>
                    </ul>
                </div>
            </div>
        @else
            <div class="alert alert-warning" role="alert">
                Tidak ada data pengajuan yang baru saja disubmit.
            </div>
        @endif
    </div>

    <script>
        function printDiv(divId) {
            window.print();
        }
    </script>
</body>
</html>
