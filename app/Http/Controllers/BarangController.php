<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Http\Requests\StorebarangRequest;
use App\Http\Requests\UpdatebarangRequest;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $barangs = Barang::all();

        return view('barang.barang', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $barang = Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'jumlah_barang' => $request->jumlah_barang
        ]);

        return redirect()->route('barang');

    }

    /**
     * Display the specified resource.
     */
    public function show(barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id )
    {
        //
        $barang = Barang::findOrFail($id);
        return view('barang.edit_barang', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $barang = Barang::where('id', $request->id)->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'jumlah_barang' => $request->jumlah_barang
        ]);

        return redirect()->route('barang');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id ) 
    {
        //

        // dd($id);
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang');
    }
}
