<?php

use Illuminate\Database\Seeder;

use ivorfid\Marca;
class MarcasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Marca::create([
            'nom' => 'MARCA 1',
            'descripcion' => '',
        ]);

        Marca::create([
            'nom' => 'MARCA 2',
            'descripcion' => '',
        ]);

        Marca::create([
            'nom' => 'MARCA 3',
            'descripcion' => '',
        ]);
    }
}
