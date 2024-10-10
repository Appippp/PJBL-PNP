<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mitra = [
            [
                'nama_mitra' => 'PT. Mitra Teknologi',
                'alamat' => 'Jl. Teknologi No. 1, Jakarta',
                'kontak' => '021-1234567',
            ],
            [
                'nama_mitra' => 'CV. Sukses Bersama',
                'alamat' => 'Jl. Sukses No. 2, Bandung',
                'kontak' => '022-7654321',
            ],
            [
                'nama_mitra' => 'PT. Inovasi Muda',
                'alamat' => 'Jl. Inovasi No. 3, Surabaya',
                'kontak' => '031-9876543',
            ],
            [
                'nama_mitra' => 'PT. Kreasi Digital',
                'alamat' => 'Jl. Kreasi No. 4, Yogyakarta',
                'kontak' => '0274-543210',
            ],
            [
                'nama_mitra' => 'PT. Cipta Karya',
                'alamat' => 'Jl. Cipta No. 5, Semarang',
                'kontak' => '024-1234567',
            ],
            [
                'nama_mitra' => 'PT. Solusi Bersama',
                'alamat' => 'Jl. Solusi No. 6, Medan',
                'kontak' => '061-7654321',
            ],
            [
                'nama_mitra' => 'CV. Mitra Abadi',
                'alamat' => 'Jl. Abadi No. 7, Palembang',
                'kontak' => '0711-9876543',
            ],
            [
                'nama_mitra' => 'PT. Harapan Muda',
                'alamat' => 'Jl. Harapan No. 8, Makassar',
                'kontak' => '0411-543210',
            ],
            [
                'nama_mitra' => 'PT. Sinar Jaya',
                'alamat' => 'Jl. Sinar No. 9, Bali',
                'kontak' => '0361-1234567',
            ],
            [
                'nama_mitra' => 'CV. Pionir Karya',
                'alamat' => 'Jl. Pionir No. 10, Batam',
                'kontak' => '0778-7654321',
            ],
        ];

        \App\Models\Mitra::insert($mitra);
    }
}
