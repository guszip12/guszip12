<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\User; // Import model User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $mahasiswa = Auth::user(); // Mendapatkan data pengguna yang sedang login
        $user = Auth::user();
        $kegiatan = Kegiatan::where('user_id', $user->id)->get(); // Asumsikan ada relasi 'kegiatan' di model User

        return view('dashboard', compact('mahasiswa', 'user', 'kegiatan', 'users'));
    }


    public function update(Request $request, $id)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'ktp' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'hp' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'school_name' => 'required|string|max:255',
        ]);

        // Find user by ID
        $mahasiswa = User::find($id);

        if (!$mahasiswa) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Update user data
        $mahasiswa->fill($validatedData);

        // Save changes
        try {
            $mahasiswa->save();
            return response()->json(['message' => 'Data berhasil diperbarui']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    public function simpanKegiatan(Request $request)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'tanggal_kegiatan' => 'required|date',
            'tanggal_berakhir' => 'required|date',
            'kegiatan_file' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('kegiatan_file')) {
            $file = $request->file('kegiatan_file');
            $file_path = $file->store('kegiatan_pkl', 'public');

            // Ensure file saved successfully
            if (!$file_path) {
                return response()->json(['message' => 'Gagal menyimpan kegiatan: File gagal disimpan'], 500);
            }

            // Create new kegiatan for the authenticated user
            $kegiatan = new Kegiatan();
            $kegiatan->user_id = Auth::id();
            $kegiatan->tanggal_kegiatan = $request->tanggal_kegiatan;
            $kegiatan->tanggal_berakhir = $request->tanggal_berakhir;
            $kegiatan->surat_kegiatan = $file_path;

            // Save the kegiatan
            try {
                $kegiatan->save();
                return response()->json(['message' => 'Kegiatan berhasil disimpan']);
            } catch (\Exception $e) {
                Log::error('Error saving kegiatan', ['error' => $e->getMessage()]);
                return response()->json(['message' => 'Gagal menyimpan kegiatan: ' . $e->getMessage()], 500);
            }
        }

        return response()->json(['message' => 'Gagal menyimpan kegiatan: File tidak ditemukan'], 400);
    }

    public function deleteKegiatan($id)
    {
        $kegiatan = Kegiatan::find($id);

        if (!$kegiatan) {
            return response()->json(['message' => 'Kegiatan not found'], 404);
        }

        // Delete the file if it exists
        if ($kegiatan->surat_kegiatan && Storage::exists('public/' . $kegiatan->surat_kegiatan)) {
            Storage::delete('public/' . $kegiatan->surat_kegiatan);
        }

        // Delete the kegiatan
        try {
            $kegiatan->delete();
            return response()->json(['message' => 'Kegiatan berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus kegiatan: ' . $e->getMessage()], 500);
        }
    }

    public function uploadLaporan(Request $request, $id)
    {
        // Validasi file yang diunggah
        $request->validate([
            'rekap_laporan' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Temukan user berdasarkan ID
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Handle file upload
        if ($request->hasFile('rekap_laporan')) {
            // Hapus file lama jika ada
            if ($user->rekap_laporan && Storage::exists('public/' . $user->rekap_laporan)) {
                Storage::delete('public/' . $user->rekap_laporan);
            }

            // Simpan file yang diunggah
            $path = $request->file('rekap_laporan')->store('public/laporan');

            // Update kolom rekap_laporan di tabel users
            $user->rekap_laporan = $path;
            $user->save();

            return response()->json(['message' => 'Laporan berhasil ' . ($user->wasRecentlyCreated ? 'diupload' : 'diperbarui')]);
        }

        return response()->json(['error' => 'File not uploaded'], 400);
    }


    // public function updateLaporan(Request $request, $id)
    // {
    //     // Temukan user berdasarkan ID
    //     $user = User::find($id);

    //     if (!$user) {
    //         return response()->json(['message' => 'User not found'], 404);
    //     }

    //     // Validate the uploaded file
    //     $request->validate([
    //         'rekap_laporan' => 'required|file|mimes:pdf,doc,docx|max:2048',
    //     ]);

    //     // Handle file upload
    //     if ($request->hasFile('rekap_laporan')) {
    //         // Hapus file lama jika ada
    //         if ($user->rekap_laporan && Storage::exists('public/' . $user->rekap_laporan)) {
    //             Storage::delete('public/' . $user->rekap_laporan);
    //         }

    //         // Simpan file yang diunggah
    //         $path = $request->file('rekap_laporan')->store('public/laporan');

    //         // Update kolom rekap_laporan di tabel users
    //         $user->rekap_laporan = $path;
    //         $user->save();

    //         return response()->json(['message' => 'Laporan berhasil diperbarui']);
    //     }

    //     return response()->json(['error' => 'File not uploaded'], 400);
    // }


}
