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
                                    <div class="col-md-8">
                                        <h5>Formulir Data Mahasiswa</h5>
                                        <form id="mahasiswaForm">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img src="<?php echo e(asset($mahasiswa->foto)); ?>" alt="Foto" class="img-fluid custom-img">
                                                </div>
                                                <div class="col-md-8">
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
                                                </div>
                                            </div>
                                        </form>
                                    </div>                                    
                                </div>
                                <div id="kegiatan-pkl" class="content-section">
                                    <h2 class="mt-5">Kegiatan PKL</h2>
                                </div>
                                <div id="jadual-presentasi-pkl" class="content-section">
                                    <h2 class="mt-5">Jadual Presentasi PKL</h2>
                                    <div class="mt-5">
                                        <p>Coming soon...</p>
                                    </div>
                                </div>
                                <div id="nilai-pkl" class="content-section">
                                    <h2 class="mt-5">Nilai PKL</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function showSection(sectionId) {
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.remove('active');
            });
            document.getElementById(sectionId).classList.add('active');
        }

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
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH D:\laravel-11-multi-auth-main\resources\views\dashboard.blade.php ENDPATH**/ ?>