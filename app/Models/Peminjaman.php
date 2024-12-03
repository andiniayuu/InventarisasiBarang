<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    /** @use HasFactory<\Database\Factories\PeminjamanFactory> */
    use HasFactory;

    protected $table = "peminjaman";

    protected $fillable = ['barang_id', 'nama_peminjam', 'jumlah_barang_dipinjam', 'tanggal_dipinjam', 'tanggal_dikembalikan'];

}
