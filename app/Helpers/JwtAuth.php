<?php
namespace App\Helpers;
use \Firebase\JWT\JWT; 
use Illuminate\Support\Facades\DB;
use App\Models\User;
class JwtAuth {
    public $key;
    public 
    public function signup($correo, $contrasena, $getToken =null){
        $usuario = User::where(
            array(
                'email' => $email,
                'password' => $password
            ))->first();
        $signup = false;
        if(is_object($usuario)){
            $signup = true;
        }
        if ($signup){
            //generamos el token
            $token = array(
                'sub' => $usuario->id,
                'email' => $usuario->email,
                'name' => $usuario->name,
                'iat' => time(),
                'exp' => time() + (7*24*60*60),
            );
            $jwt = JWT::encode($token, $this->key, 'HS256');
            $decoded = JWT::decode($jwt, $this->key, array('HS256'));
            if (!is_null($getToken)){
                return $jwt;
            } else{
                return $decoded;
            }
        } else {
            return array('status'=>'error', 'message'=> 'Login ha fallado');
        }
    }
    public function verificarToken($jwt, $getIdentity = false){
        $auth = false;
        try {
            $decoded = JWT::decode($jwt, $this->key, array('HS256'));
        }
        catch(Exception){
            $auth = false;
        }
        if($getIdentity){
            return decoded;
        } 
        return $auth;
    }
    
}