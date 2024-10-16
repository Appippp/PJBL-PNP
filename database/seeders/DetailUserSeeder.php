<?php

namespace Database\Seeders;

use App\Models\DetailUser;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DetailUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $detail_user = [
            [
                'user_id'        => 1,
                'type_user_id'   => 1,
                'prodi_id'       => NULL,
                'tahun_masuk'    => NULL,
                'no_telp'        => NULL,
                'alamat'         => NULL,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],


        ];

        DetailUser::insert($detail_user);
    }
}
