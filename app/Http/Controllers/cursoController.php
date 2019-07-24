<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia;
use App\Curso;

class cursoController extends Controller
{
    public function ventana()
	{
		$consulta = Curso::all();
		$datos1 = Materia::all();
		return view('adminlte::curso_ingreso', compact('datos1', $datos1))->with('datos',$consulta);
	}
	public function guardar(Request $request){
		if($request->ajax()){
    	$consulta = Materia::all();

    	$curso = new Curso();
	    
	    $curso->descripcion = $request->descripcion;
	    $curso->materiaid = $request->post("materia");

	    $curso->save();
	    return response()->json(['mensaje'=> 'Datos Correctos']);
		}
	}
	public function listar(){
		$consulta = Curso::all();
		$datos1 = Materia::all();
		
	    return view('adminlte::curso_listar', compact('datos1', $datos1))->with('datos',$consulta);
	}
	public function eliminar($id)
	{
		$consulta1 = Curso::findOrFail($id);

		$consulta1->delete();
		$consulta = Curso::all();
		$datos1 = Materia::all();
		
	    return view('adminlte::curso_listar', compact('datos1', $datos1))->with('datos',$consulta);
	}
	public function editar($id)
	{
		$consulta = Curso::findOrFail($id);
		$datos1 = Materia::all();
		 return view('adminlte::curso_modificar', compact('datos1', $datos1))->with('datos',$consulta);

	}
	public function modificar(Request $request, $id)
	{
		$consulta = Curso::findOrFail($id);

		$consulta->descripcion = $request->descripcion;
		$consulta->materiaid = $request->post("materia");

		$consulta->save();
		return redirect('curso/eliminar_modificar');
	}
}
