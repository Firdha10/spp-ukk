<?php

use Illuminate\Database\Seeder;

class SiswasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Siswa::insert([
                'id' => 1,
                'nama'  => 'alda',
                'nisn' => '12355678',
                'jk'    => 'perempuan',
                'no_telp' => '0895802604455',
                'alamat' => 'Jl. Pemuda',
                'kelas_id' => 2,
                'jurusan_id' => 1,
                'user_id'   => 2,
                'spp_id'    => 1,
                'created_at'    => \Carbon\Carbon::now(),
                'updated_at'    => \Carbon\Carbon::now()
        ]);
    }
}
