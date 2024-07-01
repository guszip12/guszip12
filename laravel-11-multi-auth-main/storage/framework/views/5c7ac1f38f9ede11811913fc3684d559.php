<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
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
        
        <div class="d-flex justify-content-between align-items-center mt-5">
            <h1 class="text-center mb-4">Data Mahasiswa</h1>
            
        </div>

        <div id="printableArea" class="card mb-4 shadow-sm">
            <div class="row g-0">
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                    <img src="<?php echo e(asset($mahasiswa->foto)); ?>" alt="Foto" class="img-fluid custom-img">
                </div>
                <div class="col-md-8">
                    <div class="card-body card-body-custom">
                        <form action="<?php echo e(route('admin.update-mahasiswa', ['id' => $mahasiswa->id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="mb-3">
                                <label for="nomor_registrasi" class="form-label">Nomor Registrasi</label>
                                <input type="text" class="form-control" id="nomor_registrasi" name="nomor_registrasi" value="<?php echo e($mahasiswa->nomor_registrasi); ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="ktp" class="form-label">No. KTP</label>
                                <input type="text" class="form-control" id="ktp" name="ktp" value="<?php echo e($mahasiswa->ktp); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo e($mahasiswa->name); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo e($mahasiswa->alamat); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="hp" class="form-label">HP</label>
                                <input type="text" class="form-control" id="hp" name="hp" value="<?php echo e($mahasiswa->hp); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo e($mahasiswa->email); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="asal_sekolah" class="form-label">Asal Sekolah/Kampus</label>
                                <input type="text" class="form-control" id="asal_sekolah" name="school_name" value="<?php echo e($mahasiswa->school_name); ?>">
                            </div>
                            <!-- Tambahkan input untuk field lainnya sesuai kebutuhan -->
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel SOON -->
        <div class="mt-5">
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th colspan="2">Coming Soon</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="2">Stay tuned for exciting updates!</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<?php /**PATH D:\laravel-11-multi-auth-main\resources\views\admin\layouts\edit-mahasiswa.blade.php ENDPATH**/ ?>