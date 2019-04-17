<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
            'clave' => [ 'required', 'min:6' , 'max:40'],
            'nombre' =>[ 'required' ],

        ]);
        //fin validaciones

        //dd($data);
        Usuario::create
        ([
            'login' => $data['login'],
            'clave' => bcrypt($data['clave']),
            'nombre' => $data['nombre'],
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
        return view('users.detalle', ['titulo' => 'Detalle', 'usuario' => $usuario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //dd($usuario);
        return view('users.edicion',[
            'titulo' => 'Edicion de Usuarios',
            'usuario' => $usuario
        ]);
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
        $data = request()->validate([
            'login' => ['required', Rule::unique('usuarios')->ignore($usuario->id)],
            'clave' => '' ,
            'nombre' =>[ 'required' ],
        ]);
        //dd($data);
        if($data['clave'] != null){
            $data['clave'] = bcrypt($data['clave']);
        }else{
            unset($data['clave']);
        }

        $usuario->update($data);
        //dd($usuario);

        return redirect()->route('detalleUsuario', [ 'usuario' => $usuario ]);

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
