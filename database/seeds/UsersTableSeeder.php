<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::insert([
            [
                'id'            => 1,
                'email'         => 'admin@spp.com',
                'password'      => bcrypt('123123'),
                'level'         => 'admin',
                'gambar'        => NULL,
                'created_at'    => \Carbon\Carbon::now(),
                'updated_at'    => \Carbon\Carbon::now()
            ],
            [
                'id'            => 2,
                'email'         => 'siswa@spp.com',
                'password'      => bcrypt('123123'),
                'level'         => 'siswa',
                'gambar'        => NULL,
                'created_at'    => \Carbon\Carbon::now(),
                'updated_at'    => \Carbon\Carbon::now()

            ],
            [
                'id'            => 3,
                'email'         => 'petugas@spp.com',
                'password'      => bcrypt('123123'),
                'level'         => 'petugas',
                'gambar'        => NULL,
                'created_at'    => \Carbon\Carbon::now(),
                'updated_at'    => \Carbon\Carbon::now()
            ]
        ]);
    }
}
