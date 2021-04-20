<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(KelasTableSeeder::class);
        $this->call(JurusanTableSeeder::class);
        $this->call(PetugasTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(SppTableSeeder::class);
        $this->call(SiswasTableSeeder::class);
        $this->call(PembayaranTableSeeder::class);
    }
}
