<?php

use Illuminate\Database\Seeder;

use ivorfid\TiposIngresoSalida;
class TiposIngresoSalidaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TiposIngresoSalida::create([
            'nom' => 'SALIDA POR VENTA',
            'descripcion' => '',
        ]);

        TiposIngresoSalida::create([
            'nom' => 'INGRESO NUEVOS PRODUCTOS',
            'descripcion' => '',
        ]);

        TiposIngresoSalida::create([
            'nom' => 'INGRESO POR OTROS CONCEPTOS',
            'descripcion' => '',
        ]);
    }
}
