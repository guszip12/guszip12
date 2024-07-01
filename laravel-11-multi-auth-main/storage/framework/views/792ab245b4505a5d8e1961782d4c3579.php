<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="container">
        <!-- Header dengan Logo -->
        <div class="text-center my-4">
            <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo" class="img-fluid" style="max-width: 200px;">
        </div>

        <!-- Informasi Kota -->
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Informasi Kota</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eget tincidunt metus. Sed eget lectus euismod, sollicitudin arcu eu, cursus tellus.</p>
            </div>
        </div>

        <div class="row">
            <!-- Konten Utama -->
            <div class="col-lg-9">
                <!-- Tabel Data Barang -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Bidang</th>
                                        <th>Jumlah Kuota</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Contoh data barang -->
                                    <tr>
                                        <td>1</td>
                                        <td>Bidang A</td>
                                        <td>10</td>
                                        
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Bidang B</td>
                                        <td>8</td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Informasi Tambahan -->
                <div class="row">
                    <?php
                        $presentasi = null;
                        $kegiatan = null;
                    ?>

                    <?php $__currentLoopData = $dokumentasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($doc->jenis == 'Persentasi PKL' && !$presentasi): ?>
                            <?php
                                $presentasi = $doc;
                            ?>
                        <?php endif; ?>

                        <?php if($doc->jenis == 'Kegiatan PKL' && !$kegiatan): ?>
                            <?php
                                $kegiatan = $doc;
                            ?>
                        <?php endif; ?>

                        <?php if($presentasi && $kegiatan): ?>
                            <?php break; ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if($presentasi): ?>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <img src="<?php echo e(asset('images/' . $presentasi->gambar)); ?>" class="card-img-top" alt="Presentasi PKL" style="max-width: 100%; height: auto;">
                                <div class="card-body">
                                    <h5 class="card-title">Persentasi PKL</h5>
                                    <p><?php echo e($presentasi->deskripsi); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($kegiatan): ?>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <img src="<?php echo e(asset('images/' . $kegiatan->gambar)); ?>" class="card-img-top" alt="Kegiatan PKL" style="max-width: 100%; height: auto;">
                                <div class="card-body">
                                    <h5 class="card-title">Kegiatan PKL</h5>
                                    <p><?php echo e($kegiatan->deskripsi); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Tombol Selengkapnya -->
                <div class="col-md-12 text-end">
                    <a href="/index" class="btn btn-primary mt-3">Selengkapnya</a>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Menu</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item custom-list-group-item">
                                <a href="https://www.kominfostatistik.denpasarkota.go.id/" class="btn btn-outline-primary">
                                    <i class="fas fa-globe"></i> Web Kominfo
                                </a>
                            </li>
                            <li class="list-group-item custom-list-group-item">
                                <a href="<?php echo e(route('pengajuan')); ?>" class="btn btn-outline-primary">
                                    <i class="fas fa-file-alt"></i> Pengajuan
                                </a>
                            </li>
                            <li class="list-group-item custom-list-group-item">
                                <a href="<?php echo e(route('cek.form.pengajuan')); ?>" class="btn btn-outline-primary">
                                    <i class="fas fa-search"></i> Cek Pengajuan
                                </a>
                            </li>
                            <li class="list-group-item custom-list-group-item">
                                <a href="<?php echo e(route('syarat.ketentuan')); ?>" class="btn btn-outline-primary">
                                    <i class="fas fa-info-circle"></i> Syarat/Ketentuan
                                </a>
                            </li>
                            
                            <?php if(Route::has('login')): ?>
                                <li class="list-group-item custom-list-group-item">
                                    <?php if(auth()->guard('web')->check()): ?>
                                        <a href="<?php echo e(url('/dashboard')); ?>" class="text-decoration-none">Dashboard</a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('login')); ?>" class="btn btn-outline-primary">Log in</a>

                                        
                                    <?php endif; ?>
                                </li>
                                <li class="list-group-item custom-list-group-item">
                                    <?php if(auth()->guard('admin')->check()): ?>
                                        <a href="<?php echo e(url('/admin/dashboard')); ?>" class="text-decoration-none">Admin Dashboard</a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('admin.login')); ?>" class="btn btn-outline-primary">Admin Log in</a>

                                        
                                    <?php endif; ?>
                                </li>
                                
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<style>
    .custom-card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .custom-card .card-body {
        padding: 1.5rem;
    }
    .custom-list-group-item {
        transition: background-color 0.3s, transform 0.3s;
    }
    .custom-list-group-item:hover {
        background-color: #f0f0f0;
        transform: scale(1.02);
    }
    .custom-list-group-item a {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .custom-list-group-item i {
        color: #000000;
    }
</style><?php /**PATH D:\laravel-11-multi-auth-main\resources\views\welcome.blade.php ENDPATH**/ ?>