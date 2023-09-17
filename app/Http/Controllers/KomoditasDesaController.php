<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\KomoditasDesa;
use App\Models\Desa;
use App\Models\Kategori;
use App\Models\Komoditi;

class KomoditasDesaController extends Controller
{
    public function dashboard()
    {
        $jumlahKomoditasTanam = DB::table('komoditas_desas')
            ->join('kategoris', 'komoditas_desas.kategori_id', '=', 'kategoris.id')
            ->where('kategoris.kategori', 'Masih Tanam')
            ->sum('komoditas_desas.jumlah');

        $jumlahKomoditasPanen = DB::table('komoditas_desas')
            ->join('kategoris', 'komoditas_desas.kategori_id', '=', 'kategoris.id')
            ->where('kategoris.kategori', 'Sudah Panen')
            ->sum('komoditas_desas.jumlah');

        $jumlahDesa = Desa::count();
        $jumlahKomoditas = Komoditi::count();
        $komoditasDesa = KomoditasDesa::all();

        return view('dashboard', compact('jumlahDesa', 'jumlahKomoditas', 'jumlahKomoditasTanam', 'jumlahKomoditasPanen', 'komoditasDesa'));
    }


    public function index()
    {
        $komoditasDesa = KomoditasDesa::with(['desa', 'kategori', 'komoditi'])->get();
        return view('komoditas_desa.index', compact('komoditasDesa'));
    }

    public function create()
    {
        $desas = Desa::all();
        $kategoris = Kategori::all();
        $komoditis = Komoditi::all();
        return view('komoditas_desa.create', compact('desas', 'kategoris', 'komoditis'));
    }

    public function store(Request $request)
    {
        // Validasi data masukan sesuai dengan kebutuhan

        $komoditasDesa = new KomoditasDesa([
            'desa_id' => $request->input('desa_id'),
            'kategori_id' => $request->input('kategori_id'),
            'komoditi_id' => $request->input('komoditi_id'),
            'jumlah' => $request->input('jumlah'),
        ]);
        $komoditasDesa->save();

        return redirect()->route('komoditas_desa')->with('success', 'Data komoditas desa berhasil ditambahkan');
    }

    public function show($id)
    {
        $komoditasDesa = KomoditasDesa::with(['desa', 'kategori', 'komoditi'])->find($id);
        return view('komoditas_desa.show', compact('komoditasDesa'));
    }

    public function edit($id)
    {
        $komoditasDesa = KomoditasDesa::with(['desa', 'kategori', 'komoditi'])->find($id);
        $desas = Desa::all();
        $kategoris = Kategori::all();
        $komoditis = Komoditi::all();
        return view('komoditas_desa.edit', compact('komoditasDesa', 'desas', 'kategoris', 'komoditis'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data masukan sesuai dengan kebutuhan

        $komoditasDesa = KomoditasDesa::find($id);
        $komoditasDesa->desa_id = $request->input('desa_id');
        $komoditasDesa->kategori_id = $request->input('kategori_id');
        $komoditasDesa->komoditi_id = $request->input('komoditi_id');
        $komoditasDesa->jumlah = $request->input('jumlah');
        $komoditasDesa->save();

        return redirect()->route('komoditas_desa')->with('success', 'Data komoditas desa berhasil diperbarui');
    }

    public function destroy($id)
    {
        $komoditasDesa = KomoditasDesa::find($id);
        $komoditasDesa->delete();

        return redirect()->route('komoditas_desa')->with('success', 'Data komoditas desa berhasil dihapus');
    }
}
