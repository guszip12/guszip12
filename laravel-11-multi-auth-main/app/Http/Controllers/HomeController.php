<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dokumentasi;
use App\Models\KegiatanPkl;
use App\Models\PresentasiPkl;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Ambil semua data dokumentasi
            $dokumentasi = Dokumentasi::all();

            // Menghitung jumlah user berdasarkan bidang
            $bidangCounts = User::select('bidang', DB::raw('count(*) as jumlah'))
                ->groupBy('bidang')
                ->get();

            return view('welcome', compact('bidangCounts', 'dokumentasi'));
        } catch (\Exception $e) {
            // Tangani error dengan menampilkan pesan atau log
            dd($e->getMessage()); // Tampilkan pesan error untuk debugging
        }
    }

    public function showData()
    {
        $presentasi = PresentasiPkl::find(1); // Contoh pengambilan data presentasi PKL dari database
        $kegiatan = KegiatanPkl::find(1); // Contoh pengambilan data kegiatan PKL dari database

        // Mengirimkan data presentasi dan kegiatan ke view 'todo.home'
        return view('welcome', compact('presentasi', 'kegiatan'));
    }

}
