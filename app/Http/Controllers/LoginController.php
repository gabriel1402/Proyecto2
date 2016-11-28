<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;
USE DB;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','login','logout']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $usuario = $request->Usuario;
        $contra1 = $request->Contra;
        $error = "";

        try{
            $pass = DB::table('Users')->select('password')->where('id', $usuario)->first();
        }catch(Exeption $e){
            $error = "Usuario Erroneo";
        };
        if($contra1 == $pass->password){
            setcookie('user', $usuario, time() + (86400 * 30), "/");

            Auth::loginUsingId(1);
            
            return redirect('/');
        };
        $error = "Contraseña erronea";

        return view('login',['usuario' => $usuario,
                            'contra1' => $contra1,
                            'errorMessage' => $error]);
    }
    public function logout(){
        setcookie("user", "", time() - 3600);
        Auth::logout();
        return view('welcome');
    }
}
