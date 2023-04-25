<?php

namespace ivorfid\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use ivorfid\Proveedor;
use ivorfid\Empresa;
class ProveedorController extends Controller
{
    public function index(Request $request)
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'ALMACENERO')
        {
            $proveedores = Proveedor::lista();
            if($request->ajax())
            {
                return response()->JSON(view('proveedores.parcial.lista',compact('proveedores'))->render());
            }   
            return view('proveedores.index',compact('empresa','proveedores'));
        }
        return view('errors.sin_permiso',compact('empresa'));
    }

    public function create()
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'ALMACENERO')
        {
            return view('proveedores.create',compact('empresa'));
        }
        return view('errors.sin_permiso',compact('empresa'));
    }

    public function store(Request $request)
    {
        $proveedor = new Proveedor(array_map('mb_strtoupper',$request->except('logo_p')));
        //SUBIR LOGO
        $logo = $request->file('logo_p');
        $extension = ".".$logo->getClientOriginalExtension();
        $nom_logo = str_replace(' ','_',$proveedor->razon_social_p).time().$extension;
        $logo->move(public_path()."/imgs/proveedores/",$nom_logo);
        // ASIGNAR LOGO
        $proveedor->logo_p = $nom_logo;
        $proveedor->fecha_reg_p = date('Y-m-d');
        $proveedor->user_id = Auth::user()->id;
        $proveedor->status = 1;
        $proveedor->save();
        return redirect()->route('proveedores.edit',$proveedor->id)->with('success','success');
    }

    public function edit(Proveedor $proveedor)
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'ALMACENERO')
        {
            return view('proveedores.edit',compact('empresa','proveedor'));
        }
        return view('errors.sin_permiso',compact('empresa'));
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        $proveedor->update(array_map('mb_strtoupper',$request->except('logo_p')));
        if($request->hasFile('logo_p'))
        {
            $logo_antiguo = $proveedor->logo_p;
            \File::delete(public_path()."/imgs/proveedores/".$logo_antiguo);
            //SUBIR LOGO
            $logo = $request->file('logo_p');
            $extension = ".".$logo->getClientOriginalExtension();
            $nom_logo = str_replace(' ','_',$proveedor->razon_social_p).time().$extension;
            $logo->move(public_path()."/imgs/proveedores/",$nom_logo);
            // ASIGNAR LOGO
            $proveedor->logo_p = $nom_logo;
            $proveedor->save();
        }
        return redirect()->route('proveedores.edit',$proveedor->id)->with('success','success');
    }

    public function show(Proveedor $proveedor)
    {

    }

    public function destroy(Proveedor $proveedor)
    {
        $proveedor->status = 0;
        $proveedor->save();
        return response()->JSON([
            'msg' => 'success',
        ]);
    }
}
