@extends('layout')
@section('titulo',$titulo)

@section('contenido')
	<h1>Realizar inspeccion del auto, ingrese los datos.</h1><br>
	@if($errors->any())
		<h2>por favor corrija los siguientes errores</h2>
	@endif
	<form action={{ url('storeInspection') }} method="post"	 accept-charset="utf-8" class="formularios">
		{{ csrf_field() }}

		@if($errors->has('placa'))
			<p>{{$errors->first('placa')}}</p>
		@endif
		<label for="placa">Placa</label>
		<input type="text" name="placa" placeholder="placa" min="8" max="10" value="{{ old('placa')}}">	<br><br>

		@if($errors->has('cedula'))
			<p>{{$errors->first('cedula')}}</p>
		@endif
		<label for="cedula">Cedula del Propietario</label>
		<input type="string" name="cedula" max="10" placeholder="Cedula" value="{{old('cedula')}}"><br><br>

		@if($errors->has('marca'))
			<p>{{$errors->first('marca')}}</p>
		@endif
		<label for="marca">Marca*</label>
		<input type="text" name="marca" placeholder="Marca" value="{{old('marca')}}"><br><br>

		@if($errors->has('modelo'))
			<p>{{$errors->first('modelo')}}</p>
		@endif
		<label for="modelo">Modelo</label>
		<input type="text" name="modelo" placeholder="Modelo" value="{{old('modelo')}}"><br><br>

		@if($errors->has('anio'))
			<p>{{$errors->first('anio')}}</p>
		@endif
		<label for="anio">Año</label>
		<input type="number" name="anio" placeholder="Año de fabricacion" min="1910" max="2100" value="{{old('anio')}}"><br><br>

		@if($errors->has('estado_carro'))
			<p>{{$errors->first('estado_carro')}}</p>
		@endif
		<label for="estado_carro">Estado del Auto</label>
		<input type="text" name="estado_carro" placeholder="descripcion del estado del auto" value="{{old('estado_carro')}}"><br><br>

		<input type="submit" name="enviar" value="Realizar">
	</form>
@endsection