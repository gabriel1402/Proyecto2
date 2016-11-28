<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;

class UsuariosController extends Controller
{   


    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','create']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usuario/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $usuario = $request->Usuario;
        $correo1 = $request->Correo;
        $correo2 = $request->Correo2;
        $contra1 = $request->Contra;
        $contra2 = $request->Contra2;
        $tel = $request->Telephono;
        $error = "";

        if($correo1!=$correo2){
            $error = "Constraseñas Diferentes";
            
        }else if($contra1!=$contra2){
            $error = "Constraseñas Diferentes";
        }


        return view('/usuario/index', ['usuario' => $usuario, 
                                            'correo1' => $correo1,
                                            'correo2' => $correo2,
                                            'contra1' => $contra1,
                                            'contra2' => $contra2,
                                            'tel' => $tel,
                                            'errorMessage' => $error]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
