<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Presentasi PKL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mt-5">
            <h2>Presentasi PKL</h2>
        </div>
        <form action="<?php echo e(route('update-presentasi', ['id' => $user->id])); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-3">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="name" value="<?php echo e($user->name); ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="asal_sekolah" class="form-label">Asal Sekolah/Kampus</label>
                <input type="text" class="form-control" id="asal_sekolah" name="school_name" value="<?php echo e($user->school_name); ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="jadwal_presentasi">Jadwal Presentasi:</label>
                <input type="date" class="form-control" id="jadwal_presentasi" name="jadwal_presentasi" value="<?php echo e($user->jadwal_presentasi); ?>" required>
            </div>

            <div class="mb-3">
                <label for="jam_presentasi">Jam:</label>
                <input type="time" class="form-control" id="jam_presentasi" name="jam_presentasi" value="<?php echo e($user->jam_presentasi); ?>" required>
            </div>

            <div class="mb-3">
                <label for="topik_presentasi">Topik Presentasi:</label>
                <input type="text" class="form-control" id="topik_presentasi" name="topik_presentasi" value="<?php echo e($user->topik_presentasi); ?>" required>
            </div>

            <div class="mb-3">
                <label for="ruangan">Ruangan:</label>
                <input type="text" class="form-control" id="ruangan" name="ruangan" value="<?php echo e($user->ruangan); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH D:\laravel-11-multi-auth-main\resources\views\layouts\edit-presentasi.blade.php ENDPATH**/ ?>