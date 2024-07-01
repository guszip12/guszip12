<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syarat/Ketentuan</title>
    <!-- Load Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border: none;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        .card-header, .card-footer {
            background-color: #73c990;
            color: white;
        }
        .list-group-item {
            border: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mt-5 mb-4 text-center">Syarat/Ketentuan</h2>

        <div class="card">
            <div class="card-header">
                <h4>Peraturan PKL</h4>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">1. Siswa/Mahasiswa harus mengikuti peraturan yang berlaku.</li>
                    <li class="list-group-item">2. Apabila melanggar kebijakan yang berlaku dengan tidak menjaga nama baik instansi, maka akan dikenakan sanksi yang tegas.</li>
                    <li class="list-group-item">3. Siswa/Mahasiswa harus membawa/melampirkan hardcopy berkas yang sudah diunggah seperti:
                        <ul>
                            <li>Surat resmi PKL dari sekolah/kampus</li>
                            <li>Surat keterangan PKL dari KESBAGPOL dengan cap/stempel resmi</li>
                            <li>Bukti formulir pendaftaran untuk berkas PKL yang akan diajukan ke Kantor Dinas</li>
                        </ul>
                    </li>
                    <li class="list-group-item">4. Siswa/Mahasiswa harus mengenakan pakaian formal:
                        <ul>
                            <li>Atasan kemeja putih (laki-laki, perempuan)</li>
                            <li>Bawahan celana hitam (laki-laki) atau rok hitam (wanita)</li>
                            <li>Sepatu hitam (pantofel hitam / flatshoes hitam), dilarang menggunakan sneakers</li>
                        </ul>
                    </li>
                    <li class="list-group-item">5. Maksimal waktu PKL adalah 3 bulan.</li>
                    <li class="list-group-item">6. Di akhir PKL siswa/mahasiswa akan melakukan presentasi.</li>
                </ul>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('home') }}" class="btn btn-light">Kembali ke Beranda</a>
            </div>
        </div>
    </div>

    <!-- Load Bootstrap JS (if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
