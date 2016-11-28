@extends('layouts.master')

@section('title')
Bienes raíces
@stop

@section('userBarMenu')
    <?php
        if(!isset($_COOKIE['user'])) {
            echo '<li><a href="/usuario"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
            echo '<li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
        } else {
            echo '<li><a href="/usuario/'.$_COOKIE['user'].'/edit"><span class="glyphicon glyphicon-user"></span>  '.$_COOKIE['user'].'</a></li>';
        };
    ?>    
@stop

@section('menu')
    <li><a href="/">Inicio</a></li>
    <li><a href="#">Buscar</a></li>
    <li><a href="#">Contactanos</a></li>
@stop

@section('content')
	<form action="{{url('usuario/update')}}" method="POST">
		   	<input type="hidden" name="_token" value="{{ csrf_token() }}">
           	<h3 class="center">Edit Profile</h3>       
           	<br>

           	<label for="Correo">Correo Electronico</label>
           	<input class="form-control" id="Correo" maxlength="30" name="Correo" type="email" placeholder="Correo Electronico" 
           	value="@if( ! empty($correo1)){{$correo1}}@endif" required>          
           	<br>
           	<input class="form-control" id="Correo2" maxlength="30" name="Correo2" type="email" placeholder="Reingresa el Correo Electronico" 
           	value="@if( ! empty($correo2)){{$correo2}}@endif" required>           
           	<br>

           	
           	<label for="Contra">Constraseña</label>
           	<input class="form-control" id="Contra" maxlength="20" name="Contra" type="password" placeholder="Constraseña" 
           	value="@if( ! empty($contra1)){{$contra1}}@endif" required>           
           	<br>
           	<input class="form-control" id="Contra2" maxlength="20" name="Contra2" type="password" placeholder="Reingresar Constraseña" 
           	value="@if( ! empty($contra2)){{$contra2}}@endif" required>
           	<br>

            <label for="Telephono">Telephono</label>
           	<input class="form-control" id="Telephono" maxlength="8" name="Telephono" type="text" placeholder="88888888" 
           	value="@if( ! empty($tel)){{$tel}}@endif" required>           
           	<br>


           <input type="submit" class="btn btn-success">
       </form>
       <br><br>
       <a href="/usuario/logout" class="btn btn-danger">Log Out</a> 
       <div class="errorType">
	       	@if( ! empty($errorMessage))
    			    {{$errorMessage}}
    			@endif
       </div>
@stop