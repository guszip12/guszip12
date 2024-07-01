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
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid" style="max-width: 200px;">
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
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Bidang</th>
                                        <th>Jumlah PKL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bidangCounts as $index => $bidang)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $bidang->bidang }}</td>
                                        <td>{{ $bidang->jumlah }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Informasi Tambahan -->
                <div class="row">
                    @php
                        $presentasi = null;
                        $kegiatan = null;
                    @endphp

                    @foreach($dokumentasi as $doc)
                        @if($doc->jenis == 'Persentasi PKL' && !$presentasi)
                            @php
                                $presentasi = $doc;
                            @endphp
                        @endif

                        @if($doc->jenis == 'Kegiatan PKL' && !$kegiatan)
                            @php
                                $kegiatan = $doc;
                            @endphp
                        @endif

                        @if($presentasi && $kegiatan)
                            @break
                        @endif
                    @endforeach

                    @if($presentasi)
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <img src="{{ asset('images/' . $presentasi->gambar) }}" class="card-img-top" alt="Presentasi PKL" style="max-width: 100%; height: auto;">
                                <div class="card-body">
                                    <h5 class="card-title">Persentasi PKL</h5>
                                    <p>{{ $presentasi->deskripsi }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($kegiatan)
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <img src="{{ asset('images/' . $kegiatan->gambar) }}" class="card-img-top" alt="Kegiatan PKL" style="max-width: 100%; height: auto;">
                                <div class="card-body">
                                    <h5 class="card-title">Kegiatan PKL</h5>
                                    <p>{{ $kegiatan->deskripsi }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Tombol Selengkapnya -->
                <div class="col-md-12 text-end">
                    <a href="{{ route('dokumentasi.index') }}" class="btn btn-primary mt-3">Selengkapnya</a>
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
                                <a href="{{ route('pengajuan') }}" class="btn btn-outline-primary">
                                    <i class="fas fa-file-alt"></i> Pengajuan
                                </a>
                            </li>
                            <li class="list-group-item custom-list-group-item">
                                <a href="{{ route('cek.form.pengajuan') }}" class="btn btn-outline-primary">
                                    <i class="fas fa-search"></i> Cek Pengajuan
                                </a>
                            </li>
                            <li class="list-group-item custom-list-group-item">
                                <a href="{{ route('syarat.ketentuan') }}" class="btn btn-outline-primary">
                                    <i class="fas fa-info-circle"></i> Syarat/Ketentuan
                                </a>
                            </li>
                            {{-- login --}}
                            @if (Route::has('login'))
                                <li class="list-group-item custom-list-group-item">
                                    @auth('web')
                                        <a href="{{ url('/dashboard') }}" class="text-decoration-none">Dashboard</a>
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-outline-primary">Log in</a>
                                    {{-- Register --}}
                                        {{-- @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                                        @endif --}}
                                    @endauth
                                </li>
                                <li class="list-group-item custom-list-group-item">
                                    @auth('admin')
                                        <a href="{{ url('/admin/dashboard') }}" class="text-decoration-none">Admin Dashboard</a>
                                    @else
                                        <a href="{{ route('admin.login') }}" class="btn btn-outline-primary">Admin Log in</a>
                                    {{-- Register --}}
                                         {{-- @if (Route::has('admin.register'))
                                            <a href="{{ route('admin.register') }}" class="btn btn-primary">Admin Register</a>
                                        @endif --}}
                                    @endauth
                                </li>
                                {{-- tambahan login --}}
                                {{-- <li class="list-group-item">
                                    @auth('teacher')
                                        <a href="{{ url('/teacher/dashboard') }}" class="text-decoration-none">Teacher Dashboard</a>
                                    @else
                                        <a href="{{ route('teacher.login') }}" class="btn btn-outline-primary">Teacher Log in</a>

                                        @if (Route::has('teacher.register'))
                                            <a href="{{ route('teacher.register') }}" class="btn btn-primary">Teacher Register</a>
                                        @endif
                                    @endauth
                                </li> --}}
                            @endif
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
</style>