<?php

namespace App\Http\Controllers;

use App\Propietario;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PropietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owners=Propietario::all();

        return view('owners.listado',
        [
            'titulo' => 'Listado de Propietarios',
            'owners' => $owners,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owners.registro',
            [ 
                'titulo' => "Registro de Propietarios"
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
        $data=request()->validate(
            [  
                'nombre' => ['required', 'max:40', 'min:2'],
                'direccion' => ['required', 'max:200'],
                'telefono'=> ['required', 'max:11'],
                'email'=> ['required' ,'unique:propietarios,email' , 'email'],
                'cedula'=> ['required','min:7' , 'max:10', 'unique:propietarios,cedula']
        ]);
        //dd($data);
        Propietario::create
        ([
            'cedula' => $data['cedula'],
            'nombre' => $data['nombre'],
            'direccion' => $data['direccion'],
            'telefono' => $data['telefono'],
            'email' => $data['email'],
            

        ]);

        return redirect()->route('listaDePropietarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function show(Propietario $propietario)
    {
        return view('owners.detalle', [
            'propietario' => $propietario
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function edit(Propietario $propietario)
    {
        return view('owners.edicion', [
            'titulo' => 'Editar Propietario',
            'propietario' => $propietario
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Propietario $propietario){
        $data = request()->validate([  
                'nombre' => ['required', 'max:40', 'min:2'],
                'direccion' => ['required', 'max:200'],
                'telefono'=> ['required', 'max:11'],
                'email'=> ['required' ,'email', Rule::unique('propietarios')->ignore($propietario->id)],
                'cedula'=> ['required','min:7' , 'max:10', Rule::unique('propietarios')->ignore($propietario->id)]
        ]);

        if( $data['cedula'] == null){
            unset($data['cedula']);
        }

        $propietario->update($data);

        return redirect()->route('detallePropietario', [
            'propietario' => $propietario
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propietario $propietario)
    {
        $propietario->delete();
        return redirect()->route('listaDePropietarios');
    }
}
