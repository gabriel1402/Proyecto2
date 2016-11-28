@extends('layouts.master')

@section('title')
Bienes raíces
@stop

@section('userBarMenu')
    <li class="active"><a href="/usuario"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
@stop

@section('menu')
    <li><a href="/">Inicio</a></li>
    <li><a href="#">Buscar</a></li>
    <li><a href="#">Contactanos</a></li>
@stop

@section('content')
	<form action="usuario/create" method="POST">
		   	<input type="hidden" name="_token" value="{{ csrf_token() }}">
           	<h3 class="center">Sign Up</h3>

           	<label for="Usuario">Usuario</label>
           	<input class="form-control" id="Usuario" maxlength="20" name="Usuario" type="text"  placeholder="Nombre de Usuario" 
           	value="@if( ! empty($usuario))
			    {{$usuario}}
			@endif">           
           	<br>

           	<label for="Correo">Correo Electronico</label>
           	<input class="form-control" id="Correo" maxlength="30" name="Correo" type="email" placeholder="Correo Electronico" 
           	value="@if( ! empty($correo1))
			    {{$correo1}}
			@endif">          
           	<br>
           	<input class="form-control" id="Correo2" maxlength="30" name="Correo2" type="email" placeholder="Reingresa el Correo Electronico" 
           	value="@if( ! empty($correo2))
			    {{$correo2}}
			@endif">           
           	<br>

           	
           	<label for="Contra">Constraseña</label>
           	<input class="form-control" id="Contra" maxlength="20" name="Contra" type="password" placeholder="Constraseña" 
           	value="@if( ! empty($contra1))
			    {{$contra1}}
			@endif">           
           	<br>
           	<input class="form-control" id="Contra2" maxlength="20" name="Contra2" type="password" placeholder="Reingresar Constraseña" 
           	value="@if( ! empty($contra2))
			    {{$contra2}}
			@endif">
           	<br>

            <label for="Telephono">Telephono</label>
           	<input class="form-control" id="Telephono" maxlength="8" name="Telephono" type="text" placeholder="88888888" 
           	value="@if( ! empty($tel))
			    {{$tel}}
			@endif">           
           	<br>

           <input type="submit" class="btn btn-success">
       </form>
       <div class="errorType">
	       	@if( ! empty($errorMessage))
			    {{$errorMessage}}
			@endif
       </div>
@stop