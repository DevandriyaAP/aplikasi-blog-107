<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;

class ArtikelPublicController extends Controller
{
    /**
     * Tampilkan halaman publik dengan daftar artikel
     */
    public function index(Request $request)
    {
        $query = Artikel::with('penulis', 'kategori')->orderBy('created_at', 'desc');

        // Filter berdasarkan kategori jika ada parameter
        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('kategori_artikel_id', $request->kategori);
        }

        // Ambil 5 artikel terbaru (atau yang sesuai filter)
        $artikels = $query->paginate(5);

        // Ambil semua kategori untuk sidebar
        $kategoris = KategoriArtikel::withCount('artikel')->get();

        // Kategori yang sedang dipilih (jika ada)
        $kategoriTerpilih = $request->has('kategori') ? (int) $request->kategori : null;

        return view('publik.index', compact('artikels', 'kategoris', 'kategoriTerpilih'));
    }

    /**
     * Tampilkan detail artikel
     */
    public function show($slug)
    {
        // Cari artikel berdasarkan ID atau slug
        $artikel = Artikel::with('penulis', 'kategori')
            ->where('id', $slug)
            ->orWhere('judul', $slug)
            ->firstOrFail();

        // Ambil artikel terkait dari kategori yang sama
        $artikelTerkait = Artikel::with('penulis', 'kategori')
            ->where('kategori_artikel_id', $artikel->kategori_artikel_id)
            ->where('id', '!=', $artikel->id)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        // Ambil semua kategori untuk sidebar
        $kategoris = KategoriArtikel::withCount('artikel')->get();

        return view('publik.show', compact('artikel', 'artikelTerkait', 'kategoris'));
    }
}
