<?php

use Illuminate\Database\Seeder;

use ivorfid\User;
use ivorfid\DatosUsuario;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // USUARIO POR DEFECTO ADMIN
        User::create([
            'name' => 'admin',
            'password' => Hash::make('admin'),
            'tipo' => 'ADMINISTRADOR',
            'foto' => 'user_default.png',
            'status' => 1
        ]);

        // USUARIOS CON DATOS
        $user_admin = User::create([
            'name' => '11001',
            'password' => Hash::make('12345678'),
            'tipo' => 'ADMINISTRADOR',
            'foto' => 'user_default.png',
            'status' => 1
        ]);

        $user_almacen = User::create([
            'name' => '21002',
            'password' => Hash::make('12345678'),
            'tipo' => 'ALMACENERO',
            'foto' => 'user_default.png',
            'status' => 1
        ]);

        $user_caja = User::create([
            'name' => '31003',
            'password' => Hash::make('12345678'),
            'tipo' => 'CAJA',
            'foto' => 'user_default.png',
            'status' => 1
        ]);

        // DATOS DE LOS USUARIOS
        $datos_admin = new DatosUsuario([
            'nom_u' => 'CARLOS',
            'apep_u' => 'QUISPE',
            'apem_u' => 'QUISPE',
            'ci_u' => '12345678',
            'ci_exp_u' => 'LP',
            'fecha_nac_u' => '1985-03-22',
            'genero_u' => 'M',
            'dir_dpto_u' => 'LA PAZ',
            'dir_ciudad_u' => 'LA PAZ',
            'dir_zv_u' => 'ZONA LOS OLIVOS',
            'dir_ac_u' => 'CALLE LOS HEROES',
            'dir_num_u' => '15',
            'fono_u' => '231567',
            'cel_u' => '78945612',
            'foto_u' => '155144470011001CARLOS.jpg',
            'fecha_reg' => '2019-04-08',
        ]);

        $datos_almacen = new DatosUsuario([
            'nom_u' => 'JHONNY',
            'apep_u' => 'CARVAJAL',
            'apem_u' => 'MAMANI',
            'ci_u' => '12345678',
            'ci_exp_u' => 'LP',
            'fecha_nac_u' => '1990-06-22',
            'genero_u' => 'M',
            'dir_dpto_u' => 'LA PAZ',
            'dir_ciudad_u' => 'LA PAZ',
            'dir_zv_u' => 'LAS LOMAS',
            'dir_ac_u' => 'CALLE BOLIVAR',
            'dir_num_u' => '23',
            'fono_u' => '232367',
            'cel_u' => '78994612',
            'foto_u' => '155144470121002JHONNY.jpg',
            'fecha_reg' => '2019-04-08',
        ]);

        $datos_caja = new DatosUsuario([
            'nom_u' => 'PATRICIA',
            'apep_u' => 'CONDORI',
            'apem_u' => 'RAMOS',
            'ci_u' => '12345678',
            'ci_exp_u' => 'LP',
            'fecha_nac_u' => '1994-11-04',
            'genero_u' => 'F',
            'dir_dpto_u' => 'LA PAZ',
            'dir_ciudad_u' => 'LA PAZ',
            'dir_zv_u' => 'ZONA LOS PEDREGALES',
            'dir_ac_u' => 'CALLE 5',
            'dir_num_u' => '155',
            'fono_u' => '2315567',
            'cel_u' => '78946912',
            'foto_u' => '1551444702331003PATRICIA.jpg',
            'fecha_reg' => '2019-04-08',
        ]);

        // RELACIONANDO USUARIO CON DATOS
        $user_admin->datosUsuario()->save($datos_admin);
        $user_almacen->datosUsuario()->save($datos_almacen);
        $user_caja->datosUsuario()->save($datos_caja);
    }
}
