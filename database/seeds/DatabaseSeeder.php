<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProductsTableSeeder::class);
        $this->call(RazasTableSeeder::class);
        $this->call(ClienteTableSeeder::class);
        $this->call(MascotaTableSeeder::class);
        $this->call(AgendaTableSeeder::class);
    }
}
