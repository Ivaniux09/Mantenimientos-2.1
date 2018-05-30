<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tipoequipo;

class tipoequipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = tipoequipo::all();
return view ('equipopc.index', compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $addequipos = tipoequipo::all();
return view ('equipopc.create', compact('addequipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['Nombre' => 'required'],
        ['t_equipo.required' => '*Por favor ingrese el tipo de equipo.'
        ]);



    $addequipos = new tipoequipo();
    $addequipos->Nombre = $request->Nombre;



    $addequipos->save();
    // Mensaje de guardado correctamente
    return redirect('Equipo')->with ('flash', 'El equipo ha sido registrado correctamente');



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
    public function edit(tipoequipo $equip)
    {
     return view ('equipopc.edit', compact ('equip'));
    }
   
    public function update( tipoequipo $equip, Request $request)
    {
    $equip->Nombre = $request->Nombre;
    $equip->save();
    // Mensaje de guardado correctamente
    return redirect('Equipo')->with ('flash', 'Tipo de equipo editado correctamente');
    }
    public function destroy (tipoequipo $equip)
    {
       $equip->delete();
    return redirect()->route('Equipo');
    }
}
