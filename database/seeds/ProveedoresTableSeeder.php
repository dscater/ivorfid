<?php

use Illuminate\Database\Seeder;

use ivorfid\Proveedor;
class ProveedoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proveedor::create([
            'razon_social_p' => 'PROVEEDOR 1',
            'nit_pro_p' => '23156489100',
            'numa_pro_p' => '1231564894',
            'dir_dpto_p' => 'LA PAZ',
            'dir_ciudad_p' => 'LA PAZ',
            'dir_zv_p' => 'ZONA FERROVIARIA',
            'dir_ac_p' => 'CALLE GALARZA',
            'dir_nro_p' => '23',
            'fono_p' => '2315642',
            'logo_p' => '1231560PROVEEDOR_1.png',
            'nom_rep_p' => 'ELVIS',
            'apep_rep_p' => 'CHAVEZ',
            'cel_rep_p' => '68465312',
            'fecha_reg_p' => '2019-04-08',
            'user_id' => '1',
            'status' => 1
        ]);

        Proveedor::create([
            'razon_social_p' => 'PROVEEDOR 2',
            'nit_pro_p' => '2315648963',
            'numa_pro_p' => '1231561899',
            'dir_dpto_p' => 'COCHABAMBA',
            'dir_ciudad_p' => 'COCHABAMBA',
            'dir_zv_p' => 'ZONA BALLIVIAN',
            'dir_ac_p' => 'CALLE SIMON BOLIVAR',
            'dir_nro_p' => '233',
            'fono_p' => '2316892',
            'logo_p' => '12345690PROVEEDOR_2.png',
            'nom_rep_p' => 'MARIO',
            'apep_rep_p' => 'ALCANTARA',
            'cel_rep_p' => '68479651',
            'fecha_reg_p' => '2019-04-08',
            'user_id' => '1',
            'status' => 1
        ]);

        Proveedor::create([
            'razon_social_p' => 'PROVEEDOR 3',
            'nit_pro_p' => '3216548963',
            'numa_pro_p' => '1236685499',
            'dir_dpto_p' => 'LA PAZ',
            'dir_ciudad_p' => 'LA PAZ',
            'dir_zv_p' => 'LAS LOMAS',
            'dir_ac_p' => 'CALLE CHACON',
            'dir_nro_p' => '563',
            'fono_p' => '2316892',
            'logo_p' => '1234697PROVEEDOR_3.jpg',
            'nom_rep_p' => 'XIMENA',
            'apep_rep_p' => 'RAMOS',
            'cel_rep_p' => '68459851',
            'fecha_reg_p' => '2019-04-08',
            'user_id' => '1',
            'status' => 1
        ]);
    }
}
