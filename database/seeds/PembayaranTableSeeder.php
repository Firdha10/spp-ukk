<?php

use Illuminate\Database\Seeder;

class PembayaranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Pembayaran::insert([
            'petugas_id' => 1,
            'siswa_id' => 1,
            'spp_bulan' => 'februari',
            'jumlah_bayar' => 150000,
            'created_at'    => \Carbon\Carbon::now(),
            'updated_at'    => \Carbon\Carbon::now()

        ]);
    }
}
