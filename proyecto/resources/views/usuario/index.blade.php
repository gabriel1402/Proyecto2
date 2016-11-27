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
<form action="usuario/create" method="GET">
           <h3 class="center">Sign Up</h3>

           <label for="cedula">Cedula</label>
           <input class="form-control" id="cedula" name="cedula" type="text">           
           <br>

           <label for="Nombre">Nombre</label>
           <input class="form-control" id="Nombre" name="Nombre" type="text">           
           <br>

           <label for="Apellido">Apellido</label>
           <input class="form-control" id="Apellido" name="Apellido" type="text">           
           <br>

           <label for="Nacimiento">Fecha Nacimiento (YYYY-MM-DD)</label>
           <input class="form-control" id="Nacimiento" name="Nacimiento" type="text">           
           <br>

           <label for="Direccion">Direccion</label>
           <input class="form-control" id="Direccion" name="Direccion" type="text">           
           <br>

           <label for="Estado">Estado Civil</label>
           <input class="form-control" id="Estado" name="Estado" type="text">           
           <br>

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