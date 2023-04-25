<?php

namespace ivorfid\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use ivorfid\DatosUsuario;
use ivorfid\Empresa;
use ivorfid\User;
class DatosUsuarioController extends Controller
{
    public function index(Request $request)
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR')
        {
            $usuarios = DatosUsuario::lista();
            if($request->ajax())
            {
                return response()->JSON(view('usuarios.parcial.lista',compact('usuarios'))->render());
            }   
            return view('usuarios.index',compact('empresa','usuarios'));
        }
        return view('errors.sin_permiso',compact('empresa'));
    }

    public function create()
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR')
        {
            return view('usuarios.create',compact('empresa'));
        }
        return view('errors.sin_permiso',compact('empresa'));
    }

    public function store(Request $request)
    {
        $ultimo_codigo = User::get()->last()->name;
        $codigo = '';
        if($ultimo_codigo != 'admin')
        {
            $codigo = (int)(substr($ultimo_codigo,1,strlen($ultimo_codigo)));
            $codigo ++;
        }
        else{
            $codigo = "1001";
        }

        switch($request->tipo)
        {
            case "ADMINISTRADOR":
            $codigo = "1".$codigo;
            break;
            case "ALMACENERO":
            $codigo = "2".$codigo;
            break;
            case "CAJA":
            $codigo = "3".$codigo;
            break;
        }

        // CREANDO EL USUARIO
        $nuevo_usuario = new User();
        $nuevo_usuario->name = $codigo;
        $nuevo_usuario->password = Hash::make($request->ci);
        $nuevo_usuario->tipo = $request->tipo;
        $nuevo_usuario->foto = "user_default.png";
        $nuevo_usuario->status = 1;
        $nuevo_usuario->save();
        // CREANDO LOS DATOS DEL USUARIO
        $datosUsuario = new DatosUsuario(array_map('mb_strtoupper',$request->except('foto_u')));
        //obtener el archivo
        $file_foto = $request->file('foto_u');
        $extension = ".".$file_foto->getClientOriginalExtension();
        $nom_foto = $codigo.str_replace(' ','_',$datosUsuario->nom_u).time().$extension;
        $file_foto->move(public_path()."/imgs/personal/",$nom_foto);
        //completar los campos foto y fecha registro del personal
        $datosUsuario->foto_u = $nom_foto;
        $datosUsuario->fecha_reg = date('Y-m-d');
        $nuevo_usuario->datosUsuario()->save($datosUsuario);
        return redirect()->route('users.edit',$datosUsuario->id)->with('success','success');
    }

    public function edit(DatosUsuario $datosUsuario)
    {
        $empresa = Empresa::first();
        if(Auth::user()->tipo == 'ADMINISTRADOR')
        {
            return view('usuarios.edit',compact('empresa','datosUsuario'));
        }
        return view('errors.sin_permiso',compact('empresa'));
    }

    public function update(Request $request, DatosUsuario $datosUsuario)
    {   
        $codigo = "";
        switch($request->tipo)
        {
            case "ADMINISTRADOR":
            $codigo = "1".substr($datosUsuario->user->name,1,strlen($datosUsuario->user->name));
            break;
            case "ALMACENERO":
            $codigo = "2".substr($datosUsuario->user->name,1,strlen($datosUsuario->user->name));
            break;
            case "CAJA":
            $codigo = "3".substr($datosUsuario->user->name,1,strlen($datosUsuario->user->name));
            break;
        }

        $datosUsuario->user->tipo = $request->tipo;
        $datosUsuario->user->name = $codigo;
        $datosUsuario->user->save();

        $datosUsuario->update(array_map('mb_strtoupper',$request->except('foto_u')));
        if($request->hasFile('foto_u'))
        {
            // ELIMINAR FOTO ANTIGUA
            $foto_antigua = $datosUsuario->foto_u;
            \File::delete(public_path()."/imgs/personal/".$foto_antigua);
            // SUBIR NUEVA FOTO
            $file_foto = $request->file('foto_u');
            $extension = ".".$file_foto->getClientOriginalExtension();
            $nom_foto = $datosUsuario->user->name.str_replace(' ','_',$datosUsuario->nom_u).time().$extension;
            $file_foto->move(public_path()."/imgs/personal/",$nom_foto);
            $datosUsuario->foto_u = $nom_foto;
            $datosUsuario->save();
        }

        return redirect()->route('users.edit',$datosUsuario->id)->with('success','success');
    }

    public function show(DatosUsuario $datosUsuario)
    {

    }

    public function destroy(User $user)
    {
        $user->status = 0;
        $user->save();
        return response()->JSON([
            'msg' => 'success',
        ]);
    }

    // FUNCIONES PARA CONFIGURAR LA CUENTA DEL USUARIO
    public function config_cuenta(User $user){
        $empresa = Empresa::first();
        return view('usuarios.config',compact('empresa','user'));
    }

    public function cuenta_update(Request $request, User $user){
        if($request->oldPassword){
            if(Hash::check($request->oldPassword,$user->password)){
                if($request->newPassword == $request->password_confirm){
                    $user->password = Hash::make($request->newPassword);
                    $user->save();
                    return redirect()->route('users.config',$user->id)->with('password','exito');
                }
                else{
                    return redirect()->route('users.config',$user->id)->with('contra_error','comfirm');
                }
            }
            else{
                return redirect()->route('users.config',$user->id)->with('contra_error','old_password');
            }
        }
    }

    public function cuenta_update_foto(Request $request, User $user){
        if($request->ajax()){
            if($request->hasFile('foto')){
                $archivo_img = $request->file('foto');
                $extension = '.'.$archivo_img->getClientOriginalExtension();
                $codigo = $user->name;
                $path = public_path().'/imgs/users/'.$user->foto;
                if($user->foto != 'user_default.png')
                {
                    \File::delete($path);
                }
                // SUBIENDO FOTO AL SERVIDOR
                if($user->datosUsuario)
                {
                    $name_foto = $codigo.$user->datosUsuario->nom_u.time().$extension;//determinar el nombre de la imagen y su extesion
                }
                else{
                    $name_foto = $codigo.time().$extension;//determinar el nombre de la imagen y su extesion
                }
                $name_foto = str_replace(' ', '_', $name_foto);
                $archivo_img->move(public_path().'/imgs/users/',$name_foto);//mover el archivo a la carpeta de destino

                $user->foto = $name_foto;
                $user->save();

                return response()->JSON([
                    'msg' => 'actualizado'
                ]);
            }
        }
    }

    private function subirImgsUpdate($file_img, $nom_img, $tipo)
    {
    }
}
