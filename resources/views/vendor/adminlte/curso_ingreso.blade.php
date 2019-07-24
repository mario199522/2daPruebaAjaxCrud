@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Semestre</div>

					<div class="panel-body">
						<div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title"></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form id="fff" role="form" method="post" action="{{url('/curso')}}">
                                @csrf
                                
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Semestre</label>
                                    <input id="descripcion" name="descripcion" type="text" class="form-control" placeholder="ingrese semestre" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Asignatura</label>
                                    
                                    <select class="combobox form-control" name="materia">
                                        <option value="" selected="selected">Seleccionar Asignatura</option>
                                        @foreach($datos1 as $item)
                                        <option value="{{$item->id}}">{{$item->descripcion}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button onclick="swal('Dato Ingresado correctamente!', 'Click en OK', 'success')" type="submit" id="enviar1" class="btn btn-success">Guardar</button>
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="box box-success">
                        <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Semestre</th>
                                <th scope="col">Asignatura</th>
                                
                            </tr>
                        </thead>
                        <tbody id="datos1">
                            @foreach($datos as $item)
                                <tr>
                                    <td>{{$item->descripcion}}</td>
                                    @foreach($datos1 as $item1)
                                        @if($item->materiaid == $item1->id)
                                            <td>{{$item1->descripcion}}</td>
                                        @endif
                                    @endforeach
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection