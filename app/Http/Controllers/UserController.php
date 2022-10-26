<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\JwtAuth;
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
    public function login(Request $request){
        // echo "Accion login"; die();
        $jwtAuth = new JwtAuth();
        //Recibir POST
        $json = $request->input('json',  null);
        $params = json_decode($json);
        $email = (!is_null($json) && isset($params->email)) ? $params->email : null;
        $password = (!is_null($json) && isset($params->password)) ? $params->password : null;
        $getToken = (!is_null($json) && isset($params->gettoken)) ? $params->gettoken : true;
        //Cifrar contrasena
        // $contrasena = hash('sha256', $password);
        if (!is_null($email) && !is_null($password)) {
            //  $registrarse = $jwtAuth->signup($email, $contrasena);
            $registrarse = $jwtAuth->signup($email, $password);
            // return $registrarse;
            return response()->json($registrarse, 200);
        }

    }
}


