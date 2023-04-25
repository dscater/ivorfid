<?php

namespace ivorfid\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use ivorfid\Empresa;
use ivorfid\Venta;
use ivorfid\Producto;
use ivorfid\User;
use ivorfid\Proveedor;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $empresa = Empresa::first();
        $datos = [];
        if(Auth::user()->tipo == 'ADMINISTRADOR')
        {
            $productos = Producto::where('status','=',1)->get();
            $usuarios = User::where('status','=',1)->get();
            $ventas = Venta::where('estado','=',1)->get();
            $proveedores = Proveedor::where('status','=',1)->get();
            $datos = [
                'productos' => count($productos),
                'usuarios' => count($usuarios),
                'ventas' => count($ventas),
                'proveedores' => count($proveedores),
                ];
        }
        if(Auth::user()->tipo == 'ALMACENERO')
        {
            $productos = Producto::where('status','=',1)->get();
            $ventas = Venta::where('estado','=',1)->get();
            $proveedores = Proveedor::where('status','=',1)->get();
            $datos = [
                'productos' => count($productos),
                'ventas' => count($ventas),
                'proveedores' => count($proveedores),
                ];
        }
        if(Auth::user()->tipo == 'CAJA')
        {
            $productos = Producto::where('status','=',1)->get();
            $ventas_hoy = Venta::where('estado','=',1)
                                ->where('users_id','=',Auth::user()->id)
                                ->where('fecha_venta','=',date('Y-m-d'))
                                ->get();
            $ventas_total = Venta::where('estado','=',1)
                                ->where('users_id','=',Auth::user()->id)
                                ->get();
            $datos = [
                'productos' => count($productos),
                'ventas_hoy' => count($ventas_hoy),
                'ventas_total' => count($ventas_total),
                ];
        }
        return view('home',compact('empresa','datos'));
    }
}
