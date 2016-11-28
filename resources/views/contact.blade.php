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
    <li class="active"><a href="/contact">Contactanos</a></li>
@stop

@section('content')
	<form action="{{url('contact/send')}}" method="POST">
		   	<input type="hidden" name="_token" value="{{ csrf_token() }}">
           	<h3 class="center">Contactenos</h3>       
           	<br>

           	<label for="Correo">Correo Electronico</label>
           	<input class="form-control" id="Correo" maxlength="30" name="Correo" type="email" placeholder="Correo Electronico" 
           	value="@if( ! empty($Correo)){{$Correo}}@endif" required>          
           	<br>

           	
           	<label for="Asunto">Nombre Completo</label>
           	<input class="form-control" id="Asunto" maxlength="20" name="Asunto" type="text" placeholder="Tu Nombre" 
           	value="@if( ! empty($Asunto)){{$Asunto}}@endif" required>           
           	<br>

            <label for="Mensaje">Mensaje</label>
            <textarea class="form-control" rows="5" id="Mensaje" name="Mensaje" placeholder="Ecribe tu Mensaje" value="@if( ! empty($Mensaje)){{$Mensaje}}@endif" required></textarea>
           	          
           	<br>


           <input type="submit" class="btn btn-success">
       </form>
       <div class="errorType">
	       	@if( ! empty($errorMessage))
    			    {{$errorMessage}}
    			@endif
       </div>
@stop