<?php

use Illuminate\Database\Seeder;
use App\Mascota;

class MascotaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Mascota::class, 10)->create();
    }
}
