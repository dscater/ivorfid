<?php

namespace ivorfid\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use ivorfid\Salida;
use ivorfid\Producto;
use ivorfid\TiposIngresoSalida;
use ivorfid\ProductoRfid;
use ivorfid\Empresa;
class SalidaController extends Controller
{
    public function index(Request $request)
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'ALMACENERO')
        {
            $salidas = Salida::all();
            if($request->ajax())
            {
                return response()->JSON(view('salidas.parcial.lista',compact('salidas'))->render());
            }   
            return view('salidas.index',compact('empresa','salidas'));
        }
        return view('errors.sin_permiso',compact('empresa'));
    }

    public function obtieneStock(Request $request)
    {
        $comprueba = ProductoRfid::where('rfid','=',$request->rfid)->get();
        if(count($comprueba) > 0)
        {
            $producto_rfid = ProductoRfid::where('rfid','=',$request->rfid)->get()->first();
            $stock = $producto_rfid->producto->stock->cant_actual;
            $producto = $producto_rfid->producto;
            
            $id = $producto->id;
            $nombre = $producto->nom;
            $imagen = $producto->imagen;
            $precio = number_format($producto->precio,2,'.',',');
        }
        else{
            $nombre = "GRUPO";
            $imagen = "producto_default.png";
            $stock = 0;
            $id = 0;
            $precio = "0.00";
        }
        return response()->JSON([
            'stock' => $stock,
            'nombre' => $nombre,
            'imagen' => $imagen,
            'precio' => $precio,
            'id' => $id,
        ]);
    }

    public function create()
    {
        $empresa = Empresa::first();

        $productos = Producto::where('status','=',1)->get();
        $tipos_is = TiposIngresoSalida::orderBy('nom','DESC')->get();
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
            return view('salidas.create',compact('empresa','array_productos','array_tipos'));
        }
        return view('errors.sin_permiso',compact('empresa'));
    }

    public function store(Request $request)
    {
        $comprueba = Producto::where('id','=',$request->id)->get();
        if(count($comprueba) > 0)
        {
            // ACTUALIZAR EL ESTADO DEL PRODUCTO RFID
            $comprueba_rfid = ProductoRfid::where('rfid','=',$request->rfid)
                                        ->where('estado','=','ALMACEN')
                                        ->get();
            if(count($comprueba_rfid) > 0)
            {
                $producto = Producto::find($request->id);
                // REGISTRAR LA SALIDA
                $salida = new Salida();
                $salida->tipo_nom = $request->tipo;
                $salida->producto_id = $producto->id;
                $salida->user_id = Auth::user()->id;
                $salida->precio_uni = $request->precio_uni;
                $salida->cantidad = 1;
                $salida->descripcion = mb_strtoupper($request->descripcion);
                $salida->fecha_salida = date('Y-m-d');
                if($salida->save())
                {
                    $producto_rfid = ProductoRfid::where('rfid','=',$request->rfid)
                                                ->where('estado','=','ALMACEN')
                                                ->get()->first();
                    $producto_rfid->estado = 'SALIDA';
                    $producto_rfid->save();
                    // ACTUALIZAR STOCK
                    $cant_actual = $producto->stock->cant_actual;
                    $cant_salidas = $producto->stock->cant_salidas;
                    $producto->stock->cant_actual = $cant_actual - 1;
                    $producto->stock->cant_salidas = $cant_salidas + 1;
                    $producto->stock->save();
                    return response()->JSON([
                    'msg' => "BIEN"
                    ]);   
                }
                else{
                    return response()->JSON([
                        'msg' => "MAL"
                    ]);
                }
            }
            else{
                return response()->JSON([
                'msg' => "NO EXISTE"
                ]);
            }
        }
        else{
            return response()->JSON([
                'msg' => "NO EXISTE"
            ]);
        }
    }

    public function edit(Salida $ingreso)
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'ALMACENERO')
        {
            return view('salidas.edit',compact('empresa','ingreso'));
        }
        return view('errors.sin_permiso',compact('empresa'));
    }

    public function update(Request $request, Salida $ingreso)
    {
        $ingreso->update(array_map('mb_strtoupper',$request->except('logo_p')));
        return redirect()->route('salidas.edit',$ingreso->id)->with('success','success');
    }

    public function show(Ingreso $ingreso)
    {

    }

    public function destroy(Salida $ingreso)
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
