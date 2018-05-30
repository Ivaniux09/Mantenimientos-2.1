@extends ('layout')

@section ('content1')
<div class ="col-xs-12">
<div class="box">
<div class="box-header">
	<h3 class = "box-title">Equipos</h3>
	</div>

	<!-- /.box-header -->

	<div class="box-body">
		<table id="example2" class= "table table-bordered table-hover">
		<thead>
		<tr>
			<th>Nombre </th>
			
		</tr>
		</thead>
		<tbody>
			@foreach($equipos as $tipoequipo)
			<tr>
				<td>{{  $tipoequipo->Nombre }}</td>
				
	<td> <a href="{{route ('Equipo1.edit', $tipoequipo)}}" class "btn btn-xs btn-info"><i class= "fa fa-pencil"></i></a>

	<form method="POST"
	action="{{ route ('tipoequipo.destroy', $tipoequipo) }}"
	style="display: inline">
	{{ csrf_field() }} {{ method_field('DELETE') }}
	<button type="btn button" class="btn btn-xs btn-info"
	onclick="return confirm ('¿Estas seguro de querer eliminar este mantenimiento del sistema?')"
	> <i class="fa fa-remove"> </i> </button>	</form>


			<!-- <a href="" class "btn btn-xs btn-info"><i class= "fa fa-remove"></i></a> -->	</td>

			</tr>
			@endforeach

			</table>
			</div>
			</div>
			</div>
			</div>

	
		@stop