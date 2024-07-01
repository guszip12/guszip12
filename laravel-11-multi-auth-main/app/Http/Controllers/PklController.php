<?php

namespace App\Http\Controllers;

use App\Events\PklApplicationSubmitted;
use App\Http\Controllers\Controller;
use App\Models\User; // Updated model reference
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class PklController extends Controller
{
    public function cekFormPengajuan(Request $request)
        {
            // Validate nomor registrasi
            $request->validate([
                'nomor_registrasi' => 'required|string',
            ]);

            // Find submission form based on nomor registrasi
            $nomorRegistrasi = $request->input('nomor_registrasi');
            $user = User::where('nomor_registrasi', $nomorRegistrasi)->first();

            // Return search result
            return view('layouts.cek_pengajuan', compact('user'));
        }

        public function showCekForm()
        {
            return view('layouts.cek_pengajuan');
        }

        public function showSummary(Request $request)
        {
            // Get data from session
            $submittedData = $request->session()->get('submitted_data');

            // Display summary view with newly submitted data
            return view('layouts.summary', compact('submittedData'));
        }
        
        public function showForm()
        {
            return view('layouts.pengajuan');
        }

        public function showFormCekPengajuan()
        {
            return view('layouts.cek_pengajuan_form');
        }

        public function showSyarat()
        {
            return view('layouts.syarat_ketentuan');
        }

    public function submitForm(Request $request)
    {
        // Validasi data formulir
        $validatedData = $request->validate([
            'ktp' => 'required|string',
            'name' => 'required|string',
            'alamat' => 'required|string',
            'hp' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:6|confirmed',
            'asal_sekolah' => 'required|string|in:SMA/SMK,Universitas/Sekolah Tinggi',
            'nama_sekolah' => 'required_if:asal_sekolah,Universitas/Sekolah Tinggi|string',
            'surat_kpl' => 'required|file|mimes:pdf',
            'surat_kesbangpol' => 'required|file|mimes:pdf',
            'foto' => 'required|image',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date|after:tgl_mulai',
        ]);

        // Hash password sebelum menyimpan ke database
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Upload file yang diunggah ke direktori yang ditentukan
        $suratKPLPath = $request->file('surat_kpl')->store('public/surat_kpl');
        $suratKesbangpolPath = $request->file('surat_kesbangpol')->store('public/surat_kesbangpol');
        
        $foto = $request->file('foto');
        $fotoName = time() . '_' . $foto->getClientOriginalName();
        $foto->move(public_path('images'), $fotoName);
        $fotoPath = 'images/' . $fotoName;

        $validatedData['status'] = 'Belum Validasi';

        // Generate Nomor Registrasi
        $nomorRegistrasi = $this->generateNomorRegistrasi();

        // Simpan data ke database menggunakan model User
        $user = User::create([
            'nomor_registrasi' => $nomorRegistrasi, // Adjusted column name
            'ktp' => $validatedData['ktp'],
            'name' => $validatedData['name'], 
            'alamat' => $validatedData['alamat'],
            'hp' => $validatedData['hp'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
            'asal_sekolah' => $validatedData['asal_sekolah'],
            'school_name' => $validatedData['nama_sekolah'], // Gunakan 'nama_sekolah' untuk 'school_name'
            'surat_kpl' => $suratKPLPath,
            'surat_kesbangpol' => $suratKesbangpolPath,
            'foto' => $fotoPath,
            'tgl_mulai' => $validatedData['tgl_mulai'],
            'tgl_selesai' => $validatedData['tgl_selesai'],
            'status' => $validatedData['status'],
        ]);

        // Kirim event PklApplicationSubmitted
        event(new PklApplicationSubmitted($user)); // Adjusted variable name

        // Simpan data ke session untuk ditampilkan di halaman summary
        $request->session()->put('submitted_data', [
            'nomor_registrasi' => $nomorRegistrasi,
            'ktp' => $validatedData['ktp'],
            'name' => $validatedData['name'], 
            'alamat' => $validatedData['alamat'],
            'hp' => $validatedData['hp'],
            'email' => $validatedData['email'],
            'school_name' => $validatedData['nama_sekolah'],
            'foto' => $fotoPath,
        ]);

        return redirect()->route('summary')->with('success', 'Formulir pengajuan berhasil dikirim!');
    }

    private function generateNomorRegistrasi()
    {
        // Generate Nomor Registrasi berdasarkan timestamp dan random string
        return 'REG-' . now()->format('YmdHis') . '-' . Str::random(4);
    }
}

