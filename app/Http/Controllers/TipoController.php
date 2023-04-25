<?php

namespace ivorfid\Http\Controllers;

use Illuminate\Http\Request;
use ivorfid\Http\Requests\TipoUpdateRequest;
use ivorfid\Http\Requests\TipoRequest;

use Illuminate\Support\Facades\Auth;

use ivorfid\Tipo;
use ivorfid\Producto;
use ivorfid\Empresa;
class TipoController extends Controller
{
    public function index(Request $request)
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'ALMACENERO')
        {
            $tipos = Tipo::all();
            if($request->ajax())
            {
                return response()->JSON(view('tipos.parcial.lista',compact('tipos'))->render());
            }   
            return view('tipos.index',compact('empresa','tipos'));
        }
        return view('errors.sin_permiso',compact('empresa'));
    }

    public function create()
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'ALMACENERO')
        {
            return view('tipos.create',compact('empresa'));
        }
        return view('errors.sin_permiso',compact('empresa'));
    }

    public function store(TipoRequest $request)
    {
        $tipo = Tipo::create(array_map('mb_strtoupper',$request->all()));
        return redirect()->route('tipos.edit',$tipo->id)->with('success','success');
    }

    public function edit(Tipo $tipo)
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'ALMACENERO')
        {
            return view('tipos.edit',compact('empresa','tipo'));
        }
        return view('errors.sin_permiso',compact('empresa'));
    }

    public function update(TipoUpdateRequest $request, Tipo $tipo)
    {
        $tipo->update(array_map('mb_strtoupper',$request->except('logo_p')));
        return redirect()->route('tipos.edit',$tipo->id)->with('success','success');
    }

    public function show(Tipo $tipo)
    {

    }

    public function destroy(Tipo $tipo)
    {
        $existe_uso = Producto::where('tipo','=',$tipo->nom)->get();
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
}
