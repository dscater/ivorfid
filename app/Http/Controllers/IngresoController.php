<?php

namespace ivorfid\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use ivorfid\Ingreso;
use ivorfid\Producto;
use ivorfid\Stock;
use ivorfid\TiposIngresoSalida;
use ivorfid\ProductoRfid;
use ivorfid\Empresa;
class IngresoController extends Controller
{
    public function index(Request $request)
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'ALMACENERO')
        {
            $ingresos = Ingreso::all();
            if($request->ajax())
            {
                return response()->JSON(view('ingresos.parcial.lista',compact('ingresos'))->render());
            }   
            return view('ingresos.index',compact('empresa','ingresos'));
        }
        return view('errors.sin_permiso',compact('empresa'));
    }

    public function obtieneStock(Request $request)
    {
        $producto = Producto::nombre_grupo($request->id);
        $stock = Stock::where('producto_id','=',$request->id)->get()->first();
        if(!empty($producto))
        {
            $stock = $stock->cant_actual;
            $nombre = $producto[0]->nom;
            $imagen = $producto[0]->imagen;
            $precio = number_format($producto[0]->precio,2,'.',',');
        }
        else{
            $stock = "0";
            $nombre = "GRUPO";
            $imagen = "producto_default.png";
            $precio = "0.00";
        }
        return response()->JSON([
            'stock' => $stock,
            'nombre' => $nombre,
            'imagen' => $imagen,
            'precio' => $precio,
        ]);
    }

    public function create()
    {
        $empresa = Empresa::first();

        $productos = Producto::where('status','=',1)->get();
        $tipos_is = TiposIngresoSalida::orderBy('nom','ASC')->get();
        $array_productos[''] = '';
        foreach($productos as $producto)
        {
            $array_productos[$producto->id] = $producto->nom;
        }
        $array_tipos[''] = '';
        foreach($tipos_is as $value)
        {
            $array_tipos[$value->nom] = $value->nom;
        }
        if(Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'ALMACENERO')
        {
            return view('ingresos.create',compact('empresa','array_productos','array_tipos'));
        }
        return view('errors.sin_permiso',compact('empresa'));
    }

    public function store(Request $request)
    {
        $producto = Producto::find($request->id);
        $existe = ProductoRfid::where('rfid','=',$request->rfid)->get();
        if(count($existe) > 0)
        {
            return response()->JSON([
                'msg' => "EXISTE"
            ]);
        }
        else{
            // AGREGAR EL NUEVO PRODUCTO EN LA TABLA PRODUCTORFID
            $producto_rfid = new ProductoRfid();
            $producto_rfid->rfid = $request->rfid;
            $producto_rfid->producto_id = $request->id;
            $producto_rfid->estado = 'ALMACEN';
            if($producto_rfid->save())
            {
                
                // ACTUALIZAMOS EL STOCK
                $cant_actual = $producto->stock->cant_actual;
                $cant_ingresos = $producto->stock->cant_ingresos;
                $producto->stock->cant_actual = $cant_actual + 1;
                $producto->stock->cant_ingresos = $cant_ingresos + 1;
                $producto->stock->fecha_movimiento = date('Y-m-d');
                $producto->stock->save();
                // REGISTRAR EL INGRESO
                $ingreso = new Ingreso();
                $ingreso->tipo_nom = $request->tipo;
                $ingreso->proveedor_id = $producto->proveedor_id;
                $ingreso->producto_id = $producto->id;
                $ingreso->user_id = Auth::user()->id;
                $ingreso->precio_uni = $request->precio_uni;
                $ingreso->cantidad = 1;
                $ingreso->precio_total = $request->precio_uni;
                $ingreso->descripcion = $request->tipo;
                $ingreso->codigo = mb_strtoupper($request->codigo);
                $ingreso->nro_aut = $producto->proveedor->numa_pro_p;
                $ingreso->nro_fac = mb_strtoupper($request->nro_fac);
                $ingreso->nro_rec = mb_strtoupper($request->nro_rec);
                $ingreso->fecha_ingreso = date('Y-m-d');
                $ingreso->save();
                return response()->JSON([
                    'msg' => "BIEN",
                ]);
            }
            else{
                return response()->JSON([
                    'msg' => "MAL"
                ]);
            }
        }

    }

    public function edit(Ingreso $ingreso)
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'ALMACENERO')
        {
            return view('ingresos.edit',compact('empresa','ingreso'));
        }
        return view('errors.sin_permiso',compact('empresa'));
    }

    public function update(Request $request, Ingreso $ingreso)
    {
        $ingreso->update(array_map('mb_strtoupper',$request->except('logo_p')));
        return redirect()->route('ingresos.edit',$ingreso->id)->with('success','success');
    }

    public function show(Ingreso $ingreso)
    {

    }

    public function destroy(Ingreso $ingreso)
    {
        $existe_uso = Producto::where('ingreso','=',$ingreso->nom)->get();
        if(count($existe_uso) == 0)
        {
            $ingreso->delete();
            return response()->JSON([
                'msg' => 'cambiar status',
            ]);
        }
        else{
            return response()->JSON([
                'msg' => 'NO',
            ]);
        }
    }
}
