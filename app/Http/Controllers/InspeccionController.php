<?php

namespace App\Http\Controllers;

use App\Inspeccion;
use Illuminate\Http\Request;
use App\Propietario;
class InspeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inspections = Inspeccion::all();
        return view('inspections.listado',
                    [
                        'titulo' => 'Listado de Inspecciones',
                        'inspecciones' => $inspections
                    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inspections.registro',
                    [
                        'titulo'=>'Realizar Inspeccion',
                    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validaciones que debe tener la data
        $data = request()->validate([
                'placa'=>['required', 'min:8', 'max:10'],
                'cedula'=>['required', 'exists:propietarios,cedula'],
                'marca'=>['required'],
                'modelo'=>['required'],
                'anio'=>['required','gte:1910','lte:2100'],
                'estado_carro'=>['required', 'max:200']
            ],[
                //Mensajes de error
                'placa.required'=>'Es obligatorio este campo',
                'placa.min' => 'La placa no puede tener menos de 8 caracteres',
                'placa.max' => 'La placa no puede tener mas de 10 caracteres',
                'cedula.required' => 'Es obligatorio este campo',
                'cedula.exists' => 'No existe ese propietario',
                'marca.required' => 'Es obligatorio este campo',
                'modelo.required' => 'Es obligatorio este campo',
                'anio.required' => 'Es obligatorio este campo',
                'anio.gte' => 'Año muy pequeño',
                'anio.lte' => 'Año muy grande',
                'estado_carro.required' => 'Es obligatorio este campo',
                'estado_carro.max' => 'La cadena es demasiado larga'                
            ]);//Fin de las validaciones
        //dd($data);

        $id = Propietario::where('cedula',$data['cedula'])->value('id');
        
        //dd($id);
        Inspeccion::create([
            'placa'=> $data['placa'],
            'marca'=>$data['marca'],
            'modelo'=>$data['modelo'],
            'anio'=>$data['anio'],
            'estado_carro'=>$data['estado_carro'],
            'propietario_cedula'=>$data['cedula'],
            'propietario_id'=>$id
        ]);

        return redirect()->route('principal');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inspeccion  $inspeccion
     * @return \Illuminate\Http\Response
     */
    public function show(Inspeccion $inspeccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inspeccion  $inspeccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Inspeccion $inspeccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inspeccion  $inspeccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inspeccion $inspeccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inspeccion  $inspeccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inspeccion $inspeccion)
    {
        //
    }
}
