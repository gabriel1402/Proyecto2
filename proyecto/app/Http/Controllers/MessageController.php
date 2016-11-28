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


class MessageController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['send']]);
    }


    public function send(){
        $coreo = $request->Correo;
        $asunto = $request->Asunto;
        $mesaje = $request->Mensaje;



        if(!
            DB::table('Mensaje')->insert([ 'Nombre' => $coreo, 
                                            'email' => $asunto,
                                            'mensaje' => $mesaje])
            ){
            $error = "Error de Creacion, porfavor intertar luego";
            return view('/contact', ['Correo' => $coreo, 
                                            'Asunto' => $asunto,
                                            'Mensaje' => $mesaje,
                                            'errorMessage' => $error]);
        };

        Mail::send('emails.reminder', ['user' => 1], function ($mesaje) {
            $message->from($coreo, 'Contact - Bienes de Costa Rica');

            $message->to('alruiz300795@gmail.com')->cc('gabriel.r1402@gmail.com')->subject($asunto);
        });

        return view('welcome');
    }
}
