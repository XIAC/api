<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    //
    public function registro(Request $request){
        $json = $request->input('json',null);
        $params = json_decode($json);
        $correo = (!is_null($json) && isset($params->email)) ? $params->email : null;
        $nombre = (!is_null($json) && isset($params->name)) ? $params->name : null;
        $contrasena = (!is_null($json) && isset($params->password)) ? $params->password : null;
        if (!is_null($correo) && !is_null($contrasena) && !is_null($nombre)){
            $usuario = new User();
            $usuario->email = $correo;
            $usuario->name = $nombre;
            $usuario->password = $contrasena;
            if( !User::where('email', $correo)->exists()){
                //guardamos el usuario
                $usuario->save();
                $data = array(
                    'status' => 'success',
                    'code' => 200,
                    'message' => 'Usuario registrado correctamente'
                );
            } else{
                //no guardar porque ya existe
                $data = array(
                    'status' => 'error',
                    'code' => 400,
                    'message' => 'Usuario duplicado, no puede registrarlo'
                );
            }
        } else{
            $data = array(
                'status' => 'error',
                'code' => 400,
                'message' => 'Usuario no creado'
            );
        }
        return response()->json($data, 200);
    }
}
