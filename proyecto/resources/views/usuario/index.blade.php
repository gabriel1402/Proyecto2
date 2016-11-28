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

           <label for="Sexo" >Sexo</label>
           <select name="Sexo" class="form-control" >
            <option value="M">Maculino</option>
            <option value="F">Femenuno</option>
            </select>
            <br>

           <label for="Tipo">Tipo</label>
           <select name="Tipo" class="form-control">
            <option value="Detallista">Detallista</option>
            <option value="Mayoreo">Mayoreo</option>
            </select>
            <br>

            <label for="Descuento">Descuento</label>
           <input class="form-control" id="Descuento" name="Descuento" type="text">           
           <br>

           <input type="submit" class="btn btn-success">
       </form>
@stop