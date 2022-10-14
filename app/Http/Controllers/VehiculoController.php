<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vehiculo;
class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hash = $request->header('Authorization', null);
        $jwtAuth = new JwtAuth();
        $verificarToken = $jwtAuth->verificarToken($hash);
        if ($verificarToken){
            $json = $request->input('json',null);
            $params = json_decode($json);
            //
            $usuario = $jwtAuth->verificarToken($hash, true);
            $vehiculo = new Vehiculo(); 
            $vehiculo->user_id = $usuario->sub;
            $vehiculo->titulo = $params->titulo;
            $vehiculo->descripcion = $params->descripcion;
            $vehiculo->precio = $params->precio;
            $vehiculo->estado = $params->estado;
            $vehiculo->save();
            $data = array(
                'vehiculo' => $vehiculo,
                'status' => 'success',
                'code' => 200
            );
        } else {
            $data = array(
                'status' => 'error',
                'code' => 300,
                'message' => 'Login incorrecto'
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
