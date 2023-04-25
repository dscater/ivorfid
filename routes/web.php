<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use ivorfid\Empresa;

Route::get('/', function () {
    $empresa = Empresa::first();
    return view('auth.login', compact('empresa'));
});

Auth::routes();


Route::middleware(['auth'])->group(function () {
    // HOME
    Route::get('/home', 'HomeController@index')->name('home');

    // USUARIOS
    Route::get('users', 'DatosUsuarioController@index')->name('users.index');

    Route::get('users/create', 'DatosUsuarioController@create')->name('users.create');

    Route::get('users/show/{datosUsuario}', 'DatosUsuarioController@show')->name('users.show');

    Route::get('users/edit/{datosUsuario}', 'DatosUsuarioController@edit')->name('users.edit');

    Route::post('users/store', 'DatosUsuarioController@store')->name('users.store');

    Route::put('users/update/{datosUsuario}', 'DatosUsuarioController@update')->name('users.update');

    Route::delete('users/destroy/{user}', 'DatosUsuarioController@destroy')->name('users.destroy');

    // Configuración de cuenta
    // contraseña
    Route::GET('users/configurar/cuenta/{user}', 'DatosUsuarioController@config_cuenta')->name('users.config');
    Route::PUT('users/configurar/cuenta/update/{user}', 'DatosUsuarioController@cuenta_update')->name('users.config_update');
    // foto de perfil
    Route::POST('users/configurar/cuenta/update/foto/{user}', 'DatosUsuarioController@cuenta_update_foto')->name('users.config_update_foto');

    // CLIENTES
    Route::get('clientes/buscar', 'ClienteController@buscar')->name('clientes.buscar');

    // PROVEEDORES
    Route::get('proveedores', 'ProveedorController@index')->name('proveedores.index');

    Route::get('proveedores/create', 'ProveedorController@create')->name('proveedores.create');

    Route::get('proveedores/show/{proveedor}', 'ProveedorController@show')->name('proveedores.show');

    Route::get('proveedores/edit/{proveedor}', 'ProveedorController@edit')->name('proveedores.edit');

    Route::post('proveedores/store', 'ProveedorController@store')->name('proveedores.store');

    Route::put('proveedores/update/{proveedor}', 'ProveedorController@update')->name('proveedores.update');

    Route::delete('proveedores/destroy/{proveedor}', 'ProveedorController@destroy')->name('proveedores.destroy');

    // PRODUCTOS
    Route::get('productos', 'ProductoController@index')->name('productos.index');

    Route::get('productos/create', 'ProductoController@create')->name('productos.create');

    Route::get('productos/show/{producto}', 'ProductoController@show')->name('productos.show');

    Route::get('productos/edit/{producto}', 'ProductoController@edit')->name('productos.edit');

    Route::post('productos/store', 'ProductoController@store')->name('productos.store');

    Route::put('productos/update/{producto}', 'ProductoController@update')->name('productos.update');

    Route::delete('productos/destroy/{producto}', 'ProductoController@destroy')->name('productos.destroy');

    // TIPOS
    Route::get('tipos', 'TipoController@index')->name('tipos.index');

    Route::get('tipos/create', 'TipoController@create')->name('tipos.create');

    Route::get('tipos/show/{tipo}', 'TipoController@show')->name('tipos.show');

    Route::get('tipos/edit/{tipo}', 'TipoController@edit')->name('tipos.edit');

    Route::post('tipos/store', 'TipoController@store')->name('tipos.store');

    Route::put('tipos/update/{tipo}', 'TipoController@update')->name('tipos.update');

    Route::delete('tipos/destroy/{tipo}', 'TipoController@destroy')->name('tipos.destroy');

    // MARCAS
    Route::get('marcas', 'MarcaController@index')->name('marcas.index');

    Route::get('marcas/create', 'MarcaController@create')->name('marcas.create');

    Route::get('marcas/show/{marca}', 'MarcaController@show')->name('marcas.show');

    Route::get('marcas/edit/{marca}', 'MarcaController@edit')->name('marcas.edit');

    Route::post('marcas/store', 'MarcaController@store')->name('marcas.store');

    Route::put('marcas/update/{marca}', 'MarcaController@update')->name('marcas.update');

    Route::delete('marcas/destroy/{marca}', 'MarcaController@destroy')->name('marcas.destroy');

    // MEDIDAS
    Route::get('medidas', 'MedidaController@index')->name('medidas.index');

    Route::get('medidas/create', 'MedidaController@create')->name('medidas.create');

    Route::get('medidas/show/{medida}', 'MedidaController@show')->name('medidas.show');

    Route::get('medidas/edit/{medida}', 'MedidaController@edit')->name('medidas.edit');

    Route::post('medidas/store', 'MedidaController@store')->name('medidas.store');

    Route::put('medidas/update/{medida}', 'MedidaController@update')->name('medidas.update');

    Route::delete('medidas/destroy/{medida}', 'MedidaController@destroy')->name('medidas.destroy');

    // INGRESOS
    Route::get('productos/ingresos', 'IngresoController@index')->name('ingresos.index');

    Route::get('productos/ingresos/obtieneStock', 'IngresoController@obtieneStock')->name('ingresos.obtieneStock');

    Route::get('productos/ingresos/create', 'IngresoController@create')->name('ingresos.create');

    Route::get('productos/ingresos/show/{ingreso}', 'IngresoController@show')->name('ingresos.show');

    Route::get('productos/ingresos/edit/{ingreso}', 'IngresoController@edit')->name('ingresos.edit');

    Route::post('productos/ingresos/store', 'IngresoController@store')->name('ingresos.store');

    Route::put('productos/ingresos/update/{ingreso}', 'IngresoController@update')->name('ingresos.update');

    Route::delete('productos/ingresos/destroy/{ingreso}', 'IngresoController@destroy')->name('ingresos.destroy');

    // SALIDAS
    Route::get('productos/salidas', 'SalidaController@index')->name('salidas.index');

    Route::get('productos/salidas/obtieneStock', 'SalidaController@obtieneStock')->name('salidas.obtieneStock');

    Route::get('productos/salidas/create', 'SalidaController@create')->name('salidas.create');

    Route::get('productos/salidas/show/{salida}', 'SalidaController@show')->name('salidas.show');

    Route::get('productos/salidas/edit/{salida}', 'SalidaController@edit')->name('salidas.edit');

    Route::post('productos/salidas/store', 'SalidaController@store')->name('salidas.store');

    Route::put('productos/salidas/update/{salida}', 'SalidaController@update')->name('salidas.update');

    Route::delete('productos/salidas/destroy/{salida}', 'SalidaController@destroy')->name('salidas.destroy');

    // TIPOS DE INGRESOS/SALIDAS
    Route::get('productos/tipos_is', 'TiposIngresoSalidaController@index')->name('tipos_is.index');

    Route::get('productos/tipos_is/create', 'TiposIngresoSalidaController@create')->name('tipos_is.create');

    Route::get('productos/tipos_is/show/{tipo}', 'TiposIngresoSalidaController@show')->name('tipos_is.show');

    Route::get('productos/tipos_is/edit/{tipo}', 'TiposIngresoSalidaController@edit')->name('tipos_is.edit');

    Route::post('productos/tipos_is/store', 'TiposIngresoSalidaController@store')->name('tipos_is.store');

    Route::put('productos/tipos_is/update/{tipo}', 'TiposIngresoSalidaController@update')->name('tipos_is.update');

    Route::delete('productos/tipos_is/destroy/{tipo}', 'TiposIngresoSalidaController@destroy')->name('tipos_is.destroy');

    // DESCUENTOS
    Route::get('descuentos', 'DescuentoController@index')->name('descuentos.index');

    Route::get('descuentos/obtieneDescuento', 'DescuentoController@obtieneDescuento')->name('descuentos.obtieneDescuento');

    Route::get('descuentos/create', 'DescuentoController@create')->name('descuentos.create');

    Route::get('descuentos/show/{descuento}', 'DescuentoController@show')->name('descuentos.show');

    Route::get('descuentos/edit/{descuento}', 'DescuentoController@edit')->name('descuentos.edit');

    Route::post('descuentos/store', 'DescuentoController@store')->name('descuentos.store');

    Route::put('descuentos/update/{descuento}', 'DescuentoController@update')->name('descuentos.update');

    Route::delete('descuentos/destroy/{descuento}', 'DescuentoController@destroy')->name('descuentos.destroy');

    // VENTAS
    Route::get('productos/ventas', 'VentaController@index')->name('ventas.index');

    Route::get('productos/ventas/obtieneProducto', 'VentaController@obtenerProducto')->name('ventas.obtieneProducto');

    Route::get('productos/ventas/factura/{venta}', 'VentaController@factura')->name('ventas.factura');

    Route::get('productos/ventas/create', 'VentaController@create')->name('ventas.create');

    Route::get('productos/ventas/show/{venta}', 'VentaController@show')->name('ventas.show');

    Route::get('productos/ventas/edit/{venta}', 'VentaController@edit')->name('ventas.edit');

    Route::post('productos/ventas/store', 'VentaController@store')->name('ventas.store');

    Route::put('productos/ventas/update/{venta}', 'VentaController@update')->name('ventas.update');

    Route::delete('productos/ventas/destroy/{venta}', 'VentaController@destroy')->name('ventas.destroy');

    // REPORTES
    Route::get('reportes', 'ReporteController@index')->name('reportes.index');

    Route::get('reportes/maestroProductos', 'ReporteController@maestroProductos')->name('reportes.maestroProductos');

    Route::get('reportes/ingresosProductos', 'ReporteController@ingresosProductos')->name('reportes.ingresosProductos');

    Route::get('reportes/salidasProductos', 'ReporteController@salidasProductos')->name('reportes.salidasProductos');

    Route::get('reportes/kardexInventario', 'ReporteController@kardexInventario')->name('reportes.kardexInventario');

    Route::get('reportes/movimientoProductos', 'ReporteController@movimientoProductos')->name('reportes.movimientoProductos');

    Route::get('reportes/libroCompras', 'ReporteController@libroCompras')->name('reportes.libroCompras');

    Route::get('reportes/libroVentas', 'ReporteController@libroVentas')->name('reportes.libroVentas');
});
