<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BienesController extends Controller
{
    //
    public function create( Request $request)
    {
        $user = $request->propietario;
        $results = DB::table('usuario')->where('Usuario',$user)->get();
        if($results->count() == 0){
            $error = "Este propietario no está registrado como usuario";
            $request->flash();
            return redirect()->route('bienes')->with('errorMessage', $error);
        }
        else
        {
            $negociable = $request->negociable;
            if(empty($negociable)){
                $negociable = 0;
            }
            DB::table('bien')->insert([
                'Tipo' => $request->tipo,
                'Provincia' => $request->provincia,
                'Canton' => $request->canton,
                'Distrito' => $request->distrito,
                'TamanoDesde' => $request->tDesde,
                'TamanoHasta' => $request->tHasta,
                'precioDesde' => $request->pDesde,
                'precioHasta' => $request->pHasta,
                'Negosiable' => $negociable,
                'TipoDeVenta'  => $request->venta,
                'EstadoDePropiedad' => $request->estado,
                'DireccionExacta' => $request->direccion,
                'PropietarioUsuario' => $request->propietario,            
            ]);
            return back();
        }
    }
}
