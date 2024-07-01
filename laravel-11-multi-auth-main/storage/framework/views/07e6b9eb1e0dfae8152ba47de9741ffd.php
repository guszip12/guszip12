<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="data-mahasiswa-pkl" class="content-section active">
                                    <div class="form-container">
                                        <div class="image-container">
                                            <img src="<?php echo e(asset($mahasiswa->foto)); ?>" alt="Foto" class="img-fluid custom-img">
                                        </div>
                                        <div class="form-wrapper">
                                            <h5 style="margin-bottom: 10px;">Data Anda</h5>
                                            <form id="mahasiswaForm">
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
                                                    <label for="name" class="form-label">Nama</label>
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
                                                    <label for="school_name" class="form-label">Asal Sekolah/Kampus</label>
                                                    <input type="text" class="form-control" id="school_name" name="school_name" value="<?php echo e($mahasiswa->school_name); ?>">
                                                </div>
                                                <button type="button" class="btn btn-primary" onclick="updateMahasiswa()">Simpan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div id="kegiatan-pkl" class="content-section">
                                    <h2 class="mt-5">Kegiatan PKL</h2>

                                    <div class="mt-4">
                                        <form id="kegiatanForm">
                                            <?php echo csrf_field(); ?>
                                            <div class="mb-3">
                                                <label for="tanggal_kegiatan" class="form-label">Tanggal Kegiatan</label>
                                                <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan">
                                            </div>
                                            <div class="mb-3">
                                                <label for="tanggal_berakhir" class="form-label">Tanggal Berakhir</label>
                                                <input type="date" class="form-control" id="tanggal_berakhir" name="tanggal_berakhir">
                                            </div>
                                            <div class="mb-3">
                                                <label for="kegiatan_file" class="form-label">File Kegiatan</label>
                                                <input type="file" class="form-control" id="kegiatan_file" name="kegiatan_file">
                                            </div>
                                            <div class="mb-3">
                                                <button type="button" class="btn btn-primary" onclick="simpanKegiatan()">Upload Kegiatan</button>
                                            </div>
                                        </form>

                                        <div class="mt-4">
                                            <h5>Daftar Kegiatan PKL</h5>
                                            <div class="activities-container">
                                                <?php if($kegiatan && count($kegiatan) > 0): ?>
                                                    <?php $__currentLoopData = $kegiatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="activity-item">
                                                            <div class="activity-content">
                                                                <p><strong>No:</strong> <?php echo e($index + 1); ?></p>
                                                                <p><strong>Tanggal Kegiatan:</strong> <?php echo e($item->tanggal_kegiatan); ?></p>
                                                                <p><strong>Tanggal Berakhir:</strong> <?php echo e($item->tanggal_berakhir); ?></p>
                                                                <p><strong>File Kegiatan:</strong> <a href="<?php echo e(Storage::url($item->surat_kegiatan)); ?>" target="_blank">Lihat File</a></p>
                                                                <button class="btn btn-danger" onclick="deleteKegiatan(<?php echo e($item->id); ?>)">Delete</button>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    <div class="activity-item">
                                                        <div class="activity-content text-center">
                                                            Belum ada kegiatan yang tersimpan.
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="jadual-presentasi-pkl" class="content-section">
                                    <h2 id="np1" class="mt-5 text-center">Jadwal Presentasi PKL</h2>
                                    <div class="table-responsive text-center mx-auto" style="max-width: 100%;">
                                        <table class="table table-bordered mt-3">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>                                                   
                                                    <th>Asal Sekolah/Kampus</th>
                                                    <th>Jadwal Presentasi</th>
                                                    <th>Jam</th>
                                                    <th>Topik Presentasi</th>
                                                    <th>Ruangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($index + 1); ?></td>
                                                        <td><?php echo e($user->name); ?></td>
                                                        <td><?php echo e($user->school_name); ?></td>
                                                        <td><?php echo e($user->jadwal_presentasi); ?></td>
                                                        <td><?php echo e($user->jam_presentasi); ?></td>
                                                        <td><?php echo e($user->topik_presentasi); ?></td>
                                                        <td><?php echo e($user->ruangan); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Nilai PKL -->
                                <div id="nilai-pkl" class="content-section">
                                    <h2 id="np1" class="mt-5 text-center">Nilai PKL</h2>
                                    <div class="table-responsive text-center mx-auto">
                                        <table class="table table-bordered">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Asal Sekolah/Kampus</th>
                                                    <th>Bidang</th>
                                                    <th>Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo e($mahasiswa->name); ?></td>
                                                    <td><?php echo e($mahasiswa->school_name); ?></td>
                                                    <td><?php echo e($mahasiswa->bidang); ?></td>
                                                    <td><?php echo e($mahasiswa->nilai); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>                                
                                </div>

                                <!-- Rekap Laporan -->
                                <div id="rekap-laporan" class="content-section">
                                    <h2 id="np1" class="mt-5 text-center">Rekap Laporan</h2>
                                    <div class="table-responsive text-center mx-auto">
                                        <table class="table table-bordered">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Bidang</th>
                                                    <th>Nama Seksi</th>
                                                    <th>Nama Pembimbing</th>
                                                    <th>Laporan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo e($mahasiswa->name); ?></td>
                                                    <td><?php echo e($mahasiswa->bidang); ?></td>
                                                    <td><?php echo e($mahasiswa->name_seksi); ?></td>
                                                    <td><?php echo e($mahasiswa->name_pembina); ?></td>
                                                    <td>
                                                        <?php if($mahasiswa->rekap_laporan): ?>
                                                            <a href="<?php echo e(Storage::url($mahasiswa->rekap_laporan)); ?>" target="_blank">Lihat Laporan</a>
                                                        <?php else: ?>
                                                            Belum ada laporan
                                                        <?php endif; ?>
                                                    </td>
                                                    <?php if(!$mahasiswa->rekap_laporan): ?>
                                                        <td>
                                                            <form id="laporanForm-<?php echo e($mahasiswa->id); ?>" enctype="multipart/form-data">
                                                                <?php echo csrf_field(); ?>
                                                                <input type="file" class="form-control mb-2" name="rekap_laporan" required>
                                                                <button type="button" class="btn btn-primary" onclick="uploadLaporan(<?php echo e($mahasiswa->id); ?>)">Submit</button>
                                                            </form>
                                                        </td>
                                                    <?php else: ?>
                                                        <td>
                                                            <form id="updateForm-<?php echo e($mahasiswa->id); ?>" enctype="multipart/form-data">
                                                                <?php echo csrf_field(); ?>
                                                                <input type="file" class="form-control mb-2" name="rekap_laporan" required>
                                                                <button type="button" class="btn btn-primary" onclick="updateLaporan(<?php echo e($mahasiswa->id); ?>)">Update</button>
                                                            </form>
                                                        </td>
                                                    <?php endif; ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>                                                                                                                                                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function updateMahasiswa() {
        $.ajax({
            url: '<?php echo e(route('update-mahasiswa', ['id' => $mahasiswa->id])); ?>',
            type: 'PUT',
            data: $('#mahasiswaForm').serialize(),
            success: function(response) {
                alert('Data berhasil diperbarui');
            },
            error: function(response) {
                alert('Terjadi kesalahan. Data tidak dapat diperbarui');
            }
        });
    }

    function simpanKegiatan() {
        var formData = new FormData($('#kegiatanForm')[0]);

        $.ajax({
            url: '<?php echo e(route('simpan-kegiatan', ['id' => $mahasiswa->id])); ?>',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                alert('Kegiatan berhasil disimpan');
                location.reload(); // Refresh halaman untuk memperbarui daftar kegiatan
            },
            error: function(response) {
                alert('Terjadi kesalahan saat menyimpan kegiatan');
            }
        });
    }

    function deleteKegiatan(id) {
        if (!confirm('Apakah Anda yakin ingin menghapus kegiatan ini?')) {
            return;
        }

        $.ajax({
            url: '<?php echo e(url('delete-kegiatan')); ?>/' + id,
            type: 'DELETE',
            data: {
                _token: '<?php echo e(csrf_token()); ?>',
            },
            success: function(response) {
                alert('Kegiatan berhasil dihapus');
                location.reload(); // Refresh halaman untuk memperbarui daftar kegiatan
            },
            error: function(response) {
                alert('Terjadi kesalahan saat menghapus kegiatan');
            }
        });
    }

    function uploadLaporan(id) {
        var formData = new FormData($('#laporanForm-' + id)[0]);

        $.ajax({
            url: '/upload-laporan/' + id,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                alert('Laporan berhasil diupload');
                location.reload(); // Refresh halaman untuk memperbarui daftar laporan
            },
            error: function(response) {
                alert('Terjadi kesalahan saat mengupload laporan');
            }
        });
    }

    function updateLaporan(id) {
        var formData = new FormData($('#updateForm-' + id)[0]);

        $.ajax({
            url: '/upload-laporan/' + id,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                alert('Laporan berhasil diperbarui');
                location.reload(); // Refresh halaman untuk memperbarui daftar laporan
            },
            error: function(response) {
                alert('Terjadi kesalahan saat memperbarui laporan');
            }
        });
    }


</script>
<?php /**PATH D:\laravel-11-multi-auth-main\resources\views/dashboard.blade.php ENDPATH**/ ?>