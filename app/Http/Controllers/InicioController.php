<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('inicio.inicio',[
            'titulo'=>'Inicio'
        ]);
    }

    public function menu(Request $request)
    {   
        $usuario=request()->all();
        //dd($usuario);
        return view('inicio.menu',[
            'titulo'=>'Menu Principal',
            /*'usuario'=>$usuario['login']*/
        ]);
    }
}
