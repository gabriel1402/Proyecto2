@extends('layouts.master')

@section('title')
Bienes raíces
@stop

@section('userBarMenu')
    <?php
        if(isset($_COOKIE['user'])) {
            echo '<li><a href="/usuario"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
            echo '<li class="active"><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
        } else {
            echo '<li><a href="/login/update"><span class="glyphicon glyphicon-log-in"></span>'.$_COOKIE['user'].'</a></li>';
        }
    ?>    
@stop

@section('menu')
    <li><a href="/">Inicio</a></li>
    <li><a href="#">Buscar</a></li>
    <li><a href="#">Contactanos</a></li>
@stop

@section('content')
<div class="col-md-3">
</div>
<div class="col-md-5">
	<form action="{{url('/login/auth')}}" method="POST">
		   	<input type="hidden" name="_token" value="{{ csrf_token() }}">
           	<h3 class="center">Login</h3>

           	<label for="Usuario">Usuario</label>
           	<input class="form-control" id="Usuario" maxlength="20" name="Usuario" type="text"  placeholder="Nombre de Usuario" 
           	value="@if(!empty($usuario)){{$usuario}}@endif" required>           
           	<br>
           	
           	<label for="Contra">Constraseña</label>
           	<input class="form-control" id="Contra" maxlength="20" name="Contra" type="password" placeholder="Constraseña" 
           	value="@if( ! empty($contra1)){{$contra1}}@endif" required>           
           	<br>

           <input type="submit" class="btn btn-success">
       </form>
       <div class="errorType">
	       	@if( ! empty($errorMessage))
  			    {{$errorMessage}}
  			@endif
       </div>
</div>
@stop