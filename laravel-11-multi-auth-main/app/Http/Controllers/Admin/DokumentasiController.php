<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dokumentasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DokumentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokumentasi = Dokumentasi::all();
        return view('admin.layouts.index', compact('dokumentasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required',
            'jenis' => 'required|in:Persentasi PKL,Kegiatan PKL',
        ]);

        if ($request->hasFile('gambar') && $request->file('gambar')->isValid()) {
            $extension = $request->gambar->extension();
            $imageName = time() . '.' . $extension;
            $request->gambar->move(public_path('images'), $imageName);

            // Simpan data ke database
            $dokumentasi = new Dokumentasi();
            $dokumentasi->gambar = $imageName;
            $dokumentasi->deskripsi = $request->deskripsi;
            $dokumentasi->jenis = $request->jenis;
            $dokumentasi->save();

            return redirect()->route('admin.dokumentasi.create')->with('success', 'Dokumentasi berhasil diunggah.');
        } else {
            return redirect()->route('admin.dokumentasi.create')->with('error', 'Gagal mengunggah dokumentasi. Silakan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dokumentasi = Dokumentasi::find($id);

        if (!$dokumentasi) {
            return redirect()->route('admin.dokumentasi.index')->with('error', 'Dokumentasi tidak ditemukan.');
        }

        // Hapus gambar dari public/images
        $imagePath = public_path('images/' . $dokumentasi->gambar);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        // Hapus data dari database
        $dokumentasi->delete();

        return redirect()->route('admin.dokumentasi.index')->with('success', 'Dokumentasi berhasil dihapus.');
    }
}

