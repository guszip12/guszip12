<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Form Pengajuan</title>
    <!-- Load Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #ffffff; /* Putih */
        }

        .btn-primary {
            background-color: #28a745; /* Hijau */
            border-color: #28a745; /* Hijau */
        }

        .btn-primary:hover {
            background-color: #218838; /* Hijau lebih gelap saat hover */
            border-color: #218838; /* Hijau lebih gelap saat hover */
        }

        .btn-primary:focus {
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5); /* Bayangan hijau saat fokus */
        }

        .btn-primary:active {
            background-color: #1e7e34; /* Hijau lebih gelap saat active */
            border-color: #1e7e34; /* Hijau lebih gelap saat active */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mt-5 mb-4">Cek Form Pengajuan</h2>

        <form action="{{ route('cek.form.pengajuan.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nomor_registrasi" class="form-label">Nomor Registrasi:</label>
                <input type="text" class="form-control" id="nomor_registrasi" name="nomor_registrasi" required>
            </div>

            <button type="submit" class="btn btn-primary">Cek Pengajuan</button>
        </form>

        @if(isset($user))
            <h3 class="mt-5">Hasil Pencarian</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Nomor Registrasi</th>
                        <th scope="col">Sekolah/Universitas</th>
                        <th scope="col">Status Pengajuan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->nomor_registrasi }}</td>
                        <td>{{ $user->asal_sekolah }}</td>
                        <td>{{ $user->status }}</td>
                    </tr>
                </tbody>
            </table>
        @endif

            <br>
            <br>
            <br>
        <!-- Catatan -->
        <div class="mt-4">
            <h5>Catatan:</h5>
            <ul>
                <li>Masukkan nomor registrasi yang sudah didapatkan saat melakukan registrasi pertama kali</li>
                <li>Bila status pengajuan sudah dinyatakan diterima, harap mengikuti persyaratan/ketentuan yang berlaku</li>
                <li>Silahkan masuk ke LOGIN</li>
            </ul>
        </div>

    </div>

    <!-- Load Bootstrap JS (if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
