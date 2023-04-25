<?php

use Illuminate\Database\Seeder;

use\ivorfid\Medida;
class MedidasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Medida::create([
            'nom' => 'UNIDADES',
            'simbolo' => 'U',
            'descripcion' => '',
        ]);

        Medida::create([
            'nom' => 'METROS',
            'simbolo' => 'M',
            'descripcion' => '',
        ]);

        Medida::create([
            'nom' => 'CENTIMETROS',
            'simbolo' => 'CM',
            'descripcion' => '',
        ]);

        Medida::create([
            'nom' => 'KILOGRAMOS',
            'simbolo' => 'KG',
            'descripcion' => '',
        ]);

        Medida::create([
            'nom' => 'GRAMOS',
            'simbolo' => 'G',
            'descripcion' => '',
        ]);

    }
}
