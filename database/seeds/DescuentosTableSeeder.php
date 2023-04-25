<?php

use Illuminate\Database\Seeder;

use ivorfid\Descuento;
class DescuentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Descuento::create([
            'descuento' => 250.00,
            'simbolo' => 'DMY1',
            'descripcion' => '',
        ]);

        Descuento::create([
            'descuento' => 350.00,
            'simbolo' => 'DAG1',
            'descripcion' => '',
        ]);
    }
}
