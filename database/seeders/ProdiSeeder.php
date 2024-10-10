<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prodi = [
            [
                'kode_prodi' => 'KD-MI',
                'nama_prodi' => 'D3 Manajemen Informatika',
            ],

            [
                'kode_prodi' => 'KD-TL',
                'nama_prodi' => 'D3 Teknik Listrik',
            ],
        ];

        \App\Models\Prodi::insert($prodi);
    }
}
