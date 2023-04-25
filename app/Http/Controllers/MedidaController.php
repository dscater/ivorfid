<?php

namespace ivorfid\Http\Controllers;

use Illuminate\Http\Request;
use ivorfid\Http\Requests\MedidaUpdateRequest;
use ivorfid\Http\Requests\MedidaStoreRequest;
use Illuminate\Support\Facades\Auth;

use ivorfid\Medida;
use ivorfid\Producto;
use ivorfid\Empresa;
class MedidaController extends Controller
{
    public function index(Request $request)
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'ALMACENERO')
        {
            $medidas = Medida::all();
            if($request->ajax())
            {
                return response()->JSON(view('medidas.parcial.lista',compact('medidas'))->render());
            }   
            return view('medidas.index',compact('empresa','medidas'));
        }
        return view('errors.sin_permiso',compact('empresa'));
    }

    public function create()
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'ALMACENERO')
        {
            return view('medidas.create',compact('empresa'));
        }
        return view('errors.sin_permiso',compact('empresa'));
    }

    public function store(MedidaStoreRequest $request)
    {
        $medida = Medida::create(array_map('mb_strtoupper',$request->all()));
        return redirect()->route('medidas.edit',$medida->id)->with('success','success');
    }

    public function edit(Medida $medida)
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'ALMACENERO')
        {
            return view('medidas.edit',compact('empresa','medida'));
        }
        return view('errors.sin_permiso',compact('empresa'));
    }

    public function update(MedidaUpdateRequest $request, Medida $medida)
    {
        $medida->update(array_map('mb_strtoupper',$request->except('logo_p')));
        return redirect()->route('medidas.edit',$medida->id)->with('success','success');
    }

    public function show(Medida $medida)
    {

    }

    public function destroy(Medida $medida)
    {
        $existe_uso = Producto::where('medida','=',$medida->simbolo)->get();
        if(count($existe_uso) == 0)
        {
            $medida->delete();
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
