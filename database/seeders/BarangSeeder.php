<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barangs')->insert([
            [
                'kode_barang' => 'BRG001',
                'nama_barang' => 'Kursi Kantor',
                'jumlah_barang' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_barang' => 'BRG002',
                'nama_barang' => 'Meja Kerja',
                'jumlah_barang' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_barang' => 'BRG003',
                'nama_barang' => 'Lemari Arsip',
                'jumlah_barang' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
