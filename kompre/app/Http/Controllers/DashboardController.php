<?php

use App\Http\Controllers\Controller;
use App\Models\KomoditasDesa;
use App\Models\Kategori; // Import model Kategori

class AuthController extends Controller
{
    public function index()
    {
        $jumlahKomoditas = KomoditasDesa::count();
        $jumlahDesa = Desa::count();

        return view('dashboard', compact('jumlahKomoditas', 'jumlahDesa', 'jumlahPanenSemua', 'jumlahTanamSemua'));

    }

    public function jumlahPanenSemua()
    {
        // Ambil ID kategori berdasarkan nama "Panen"
        $kategoriPanen = Kategori::where('kategori', 'Panen')->first();

        // Jika kategori "Panen" tidak ditemukan, kembalikan 0 atau pesan kesalahan sesuai kebutuhan.
        if (!$kategoriPanen) {
            return 0; // Atau return pesan kesalahan
        }

        // Menggunakan ID kategori untuk menghitung jumlah panen
        return KomoditasDesa::where('kategori_id', $kategoriPanen->id)->sum('jumlah');
    }

    public function jumlahTanamSemua()
    {
        // Ambil ID kategori berdasarkan nama "Tanam"
        $kategoriTanam = Kategori::where('kategori', 'Tanam')->first();

        // Jika kategori "Tanam" tidak ditemukan, kembalikan 0 atau pesan kesalahan sesuai kebutuhan.
        if (!$kategoriTanam) {
            return 0; // Atau return pesan kesalahan
        }

        // Menggunakan ID kategori untuk menghitung jumlah tanam
        return KomoditasDesa::where('kategori_id', $kategoriTanam->id)->sum('jumlah');
    }
}
