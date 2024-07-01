<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

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
                                            <img src="{{ asset($mahasiswa->foto) }}" alt="Foto" class="img-fluid custom-img">
                                        </div>
                                        <div class="form-wrapper">
                                            <h5 style="margin-bottom: 10px;">Data Anda</h5>
                                            <form id="mahasiswaForm">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="nomor_registrasi" class="form-label">Nomor Registrasi</label>
                                                    <input type="text" class="form-control" id="nomor_registrasi" name="nomor_registrasi" value="{{ $mahasiswa->nomor_registrasi }}" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="ktp" class="form-label">No. KTP</label>
                                                    <input type="text" class="form-control" id="ktp" name="ktp" value="{{ $mahasiswa->ktp }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" id="name" name="name" value="{{ $mahasiswa->name }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $mahasiswa->alamat }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="hp" class="form-label">HP</label>
                                                    <input type="text" class="form-control" id="hp" name="hp" value="{{ $mahasiswa->hp }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" value="{{ $mahasiswa->email }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="school_name" class="form-label">Asal Sekolah/Kampus</label>
                                                    <input type="text" class="form-control" id="school_name" name="school_name" value="{{ $mahasiswa->school_name }}">
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
                                            @csrf
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
                                                @if($kegiatan && count($kegiatan) > 0)
                                                    @foreach ($kegiatan as $index => $item)
                                                        <div class="activity-item">
                                                            <div class="activity-content">
                                                                <p><strong>No:</strong> {{ $index + 1 }}</p>
                                                                <p><strong>Tanggal Kegiatan:</strong> {{ $item->tanggal_kegiatan }}</p>
                                                                <p><strong>Tanggal Berakhir:</strong> {{ $item->tanggal_berakhir }}</p>
                                                                <p><strong>File Kegiatan:</strong> <a href="{{ Storage::url($item->surat_kegiatan) }}" target="_blank">Lihat File</a></p>
                                                                <button class="btn btn-danger" onclick="deleteKegiatan({{ $item->id }})">Delete</button>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="activity-item">
                                                        <div class="activity-content text-center">
                                                            Belum ada kegiatan yang tersimpan.
                                                        </div>
                                                    </div>
                                                @endif
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
                                                @foreach ($users as $index => $user)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->school_name }}</td>
                                                        <td>{{ $user->jadwal_presentasi }}</td>
                                                        <td>{{ $user->jam_presentasi }}</td>
                                                        <td>{{ $user->topik_presentasi }}</td>
                                                        <td>{{ $user->ruangan }}</td>
                                                    </tr>
                                                @endforeach
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
                                                    <td>{{ $mahasiswa->name }}</td>
                                                    <td>{{ $mahasiswa->school_name }}</td>
                                                    <td>{{ $mahasiswa->bidang }}</td>
                                                    <td>{{ $mahasiswa->nilai }}</td>
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
                                                    <td>{{ $mahasiswa->name }}</td>
                                                    <td>{{ $mahasiswa->bidang }}</td>
                                                    <td>{{ $mahasiswa->name_seksi }}</td>
                                                    <td>{{ $mahasiswa->name_pembina }}</td>
                                                    <td>
                                                        @if ($mahasiswa->rekap_laporan)
                                                            <a href="{{ Storage::url($mahasiswa->rekap_laporan) }}" target="_blank">Lihat Laporan</a>
                                                        @else
                                                            Belum ada laporan
                                                        @endif
                                                    </td>
                                                    @if (!$mahasiswa->rekap_laporan)
                                                        <td>
                                                            <form id="laporanForm-{{ $mahasiswa->id }}" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="file" class="form-control mb-2" name="rekap_laporan" required>
                                                                <button type="button" class="btn btn-primary" onclick="uploadLaporan({{ $mahasiswa->id }})">Submit</button>
                                                            </form>
                                                        </td>
                                                    @else
                                                        <td>
                                                            <form id="updateForm-{{ $mahasiswa->id }}" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="file" class="form-control mb-2" name="rekap_laporan" required>
                                                                <button type="button" class="btn btn-primary" onclick="updateLaporan({{ $mahasiswa->id }})">Update</button>
                                                            </form>
                                                        </td>
                                                    @endif
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
</x-app-layout>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function updateMahasiswa() {
        $.ajax({
            url: '{{ route('update-mahasiswa', ['id' => $mahasiswa->id]) }}',
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
            url: '{{ route('simpan-kegiatan', ['id' => $mahasiswa->id]) }}',
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
            url: '{{ url('delete-kegiatan') }}/' + id,
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}',
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
