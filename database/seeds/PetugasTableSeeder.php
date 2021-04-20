<?php

use Illuminate\Database\Seeder;

class PetugasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Petugas::insert([
            'nama'  => 'pida',
            'alamat'    => 'Jalan Pemuda',
            'no_telp'   => '0895360218897',
            'nik'   => '647200017273',
            'jk'        => 'perempuan',
            'user_id'   => 3,
            'created_at'    => \Carbon\Carbon::now(),
            'updated_at'    => \Carbon\Carbon::now()
        ]);
    }
}
