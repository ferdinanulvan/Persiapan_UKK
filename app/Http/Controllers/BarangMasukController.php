<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangMasuk;
use App\Models\Barang;



class BarangMasukController extends Controller
{
    public function index()
    {
        $barangmasuks = BarangMasuk::with('barang')->paginate(10);

        return view('barangmasuk.index', compact('barangmasuks'));
    }

    public function create()
    {
        $barangs = Barang::all();

        return view('barangmasuk.create', compact('barangs'));
    }

    public function store(Request $request)
    {   
       
        $request->validate([
            'tgl_masuk' => 'required|date',
            'qty_masuk' => 'required|integer|min:1',
            'barang_id' => 'required|exists:barang,id',
        ]);

        $barangmasuk = BarangMasuk::create($request->all());

        // $barang = Barang::find($request->barang_id);
        // $barang->stok += $request->qty_masuk;
        // $barang->save();

        return redirect()->route('barangmasuk.index')->with(['success' => 'Data Barang Masuk Berhasil Disimpan!']);
    }

    public function show($id)
    {
        $barangmasuk = BarangMasuk::findOrFail($id);

        return view('barangmasuk.show', compact('barangmasuk'));
    }

    public function edit($id)
    {
        $barangmasuk = BarangMasuk::findOrFail($id);
        $barangs = Barang::all();

        return view('barangmasuk.edit', compact('barangmasuk', 'barangs'));
    }

    public function update(Request $request, $id)
    {   
        
        $request->validate([
            'tgl_masuk' => 'required|date',
            'qty_masuk' => 'required|integer|min:1',
            'barang_id' => 'required|exists:barang,id',
        ]);

        $barangmasuk = BarangMasuk::findOrFail($id);
        $barangmasuk->update($request->all());

        // Update stok barang terkait
        // $barang = Barang::find($request->barang_id);
        // $barang->stok += $request->qty_masuk - $barangmasuk->qty_masuk;
        // $barang->save();

        return redirect()->route('barangmasuk.index')->with(['success' => 'Data Barang Masuk Berhasil Diperbarui!']);
    }

    public function destroy($id)
    {
        $barangmasuk = BarangMasuk::findOrFail($id);

        // Mengurangi stok barang terkait
        // $barang = Barang::find($barangmasuk->barang_id);
        // $barang->stok -= $barangmasuk->qty_masuk;
        // $barang->save();

        $barangmasuk->delete();

        return redirect()->route('barangmasuk.index')->with(['success' => 'Data Barang Masuk Berhasil Dihapus!']);
    }
}