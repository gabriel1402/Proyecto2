@extends('layouts.master')

@section('title')
Bienes raíces
@stop

@section('menu')
    <li class="active"><a href="/">Inicio</a></li>
    <li><a href="#">Buscar</a></li>
    <li><a href="#">Contactanos</a></li>
@stop


@section('userBarMenu')
    <?php
        if(isset($_COOKIE['user'])) {
            echo '<li><a href="/usuario"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
            echo '<li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
        } else {
            echo '<li><a href="/login/update"><span class="glyphicon glyphicon-log-in"></span>'.$_COOKIE['user'].'</a></li>';
        }
    ?>  
@stop

@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{ url('/bienes/create') }}">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="tipo" class="col-md-4 control-label">Tipo</label>

        <div class="col-md-6">
            <input id="tipo" type="text" class="form-control" name="tipo" value="{{old('tipo')}}" required autofocus>
        </div>
    </div>

    <div class="form-group">
        <label for="provincia" class="col-md-4 control-label">Provincia</label>

        <div class="col-md-6">
            <input id="provincia" type="text" class="form-control" name="provincia" value="{{old('provincia')}}" required>            
        </div>
    </div>

    <div class="form-group">
        <label for="canton" class="col-md-4 control-label">Cantón</label>

        <div class="col-md-6">
            <input id="canton" type="text" class="form-control" name="canton" value="{{old('canton')}}" required>            
        </div>
    </div>
    
    <div class="form-group">
        <label for="distrito" class="col-md-4 control-label">Distrito</label>

        <div class="col-md-6">
            <input id="distrito" type="text" class="form-control" name="distrito" value="{{old('distrito')}}" required>            
        </div>
    </div> 
    
    <div class="form-group">
        <label for="tDesde" class="col-md-4 control-label">Tamaño desde</label>

        <div class="col-md-2">
            <input id="tDesde" type="number" class="form-control" name="tDesde"  value="{{old('tDesde',0)}}" min="0" required>
        </div>
        
        <label for="tHasta" class="col-md-2 control-label">Tamaño hasta</label>

        <div class="col-md-2">
            <input id="tHasta" type="number" class="form-control" name="tHasta"  value="{{old('tHasta',0)}}" min="0" required>
        </div>
    </div>    
    
    <div class="form-group">
        <label for="pDesde" class="col-md-4 control-label">Precio desde</label>

        <div class="col-md-2">
            <input id="pDesde" type="number" class="form-control" name="pDesde"  value="{{old('pDesde',0)}}" min="0" required>
        </div>
        
        <label for="pHasta" class="col-md-2 control-label">Precio hasta</label>

        <div class="col-md-2">
            <input id="pHasta" type="number" class="form-control" name="pHasta"  value="{{old('pHasta',0)}}" min="0" required>
        </div>
    </div>
    
    <div class="form-group">
        <label for="negociable" class="col-md-4 control-label">Negociable</label>

        <div class="col-md-1">
            <input id="negociable" type="checkbox" class="form-control" name="negociable" value="1" @if(old('negociable')) checked @endif>
        </div>
    </div>
    
    <div class="form-group">
        <label for="venta" class="col-md-4 control-label">Tipo de venta</label>

        <div class="col-md-6">
            <input id="venta" type="text" class="form-control" name="venta" value="{{old('venta')}}" required>
        </div>
    </div>
    
    <div class="form-group">
        <label for="estado" class="col-md-4 control-label">Estado de la propiedad</label>

        <div class="col-md-6">
            <input id="estado" type="text" class="form-control" name="estado" value="{{old('estado')}}" required>
        </div>
    </div>
    
    <div class="form-group">
        <label for="direccion" class="col-md-4 control-label">Dirección exacta</label>

        <div class="col-md-6">
            <input id="direccion" type="text" class="form-control" name="direccion" value="{{old('direccion')}}" required>
        </div>
    </div>

    <div class="form-group">
        <label for="propietario" class="col-md-4 control-label">Propietario</label>

        <div class="col-md-6">
            <input id="propietario" type="text" class="form-control" name="propietario" required>
        </div>
    </div>   

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Agregar
            </button>
        </div>
    </div>
</form>
<div class="errorType">
    @if( session()->has('errorMessage'))
        {{session('errorMessage')}}
    @endif
</div>
@stop