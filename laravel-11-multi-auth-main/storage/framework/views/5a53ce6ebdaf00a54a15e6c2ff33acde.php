<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pengajuan</title>
    <!-- Load Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="mt-5 mb-4">Registrasi Pengajuan</h2>

        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <form action="<?php echo e(route('submit.pkl')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <!-- Tambahkan kolom status (hidden) dengan nilai default 'Pending' -->
            <input type="hidden" name="status" value="Belum Validasi">

            <div class="mb-3">
                <label for="ktp" class="form-label">No. KTP:</label>
                <input type="text" class="form-control" id="ktp" name="ktp" required>
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>

            <div class="mb-3">
                <label for="hp" class="form-label">HP:</label>
                <input type="text" class="form-control" id="hp" name="hp" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password:</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>

            <div class="mb-3">
                <label for="asal_sekolah" class="form-label">Asal Sekolah:</label>
                <select class="form-select" id="asal_sekolah" name="asal_sekolah" required>
                    <option value="">Pilih Asal Sekolah</option>
                    <option value="SMA/SMK">SMA/SMK</option>
                    <option value="Universitas/Sekolah Tinggi">Universitas/Sekolah Tinggi</option>
                </select>
            </div>

            <div id="school_name" class="mb-3 d-none">
                <label for="nama_sekolah" class="form-label">Nama Sekolah/Perguruan Tinggi:</label>
                <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah">
            </div>            

            <div class="mb-3">
                <label for="surat_kpl" class="form-label">Unggah Surat KPL (PDF):</label>
                <input type="file" class="form-control" id="surat_kpl" name="surat_kpl" accept=".pdf" required>
            </div>

            <div class="mb-3">
                <label for="surat_kesbangpol" class="form-label">Unggah Surat KESBANGPOL (PDF):</label>
                <input type="file" class="form-control" id="surat_kesbangpol" name="surat_kesbangpol" accept=".pdf" required>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Unggah Foto:</label>
                <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
            </div>

            <div class="mb-3">
                <label for="tgl_mulai" class="form-label">Tanggal Mulai PKL:</label>
                <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" required>
            </div>

            <div class="mb-3">
                <label for="tgl_selesai" class="form-label">Tanggal Berakhir PKL:</label>
                <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" required>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const asalSekolahSelect = document.getElementById('asal_sekolah');
                    const schoolNameInput = document.getElementById('school_name');

                    asalSekolahSelect.addEventListener('change', function() {
                        const selectedOption = asalSekolahSelect.value;
                        if (selectedOption === 'SMA/SMK' || selectedOption === 'Universitas/Sekolah Tinggi') {
                            schoolNameInput.classList.remove('d-none');
                        } else {
                            schoolNameInput.classList.add('d-none');
                        }
                    });
                });
            </script>            

            <button type="submit" class="btn btn-primary">Kirim</button>
            <button type="reset" class="btn btn-secondary">Batal</button>
        </form>
    </div>

    <!-- Load Bootstrap JS (if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH D:\laravel-11-multi-auth-main\resources\views\layouts\pengajuan.blade.php ENDPATH**/ ?>