@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Asignatura</div>

					<div class="panel-body">
						<table class="table table-striped">
                        <thead> 
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Asignatura</th>
                                <th scope="col">Modificar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($datos as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->descripcion}}</td>
                                <td>
                                    <a href="{{url('materia_editar', $item->id)}}" type="button" class="btn btn-block btn-success">Modificar</a></td>
                                <td>

                                    <form method="post" action="{{route('materia_eliminar',$item->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <!-- <input type="hidden" name="_mothod" value="delete"> -->
                                        <button onclick='swal("Materia Eliminada correctamente!", "Click en OK", "success")' type="submit" class="btn btn-block btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection