@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading"></div>

					<div class="panel-body">
						<div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title"></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form role="form" method="post" action="{{url('curso_actualizar',$datos->id)}}">
                                @method('PUT')
                                @csrf
                                
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Descripcion</label>
                                    <input value="{{$datos->descripcion}}" name="descripcion" type="text" class="form-control" placeholder="ingrese curso">
                                </div>
                                <div class="form-group">
                                    <label>Asignatura</label>
                                    <select class="combobox form-control" name="materia">
                                        @foreach($datos1 as $item)
                                        @if($item->id == $datos->materiaid)
                                        <option value="{{$datos->materiaid}}" selected="selected">{{$item->descripcion}}</option>
                                        @endif
                                        @endforeach
                                        @foreach($datos1 as $item)
                                        @if($item->id != $datos->materiaid)
                                        <option value="{{$item->id}}">{{$item->descripcion}}</option>
                                         @endif
                                        @endforeach
                                    </select>
                                </div>
                                <button onclick='swal("Modificación Exitosa!", "Click en OK", "success")' type="submit" id="" class="btn btn-success">Modificar</button>
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection