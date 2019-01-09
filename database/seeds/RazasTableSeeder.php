<?php

use Illuminate\Database\Seeder;

class RazasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Razas::class, 33)->create();
    }
}
