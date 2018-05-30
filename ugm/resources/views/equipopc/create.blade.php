@extends ('layout')



@section ('content2')

<div class="col-md-4">
	<form method="POST" action="{{ route('tipoequipo.store') }}">
{{ csrf_field() }}

<!-- cadena para error -->
<div class="form-group  {{ $errors->has('Nombre') ? 'has-error' : ''}}"> 
<label>Nombre</label>
<input type="" name="Nombre" class="form-control" value=" {{ old ('Nombre') }}" placeholder="Ingresa aqui el tipo ">
<!-- {!! $errors->first('Nombre', '<span class="help-block">:message</span>') !!}
</div> -->










<div class="box_footer">
<button type="submit" class="btn btn-primary btn-block">Guardar</button>
	
</div>


</form>
</div>



@stop

@push('styles')
<!--Select 2 -->

<link rel="stylesheet" href="/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

@endpush

@push ('scripts')

<script src="/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script>
	$('#datepicker').datepicker({
		languaje: "es",
		autoclose: true,
		format: 'dd-mm-yyyy',
		todayHighlight: true
	});
</script>
@endpush
