<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Http\Requests\StorePeminjamanRequest;
use App\Http\Requests\UpdatePeminjamanRequest;
use App\Models\barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $peminjamans = DB::table("peminjaman AS pmjn")
                        ->join("barangs AS brg", "pmjn.barang_id", "=", "brg.id")
                        ->select('brg.nama_barang', 'pmjn.id', 'pmjn.barang_id','pmjn.nama_peminjam', 'pmjn.jumlah_barang_dipinjam', 'pmjn.tanggal_dipinjam', 'pmjn.tanggal_dikembalikan')
                        ->get();

        return view('peminjaman.index', compact('peminjamans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create( $id )
    {
        //
        $barang = Barang::findOrFail($id);

        return view('peminjaman.tambah_peminjaman', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $peminjaman = Peminjaman::create([
            'barang_id' => $request->id,
            'nama_peminjam' => $request->nama_peminjam,
            'jumlah_barang_dipinjam' => $request->jumlah_barang_dipinjam,
            'tanggal_dipinjam' => $request->tanggal_dipinjam,
            'tanggal_dikembalikan' => $request->tanggal_dikembalikan
        ]);

        $barang = Barang::findOrFail($request->id);

        $jumlahBarangBerkurang = $barang->jumlah_barang - $request->jumlah_barang_dipinjam;

        Barang::where('id', $request->id)->update([
            'jumlah_barang' => $jumlahBarangBerkurang
        ]);

        return redirect()->route('peminjaman');

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id )
    {

        $peminjaman = DB::table('peminjaman AS pmjn')
                    ->join("barangs AS brg", "pmjn.barang_id", "=", "brg.id")
                    ->select('brg.nama_barang', 'brg.jumlah_barang','pmjn.id', 'pmjn.barang_id','pmjn.nama_peminjam', 'pmjn.jumlah_barang_dipinjam', 'pmjn.tanggal_dipinjam', 'pmjn.tanggal_dikembalikan')
                    ->where('pmjn.id', '=', $id)
                    ->first();

        return view('peminjaman.edit_peminjaman', compact('peminjaman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        // Ambil data peminjaman lama
        $peminjamanLama = Peminjaman::findOrFail($request->id);
        $jumlahBarangDipinjamLama = $peminjamanLama->jumlah_barang_dipinjam;

        // Validasi jumlah barang baru tidak melebihi stok tersedia
        $barang = Barang::findOrFail($request->barang_id);
        $stokTersedia = $barang->jumlah_barang + $jumlahBarangDipinjamLama;

        // Hitung perubahan stok barang
        $selisihBarang = $jumlahBarangDipinjamLama - $request->jumlah_barang_dipinjam;
        $barang->jumlah_barang += $selisihBarang;
        $barang->save();

        // Update data peminjaman
        $peminjamanLama->update([
            'nama_peminjam' => $request->nama_peminjam,
            'jumlah_barang_dipinjam' => $request->jumlah_barang_dipinjam,
            'tanggal_dipinjam' => $request->tanggal_dipinjam,
            'tanggal_dikembalikan' => $request->tanggal_dikembalikan,
        ]);

        return redirect()->route('peminjaman');
    }

        

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id )
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $barang = Barang::findOrFail($peminjaman->barang_id);

        $jumlahBarangKembali = $barang->jumlah_barang + $peminjaman->jumlah_barang_dipinjam;

        $barang->update([
            'jumlah_barang' => $jumlahBarangKembali
        ]);

        $peminjaman->delete();

        return redirect()->route('peminjaman');
    }
}
