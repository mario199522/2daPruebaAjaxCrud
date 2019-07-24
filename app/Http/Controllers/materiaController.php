<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia;

class materiaController extends Controller
{
    public function ventana()
	{
		$consulta = Materia::all();
		return view('adminlte::materia_ingreso')->with('datos',$consulta);
	}
	public function guardar(Request $request){
	    if($request->ajax()){
	    $materia = new Materia();
	    
	    $materia->descripcion = $request->descripcion;
	   

	    $materia->save();
	    return response()->json(['mensaje'=> 'Datos Correctos']);
		}
	    
	}
	public function listar(){
	    $consulta = Materia::all();
	    return view('adminlte::materia_listar')->with('datos',$consulta);
	}
	public function eliminar($id)
	{
		$consulta = Materia::findOrFail($id);

		$consulta->delete();

		$consulta = Materia::all();
	    return view('adminlte::materia_listar')->with('datos',$consulta);
	}
	public function editar($id)
	{
		$consulta = Materia::findOrFail($id);

		 return view('adminlte::materia_modificar')->with('datos',$consulta);

	}
	public function modificar(Request $request, $id)
	{
		$consulta = Materia::findOrFail($id);

		$consulta->descripcion = $request->descripcion;

		$consulta->save();
		return redirect('materia/eliminar_modificar');
	}
}
