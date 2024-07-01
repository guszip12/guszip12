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
                            <div>
                                <h1 class="mt-5 mb-4">Admin Dashboard</h1>

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
                                                <td><?php echo e($user->asal_sekolah === 'SMA/SMK' ? 'SMA/SMK' : $user->school_name); ?></td>
                                                <td>
                                                    <a href="<?php echo e(Storage::url($user->surat_kpl)); ?>" download>Download</a>
                                                </td>
                                                <td>
                                                    <a href="<?php echo e(Storage::url($user->surat_kesbangpol)); ?>" download>Download</a>
                                                </td>
                                                <td><?php echo e($user->status); ?></td>
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
                                                <td><?php echo e($user->asal_sekolah === 'SMA/SMK' ? 'SMA/SMK' : $user->school_name); ?></td>
                                                <td><?php echo e($user->status); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('admin.edit-mahasiswa', ['id' => $user->id])); ?>" class="btn btn-primary btn-sm">Edit</a>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Section: Data Nilai PKL (Coming Soon) -->
                                <div id="data-nilai-pkl" class="content-section">
                                    <h2 class="mt-5">Data Nilai PKL</h2>
                                    <div class="mt-5">
                                        <p>Coming soon...</p>
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
                                                <td><?php echo e($user->asal_sekolah === 'SMA/SMK' ? 'SMA/SMK' : $user->school_name); ?></td>
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

                                <!-- Section: Data Kegiatan PKL (Coming Soon) -->
                                <div id="data-kegiatan-pkl" class="content-section">
                                    <h2 class="mt-5">Data Kegiatan PKL</h2>
                                    <div class="mt-5">
                                        <p>Coming soon...</p>
                                    </div>
                                </div>

                                <!-- Section: Rekap Laporan (Coming Soon) -->
                                <div id="rekap-laporan" class="content-section">
                                    <h2 class="mt-5">Rekap Laporan</h2>
                                    <div class="mt-5">
                                        <p>Coming soon...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bootstrap JavaScript Bundle with Popper -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

                    <!-- Script to handle section visibility -->
                    <script>
                        function showSection(sectionId) {
                            document.querySelectorAll('.content-section').forEach(section => {
                                section.classList.remove('active');
                            });
                            document.getElementById(sectionId).classList.add('active');
                        }
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
<?php /**PATH D:\laravel-11-multi-auth-main\resources\views\admin\dashboard.blade.php ENDPATH**/ ?>