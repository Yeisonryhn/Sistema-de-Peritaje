<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Muestra el listado de usuarios
        $users=Usuario::all();
        //dd($users);
        return view('users.listado', 
        [
            'titulo' => 'Listado de Usuarios',
            'usuarios' =>$users
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Registro de usuario formulario
        return view('users.registro',
        [
            'titulo' => 'Crear Usuario'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(/*Request $request*/)
    {
        //Ruta post para guardar el usuario en la base de datos

        //validaciones que debe tener la data
        $data = request()->validate([
            'login' => ['unique:usuarios,login', 'required'],
            'nombre' => 'required',
            'clave' => [ 'required', 'min:6' , 'max:40']

        ]);
        //fin validaciones

        //dd($data);
        Usuario::create
        ([
            'login' => $data['login'],
            'nombre' => $data['nombre'],
            'clave' => bcrypt($data['clave'])
        ]);
        return redirect()->route('listaDeUsuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //Muestra el detalle de un usuario en concreto
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
