<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('peminjaman')->insert([
            [
                'barang_id' => 1, // Pastikan ID ini sesuai dengan data di tabel `barangs`
                'nama_peminjam' => 'Ahmad Fauzi',
                'jumlah_barang_dipinjam' => 2,
                'tanggal_dipinjam' => '2024-12-01',
                'tanggal_dikembalikan' => '2024-12-05',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 2,
                'nama_peminjam' => 'Siti Aisyah',
                'jumlah_barang_dipinjam' => 3,
                'tanggal_dipinjam' => '2024-12-02',
                'tanggal_dikembalikan' => '2024-12-06',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 3,
                'nama_peminjam' => 'Budi Santoso',
                'jumlah_barang_dipinjam' => 1,
                'tanggal_dipinjam' => '2024-12-03',
                'tanggal_dikembalikan' => '2024-12-07',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
