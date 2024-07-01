<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $mahasiswa = User::all();
        return view('admin.dashboard', compact('users', 'mahasiswa'));
    }

    public function editMahasiswa($id)
    {
        $mahasiswa = User::find($id);
        return view('admin.layouts.edit-mahasiswa', compact('mahasiswa'));
    }

    public function editPresentasi($id)
    {
        $user = User::find($id);
        return view('admin.layouts.edit-presentasi', compact('user'));
    }

    public function approveUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->status = 'Approved'; // or any other status you want to set
            $user->save();
        }
        return redirect()->back()->with('success', 'User approved successfully.');
    }

    public function updateMahasiswa(Request $request, $id)
    {
        $mahasiswa = User::find($id);

        // Validasi data
        $request->validate([
            'name' => 'required|string',
            'ktp' => 'required|string',
            'alamat' => 'required|string',
            'hp' => 'required|string',
            'email' => 'required|email',
            'school_name' => 'required|string',
            'bidang' => 'required|string',
            // Tambahkan validasi lain jika diperlukan
        ]);

        // Update atribut mahasiswa
        $mahasiswa->name = $request->input('name');
        $mahasiswa->ktp = $request->input('ktp');
        $mahasiswa->alamat = $request->input('alamat');
        $mahasiswa->hp = $request->input('hp');
        $mahasiswa->email = $request->input('email');
        $mahasiswa->school_name = $request->input('school_name');
        $mahasiswa->bidang = $request->input('bidang');
        // Update atribut lainnya jika diperlukan

        // Simpan perubahan
        $mahasiswa->save();

        // Redirect kembali dengan pesan keberhasilan
        return redirect()->route('admin.dashboard')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function updatePresentasi(Request $request, $id)
    {
        $user = User::find($id);

        // Validasi data
        $request->validate([
            'name_pembina' => 'required|string',
            'name_seksi' => 'required|string',
            'jadwal_presentasi' => 'required|date',
            'jam_presentasi' => ['required', 'regex:/^([01][0-9]|2[0-3]):([0-5][0-9])$/'],
            'topik_presentasi' => 'required|string',
            'ruangan' => 'required|string',
        ]);

        // Update atribut presentasi PKL
        $user->name_pembina = $request->input('name_pembina');
        $user->name_seksi = $request->input('name_seksi');
        $user->jadwal_presentasi = $request->input('jadwal_presentasi');
        $user->jam_presentasi = $request->input('jam_presentasi');
        $user->topik_presentasi = $request->input('topik_presentasi');
        $user->ruangan = $request->input('ruangan');

        // Simpan perubahan pada presentasi PKL
        $user->save();

        // Redirect kembali dengan pesan keberhasilan
        return redirect()->route('admin.dashboard')->with('success', 'Presentasi PKL berhasil diperbarui.');
    }

    public function updateNilai(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nilai' => 'required|numeric',
        ]);

        // Ambil user berdasarkan ID
        $user = User::findOrFail($id);

        // Update nilai
        $user->nilai = $request->nilai;
        $user->save();

        // Redirect kembali dengan pesan keberhasilan
        return redirect()->route('admin.dashboard')->with('success', 'Nilai berhasil diperbarui.');
    }


    
}

