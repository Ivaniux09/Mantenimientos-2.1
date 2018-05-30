<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Manten;
use App\tipoequipo;
use DB;

class MantenController extends Controller
{
   
public function index()
{
$mante = tipoequipo::all();
$mantenimientos = Manten::join('tipoequipos','mantens.pc_id','=','tipoequipos.id')
						->select('tipoequipos.Nombre','mantens.*')
						->get();



return view ('mantenpc.index', compact('mantenimientos','tipoequipo'));
}

public function create()
{
	$proactivos = Manten::all();

    $tipopc = tipoequipo::all();
   // dd($tipopc); para ver si jala datos de database
    
    return view ('mantenpc.create', compact('proactivos', 'tipopc'));
}

public function store(Request $request)
{
//campo a validar
     //$this->validate($request, ['fecha_manten' => 'required']);
	 $this->validate($request, ['fecha_manten' => 'required'],
	 	['fecha_manten.required' => '*Por favor ingrese el tipo de equipo.'
	 	]);



	$proactivos = new Manten();
	$proactivos->t_equipo = $request->t_equipo;
	
	$proactivos->marca = $request->marca;
	$proactivos->modelo = $request->modelo;
	$proactivos->n_serie = $request->n_serie;
	$proactivos->pc_id = $request->pc_id;
	$proactivos->fecha_manten = Carbon::parse ($request->fecha_manten);


	$proactivos->save();
	// Mensaje de guardado correctamente
	return redirect('Mantenimiento')->with ('flash', 'Tipo de mantenimiento registrado correctamente');



}

public function edit(Manten $manten)
{
	return view ('mantenpc.edit', compact ('manten'));
}

public function update (Manten $manten, Request $request)
{
$manten->t_equipo = $request->t_equipo;
	$manten->marca = $request->marca;
	$manten->modelo = $request->modelo;
	$manten->n_serie = $request->n_serie;
	$manten->fecha_manten = Carbon::parse ($request->fecha_manten);


	$manten->save();
	// Mensaje de guardado correctamente
	return redirect('Mantenimiento')->with ('flash', 'Tipo de mantenimiento editado correctamente');
}


public function destroy (Manten $manten)
{
	$manten->delete();
	return redirect()->route('Mantenimiento');
}


}
