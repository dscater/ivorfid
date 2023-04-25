<?php

namespace ivorfid\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use ivorfid\Descuento;
use ivorfid\Producto;
use ivorfid\Empresa;
class DescuentoController extends Controller
{
    public function index(Request $request)
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR')
        {
            $descuentos = Descuento::all();
            if($request->ajax())
            {
                return response()->JSON(view('descuentos.parcial.lista',compact('descuentos'))->render());
            }   
            return view('descuentos.index',compact('empresa','descuentos'));
        }
        return view('errors.sin_permiso',compact('empresa'));
    }

    public function obtieneDescuento(Request $request)
    {   
        $descuento = Descuento::where('simbolo','=',$request->simbolo)->get()->first();
        return response()->JSON([
            'descuento' => $descuento->descuento
        ]);
    }

    public function create()
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR')
        {
            return view('descuentos.create',compact('empresa'));
        }
        return view('errors.sin_permiso',compact('empresa'));
    }

    public function store(Request $request)
    {
        $descuento = Descuento::create(array_map('mb_strtoupper',$request->all()));
        return redirect()->route('descuentos.edit',$descuento->id)->with('success','success');
    }

    public function edit(Descuento $descuento)
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR')
        {
            return view('descuentos.edit',compact('empresa','descuento'));
        }
        return view('errors.sin_permiso',compact('empresa'));
    }

    public function update(Request $request, Descuento $descuento)
    {
        $descuento->update(array_map('mb_strtoupper',$request->except('logo_p')));
        return redirect()->route('descuentos.edit',$descuento->id)->with('success','success');
    }

    public function show(Descuento $descuento)
    {

    }

    public function destroy(Descuento $descuento)
    {
        $existe_uso = Producto::where('descuento','=',$descuento->nom)->get();
        if(count($existe_uso) == 0)
        {
            $descuento->delete();
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
