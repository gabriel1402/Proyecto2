<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;
USE DB;

class UsuariosController extends Controller
{   


    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','create','edit','update','logout']]);
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
            return view('/usuario/index', ['usuario' => $usuario, 
                                            'correo1' => $correo1,
                                            'correo2' => $correo2,
                                            'contra1' => $contra1,
                                            'contra2' => $contra2,
                                            'tel' => $tel,
                                            'errorMessage' => $error]);
            
        };
        if($contra1!=$contra2){
            $error = "Constraseñas Diferentes";
            return view('/usuario/index', ['usuario' => $usuario, 
                                            'correo1' => $correo1,
                                            'correo2' => $correo2,
                                            'contra1' => $contra1,
                                            'contra2' => $contra2,
                                            'tel' => $tel,
                                            'errorMessage' => $error]);
        };

        if(!
            DB::table('Users')->insert([ 'id' => $usuario, 
                                            'password' => $contra1,
                                            'CorreoElectronico' => $correo1,
                                            'Telephono' => $tel
                    ])
            ){
            $error = "Error de Creacion, porfavor intertar luego";
            return view('/usuario/index', ['usuario' => $usuario, 
                                            'correo1' => $correo1,
                                            'correo2' => $correo2,
                                            'contra1' => $contra1,
                                            'contra2' => $contra2,
                                            'tel' => $tel,
                                            'errorMessage' => $error]);
        };

        return view('welcome');
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

        $user = DB::table('Users')->get()->where('id', $id)->first();

        return view('usuario/edit' , [ 
                                            'correo1' => $user->CorreoElectronico,
                                            'correo2' => $user->CorreoElectronico,
                                            'contra1' => $user->password,
                                            'contra2' => $user->password,
                                            'tel' => $user->Telephono,
                                            'errorMessage' => ""]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
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
            return view('usuario.edit', [
                                            'correo1' => $correo1,
                                            'correo2' => $correo2,
                                            'contra1' => $contra1,
                                            'contra2' => $contra2,
                                            'tel' => $tel,
                                            'errorMessage' => $error]);
            
        };
        if($contra1!=$contra2){
            $error = "Constraseñas Diferentes";
            return view('usuario.edit', [
                                            'correo1' => $correo1,
                                            'correo2' => $correo2,
                                            'contra1' => $contra1,
                                            'contra2' => $contra2,
                                            'tel' => $tel,
                                            'errorMessage' => $error]);
        };

        if(!


           DB::table('Users')
            ->where('id', $_COOKIE['user'])
            ->update([
                'password' => $contra1,
                'CorreoElectronico' => $correo1,
                'Telephono' => $tel
                ])






            ){
            $error = "Error de actualizacion, porfavor intentar de nuevo mas tarde";
            return view('usuario.edit', [
                                            'correo1' => $correo1,
                                            'correo2' => $correo2,
                                            'contra1' => $contra1,
                                            'contra2' => $contra2,
                                            'tel' => $tel,
                                            'errorMessage' => $error]);
        };

        return view('welcome');
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

    public function logout(){
        setcookie("user", "", time() - 3600);
        echo "string";
    }
}
