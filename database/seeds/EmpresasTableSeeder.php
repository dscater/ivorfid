<?php

use Illuminate\Database\Seeder;

use ivorfid\Empresa;
class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::create([
            'cod' => 'EMP01',
            'nit' => '1231564564',
            'nro_aut' => '2315674898',
            'nro_emp' => '6666544555',
            'name' => 'INSTITUCION PRUEBA',
            'alias' => 'I.P.',
            'pais' => 'BOLIVIA',
            'dpto' => 'LA PAZ',
            'ciudad' => 'LA PAZ',
            'zona' => 'LOS OLIVOS',
            'calle' => 'LOS HEROES',
            'nro' => '233',
            'email' => '',
            'fono' => '2316489',
            'cel' => '68465315',
            'fax' => '',
            'casilla' => '',
            'web' => '',
            'logo' => 'logo.jpg',
            'actividad_eco' => 'CON FINES DE LUCRO'
        ]);
    }
}
