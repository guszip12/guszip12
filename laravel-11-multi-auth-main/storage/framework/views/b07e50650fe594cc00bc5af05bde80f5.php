<?php if (isset($component)) { $__componentOriginal15a72a62debbe72bfa7a4f1dc73a4a07 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal15a72a62debbe72bfa7a4f1dc73a4a07 = $attributes; } ?>
<?php $component = App\View\Components\AdminAppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AdminAppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Admin Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">

                                <!-- Section: Validasi Data Pengajuan -->
                                <div id="validasi-data-pengajuan" class="content-section active">
                                    <h2 class="mt-5">Validasi Data Pengajuan</h2>
                                    <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No. Registrasi</th>
                                                <th>Nama</th>
                                                <th>Asal Sekolah/Kampus</th>
                                                <th>Surat PKL Kampus</th>
                                                <th>Surat KESBANGPOL</th>
                                                <th>Status Validasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($index + 1); ?></td>
                                                <td><?php echo e($user->nomor_registrasi); ?></td>
                                                <td><?php echo e($user->name); ?></td>
                                                <td><?php echo e($user->school_name); ?></td>
                                                <td>
                                                    <a class="dt" href="<?php echo e(Storage::url($user->surat_kpl)); ?>" download>Download</a>
                                                </td>
                                                <td>
                                                    <a class="dt" href="<?php echo e(Storage::url($user->surat_kesbangpol)); ?>" download>Download</a>
                                                </td>
                                                <td>
                                                    <?php if($user->status == 'Belum Validasi'): ?>
                                                        <form class="approve-form" action="<?php echo e(route('admin.approveUser', ['id' => $user->id])); ?>" method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <button type="submit" class="btn btn-success">Approve</button>
                                                        </form>
                                                    <?php else: ?>
                                                        <?php echo e($user->status); ?>

                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Section: Data Mahasiswa PKL -->
                                <div id="data-mahasiswa-pkl" class="content-section">
                                    <h2 class="mt-5">Data Mahasiswa PKL</h2>
                                    <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No. Registrasi</th>
                                                <th>Nama</th>
                                                <th>Asal Sekolah/Kampus</th>
                                                <th>Bidang</th>
                                                <th>Status</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($index + 1); ?></td>
                                                <td><?php echo e($user->nomor_registrasi); ?></td>
                                                <td><?php echo e($user->name); ?></td>
                                                <td><?php echo e($user->school_name); ?></td>
                                                <td><?php echo e($user->bidang); ?></td>
                                                <td>
                                                    <span class="status-box <?php echo e($user->status == 'Belum Validasi' ? 'bg-danger' : ($user->status == 'Approved' ? 'bg-success' : '')); ?>">
                                                        <?php echo e($user->status); ?>

                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="<?php echo e(route('admin.edit-mahasiswa', ['id' => $user->id])); ?>" class="btn btn-primary btn-sm">Edit</a>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Section: Data Nilai PKL -->
                                <div id="data-nilai-pkl" class="content-section">
                                    <h2 class="mt-5">Data Nilai PKL</h2>
                                    <div class="mt-5">
                                        <table class="min-w-full divide-y divide-gray-200 table">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        No
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Nama
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Asal Sekolah
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Bidang
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Nilai
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Edit
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        <?php echo e($index + 1); ?>

                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        <?php echo e($user->name); ?>

                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        <?php echo e($user->school_name); ?>

                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        <?php echo e($user->bidang); ?>

                                                    </td>
                                                    <td id="nilai-<?php echo e($user->id); ?>" class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        <?php echo e($user->nilai); ?>

                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        <button class="edit-nilai btn btn-sm btn-outline-primary" data-id="<?php echo e($user->id); ?>">Edit Nilai</button>
                                                        <div id="edit-nilai-form-<?php echo e($user->id); ?>" class="mt-3" style="display: none;">
                                                            <form class="edit-nilai-form" action="<?php echo e(route('admin.update-nilai', ['id' => $user->id])); ?>" method="POST">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('POST'); ?>
                                                                <div class="form-group">
                                                                    <input type="number" class="form-control" name="nilai" id="input-nilai-<?php echo e($user->id); ?>" value="<?php echo e($user->nilai); ?>" required>
                                                                </div>
                                                                <br>
                                                                <button type="submit" class="btn btn-sm btn-outline-primary">Simpan</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>                                                                                               

                                <!-- Section: Data Presentasi PKL -->
                                <div id="data-presentasi-pkl" class="content-section">
                                    <h2 class="mt-5">Data Presentasi PKL</h2>
                                    <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Asal Sekolah/Kampus</th>
                                                <th>Jadwal Presentasi</th>
                                                <th>Jam</th>
                                                <th>Topik Presentasi</th>
                                                <th>Ruangan</th>
                                                <th>Edit</th>
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
                                                <td>
                                                    <a href="<?php echo e(route('admin.edit-presentasi', ['id' => $user->id])); ?>" class="btn btn-primary btn-sm">Edit</a>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Section: Data Kegiatan PKL -->
                                <div id="data-kegiatan-pkl" class="content-section">
                                    <h2 class="mt-5">Data Kegiatan PKL</h2>
                                    <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Asal Sekolah/Kampus</th>
                                                <th>Bidang</th>
                                                <th>Daftar Kegiatan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($index + 1); ?></td>
                                                <td><?php echo e($user->name); ?></td>
                                                <td><?php echo e($user->school_name); ?></td>
                                                <td><?php echo e($user->bidang); ?></td>
                                                <td>
                                                    <button type="button" id="button-<?php echo e($user->id); ?>" class="btn btn-info btn-sm" onclick="toggleKegiatan(<?php echo e($user->id); ?>)">Lihat Daftar Kegiatan</button>
                                                </td>
                                            </tr>
                                            <tr id="kegiatan-<?php echo e($user->id); ?>" style="display: none;">
                                                <td colspan="5">
                                                    <div class="mt-4 kegiatan-container">
                                                        <h5>Daftar Kegiatan PKL</h5>
                                                        <div class="activities-container">
                                                            <?php if($user->kegiatans && count($user->kegiatans) > 0): ?>
                                                                <?php $__currentLoopData = $user->kegiatans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activityIndex => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <div class="activity-item">
                                                                        <div class="activity-content">
                                                                            <p><strong>No:</strong> <?php echo e($activityIndex + 1); ?></p>
                                                                            <p><strong>Tanggal Kegiatan:</strong> <?php echo e($item->tanggal_kegiatan); ?></p>
                                                                            <p><strong>Tanggal Berakhir:</strong> <?php echo e($item->tanggal_berakhir); ?></p>
                                                                            <p><strong>File Kegiatan:</strong> <a href="<?php echo e(Storage::url($item->surat_kegiatan)); ?>" target="_blank">Lihat File</a></p>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php else: ?>
                                                                <p>Tidak ada kegiatan tersedia.</p>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Section: Rekap Laporan (Coming Soon) -->
                                <div id="rekap-laporan" class="content-section">
                                    <h2 class="mt-5">Rekap Laporan</h2>
                                    <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Bidang</th>
                                                <th>Nama Seksi</th>
                                                <th>Nama Pembimbing</th>
                                                <th>Laporan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $mahasiswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($index + 1); ?></td>
                                                <td><?php echo e($user->name); ?></td>
                                                <td><?php echo e($user->bidang); ?></td>
                                                <td><?php echo e($user->name_seksi); ?></td>
                                                <td><?php echo e($user->name_pembina); ?></td>
                                                <td>
                                                    <?php if($user->rekap_laporan): ?>
                                                        <a class="dt" href="<?php echo e(Storage::url($user->rekap_laporan)); ?>" target="_blank">Lihat Laporan</a>
                                                    <?php else: ?>
                                                        Belum ada laporan
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bootstrap JavaScript Bundle with Popper -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                    <!-- Script to handle section visibility and toggleKegiatan function -->
                    <script>
                        function showSection(sectionId) {
                            document.querySelectorAll('.content-section').forEach(section => {
                                section.classList.remove('active');
                            });
                            document.getElementById(sectionId).classList.add('active');
                        }

                        function toggleKegiatan(userId) {
                            var kegiatanRow = document.getElementById('kegiatan-' + userId);
                            var button = document.getElementById('button-' + userId);

                            if (kegiatanRow.style.display === 'none' || kegiatanRow.style.display === '') {
                                kegiatanRow.style.display = 'table-row';
                                button.innerText = 'Tutup Daftar Kegiatan';
                            } else {
                                kegiatanRow.style.display = 'none';
                                button.innerText = 'Lihat Daftar Kegiatan';
                            }
                        }

                        $(document).ready(function() {
                            $('.edit-nilai').click(function() {
                                var userId = $(this).data('id');
                                $('#edit-nilai-form-' + userId).toggle();
                            });

                            // Submit form nilai via AJAX
                            $('.edit-nilai-form').submit(function(event) {
                                event.preventDefault();
                                var form = $(this);
                                var url = form.attr('action');
                                var method = form.attr('method');
                                var nilai = form.find('input[name="nilai"]').val();
                                var userId = url.substring(url.lastIndexOf('/') + 1);

                                $.ajax({
                                    url: url,
                                    type: method,
                                    data: {
                                        _token: '<?php echo e(csrf_token()); ?>',
                                        _method: method,
                                        nilai: nilai
                                    },
                                    success: function(response) {
                                        // Update nilai di tabel setelah berhasil disimpan
                                        $('#nilai-' + userId).text(nilai);
                                        $('#edit-nilai-form-' + userId).hide();
                                        alert('Nilai berhasil diperbarui!');
                                    },
                                    error: function(xhr) {
                                        console.error(xhr.responseText);
                                        alert('Gagal memperbarui nilai. Silakan coba lagi.');
                                    }
                                });
                            });

                            // Submit approve form via standard HTTP request
                            $('.approve-form').submit(function(event) {
                                // No need to preventDefault() since we want the standard form submission
                            });
                        });


                    </script>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal15a72a62debbe72bfa7a4f1dc73a4a07)): ?>
<?php $attributes = $__attributesOriginal15a72a62debbe72bfa7a4f1dc73a4a07; ?>
<?php unset($__attributesOriginal15a72a62debbe72bfa7a4f1dc73a4a07); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15a72a62debbe72bfa7a4f1dc73a4a07)): ?>
<?php $component = $__componentOriginal15a72a62debbe72bfa7a4f1dc73a4a07; ?>
<?php unset($__componentOriginal15a72a62debbe72bfa7a4f1dc73a4a07); ?>
<?php endif; ?>
<?php /**PATH D:\laravel-11-multi-auth-main\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>