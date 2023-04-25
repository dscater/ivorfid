<?php

namespace ivorfid\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use ivorfid\Empresa;
use ivorfid\Marca;
use ivorfid\Tipo;
use ivorfid\Producto;
use ivorfid\Stock;
use ivorfid\Ingreso;
use ivorfid\Venta;
use ivorfid\Salida;
use ivorfid\Reporte;

use Barryvdh\DomPDF\Facade as PDF;
class ReporteController extends Controller
{
    public function index()
    {
        $empresa = Empresa::first();
        $marcas = Marca::all();
        $tipos = Tipo::all();
        $productos = Producto::where('status','=',1)->get();
        if(Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'ALMACENERO')
        {
            return view('reportes.index',compact('empresa','marcas','tipos','productos'));
        }
        return view('errors.sin_permiso',compact('empresa'));
    }

    public function maestroProductos(Request $request)
    {
        $empresa = Empresa::first();
        $filtro = $request->filtro;
        $filtro_marca = $request->marca;
        $filtro_tipo = $request->tipo;
        $productos = Producto::where('status','=',1)->get();
        switch($filtro)
        {
            case 'MARCA':
                if($filtro_marca != 'TODOS')
                {
                    $productos = Producto::where('status','=',1)
                                        ->where('marca','=',$filtro_marca)->get();
                }
                break;
            case 'TIPO':
                if($filtro_tipo != 'TODOS')
                {
                    $productos = Producto::where('status','=',1)
                                        ->where('tipo','=',$filtro_tipo)->get();
                }
                break;
        }
        $pdf = PDF::loadView('reportes.r_maestroProductos',compact('productos','empresa'))->setPaper('letter', 'landscape');
        return $pdf->stream('Productos.pdf');
    }

    public function ingresosProductos(Request $request)
    {
        $empresa = Empresa::first();
        $filtro = $request->filtro;
        $fecha_ini = $request->fecha_ini;
        $fecha_fin = $request->fecha_fin;
        $producto = $request->producto;
        $ingresos = Ingreso::all();
        switch($filtro)
        {
            case 'FECHA':
                $ingresos = Ingreso::whereBetween('fecha_ingreso',[$fecha_ini,$fecha_fin])->get();
                break;
            case 'PRODUCTO':
                if($producto != 'TODOS')
                {
                    $ingresos = Ingreso::where('producto_id','=',$producto)->get();
                }
                break;
        }
        $pdf = PDF::loadView('reportes.r_ingresosProductos',compact('ingresos','empresa'))->setPaper('letter', 'landscape');
        return $pdf->stream('Ingresos.pdf');
    }

    public function salidasProductos(Request $request)
    {
        $empresa = Empresa::first();
        $filtro = $request->filtro;
        $fecha_ini = $request->fecha_ini;
        $fecha_fin = $request->fecha_fin;
        $producto = $request->producto;
        $salidas = Salida::all();
        switch($filtro)
        {
            case 'FECHA':
                $salidas = Salida::whereBetween('fecha_ingreso',[$fecha_ini,$fecha_fin])->get();
                break;
            case 'PRODUCTO':
                if($producto != 'TODOS')
                {
                    $salidas = Salida::where('producto_id','=',$producto)->get();
                }
                break;
        }
        $pdf = PDF::loadView('reportes.r_salidasProductos',compact('salidas','empresa'))->setPaper('letter', 'landscape');
        return $pdf->stream('Salidas.pdf');
    }

    public function kardexInventario(Request $request)
    {
        $filtro = $request->filtro;
        $fecha_ini = $request->fecha_ini;
        $fecha_fin = $request->fecha_fin;
        $producto = $request->producto;
        //obtener todos los productos
        $productos = Producto::where('status','=',1)->get();
        if($filtro == 'PRODUCTO')
        {
            if($producto != 'TODOS')
            {
                return Reporte::kardex($fecha_ini,$fecha_fin,$producto);
            }
        }
        return Reporte::kardex($fecha_ini,$fecha_fin,0);
    }

    public function movimientoProductos(Request $request)
    {
        $empresa = Empresa::first();
        $filtro = $request->filtro;
        $producto = $request->producto;
        //obtener todos los productos
        $stocks = Stock::select('stocks.*')
                            ->join('productos','productos.id','=','stocks.producto_id')
                            ->where('productos.status','=',1)
                            ->get();
        if($filtro == 'PRODUCTO')
        {
            if($producto != 'TODOS')
            {
                $stocks = Stock::select('stocks.*')
                            ->join('productos','productos.id','=','stocks.producto_id')
                            ->where('productos.id','=',$producto)
                            ->where('productos.status','=',1)
                            ->get();
            }
        }
        $pdf = PDF::loadView('reportes.r_movimientoProductos',compact('stocks','empresa'))->setPaper('letter', 'portrait');
        return $pdf->stream('MovimientoProductos.pdf');
    }

    public function libroCompras(Request $request)
    {
        $empresa = Empresa::first();
        $fecha_ini = $request->fecha_ini;
        $fecha_fin = $request->fecha_fin;
        $ingresos = Ingreso::libro_compras($fecha_ini,$fecha_fin);

        $anio_fiscal = explode('-',$fecha_ini);
        $pdf = PDF::loadView('reportes.r_libroCompras',compact('ingresos','empresa','anio_fiscal'))->setPaper('letter', 'portrait');
        return $pdf->stream('LibroCompras.pdf');
    }

    public function libroVentas(Request $request)
    {
        $empresa = Empresa::first();
        $fecha_ini = $request->fecha_ini;
        $fecha_fin = $request->fecha_fin;
        $ventas = Venta::whereBetween('fecha_venta',[$fecha_ini,$fecha_fin])->get();

        $anio_fiscal = explode('-',$fecha_ini);
        $pdf = PDF::loadView('reportes.r_libroVentas',compact('ventas','empresa','anio_fiscal'))->setPaper('letter', 'portrait');
        return $pdf->stream('LibroVentas.pdf');
    }

}
