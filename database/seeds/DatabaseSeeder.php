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
        $this->call(DescuentosTableSeeder::class);
        $this->call(MarcasTableSeeder::class);
        $this->call(MedidasTableSeeder::class);
        $this->call(ProveedoresTableSeeder::class);
        $this->call(TiposIngresoSalidaTableSeeder::class);
        $this->call(TiposTableSeeder::class);
        $this->call(EmpresasTableSeeder::class);
    }
}
