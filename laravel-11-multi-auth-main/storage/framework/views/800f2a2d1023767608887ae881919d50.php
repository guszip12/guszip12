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
        <a href="<?php echo e(route('admin.dokumentasi.create')); ?>" class="btn btn-primary mb-3">Tambah Dokumentasi</a>

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
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $dokumentasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($doc->jenis == 'Persentasi PKL'): ?>
                                <tr>
                                    <td><img src="<?php echo e(asset('images/' . $doc->gambar)); ?>" alt="<?php echo e($doc->deskripsi); ?>" style="max-width: 100px;"></td>
                                    <td><?php echo e($doc->deskripsi); ?></td>
                                    <td><?php echo e($doc->jenis); ?></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $dokumentasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($doc->jenis == 'Kegiatan PKL'): ?>
                                <tr>
                                    <td><img src="<?php echo e(asset('images/' . $doc->gambar)); ?>" alt="<?php echo e($doc->deskripsi); ?>" style="max-width: 100px;"></td>
                                    <td><?php echo e($doc->deskripsi); ?></td>
                                    <td><?php echo e($doc->jenis); ?></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tombol Kembali ke Home -->
        <a href="<?php echo e(route('home')); ?>" class="btn btn-secondary">Kembali ke Beranda</a>

    </div>
</body>
</html>
<?php /**PATH D:\laravel-11-multi-auth-main\resources\views/layouts/index.blade.php ENDPATH**/ ?>