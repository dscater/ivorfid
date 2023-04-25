<?php

namespace ivorfid\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use ivorfid\TiposIngresoSalida;
use ivorfid\Producto;
use ivorfid\Ingreso;
use ivorfid\Salida;
use ivorfid\Empresa;
class TiposIngresoSalidaController extends Controller
{
    public function index(Request $request)
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'ALMACENERO')
        {
            $tipos_is = TiposIngresoSalida::all();
            if($request->ajax())
            {
                return response()->JSON(view('tipos_is.parcial.lista',compact('tipos_is'))->render());
            }   
            return view('tipos_is.index',compact('empresa','tipos_is'));
        }
        return view('errors.sin_permiso',compact('empresa'));
    }

    public function create()
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'ALMACENERO')
        {
            return view('tipos_is.create',compact('empresa'));
        }
        return view('errors.sin_permiso',compact('empresa'));
    }

    public function store(Request $request)
    {
        $tipo = TiposIngresoSalida::create(array_map('mb_strtoupper',$request->all()));
        return redirect()->route('tipos_is.edit',$tipo->id)->with('success','success');
    }

    public function edit(TiposIngresoSalida $tipo)
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'ALMACENERO')
        {
            return view('tipos_is.edit',compact('empresa','tipo'));
        }
        return view('errors.sin_permiso',compact('empresa'));
    }

    public function update(Request $request, TiposIngresoSalida $tipo)
    {
        $tipo->update(array_map('mb_strtoupper',$request->except('logo_p')));
        return redirect()->route('tipos_is.edit',$tipo->id)->with('success','success');
    }

    public function show(TiposIngresoSalida $tipo)
    {

    }

    public function destroy(TiposIngresoSalida $tipo)
    {
        $existe_uso = Ingreso::where('tipo_nom','=',$tipo->nom)->get();
        if(count($existe_uso) == 0)
        {
            $existe_uso = Salida::where('tipo_nom','=',$tipo->nom)->get();
            if(count($existe_uso) == 0)
            {
                $tipo->delete();
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
        else{
            return response()->JSON([
                'msg' => 'NO',
            ]);
        }
    }
}
