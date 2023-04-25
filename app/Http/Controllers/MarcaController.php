<?php

namespace ivorfid\Http\Controllers;

use Illuminate\Http\Request;
use ivorfid\Http\Requests\MarcaStoreRequest;
use ivorfid\Http\Requests\MarcaUpdateRequest;
use Illuminate\Support\Facades\Auth;

use ivorfid\Marca;
use ivorfid\Producto;
use ivorfid\Empresa;
class MarcaController extends Controller
{
    public function index(Request $request)
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'ALMACENERO')
        {
            $marcas = Marca::all();
            if($request->ajax())
            {
                return response()->JSON(view('marcas.parcial.lista',compact('marcas'))->render());
            }   
            return view('marcas.index',compact('empresa','marcas'));
        }
        return view('errors.sin_permiso',compact('empresa'));
    }

    public function create()
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'ALMACENERO')
        {
            return view('marcas.create',compact('empresa'));
        }
        return view('errors.sin_permiso',compact('empresa'));
    }

    public function store(MarcaStoreRequest $request)
    {
        $marca = Marca::create(array_map('mb_strtoupper',$request->all()));
        return redirect()->route('marcas.edit',$marca->id)->with('success','success');
    }

    public function edit(Marca $marca)
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'ALMACENERO')
        {
            return view('marcas.edit',compact('empresa','marca'));
        }
        return view('errors.sin_permiso',compact('empresa'));
    }

    public function update(MarcaUpdateRequest $request, Marca $marca)
    {
        $marca->update(array_map('mb_strtoupper',$request->all()));
        return redirect()->route('marcas.edit',$marca->id)->with('success','success');
    }

    public function show(Marca $marca)
    {

    }

    public function destroy(Marca $marca)
    {
        $existe_uso = Producto::where('marca','=',$marca->nom)->get();
        if(count($existe_uso) == 0)
        {
            $marca->delete();
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
