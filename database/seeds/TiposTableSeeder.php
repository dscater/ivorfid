<?php

use Illuminate\Database\Seeder;

use ivorfid\Tipo;
class TiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipo::create([
            'nom' => 'TIPO 1',
            'descripcion' => '',
        ]);

        Tipo::create([
            'nom' => 'TIPO 2',
            'descripcion' => '',
        ]);

        Tipo::create([
            'nom' => 'TIPO 3',
            'descripcion' => '',
        ]);
    }
}
