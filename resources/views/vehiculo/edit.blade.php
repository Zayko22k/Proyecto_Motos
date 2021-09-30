@extends('layouts.app')
@extends('menu.adminMenu')
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> Ah ocurrido un problema<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="row">
    <div class="col-lg-4">
        <h3>Edición de moto #{{ $datoVehiculo->idvehiculo }}</h3>
    </div>
</div>
<hr>
<form action="{{ route('vehiculo.update',$datoVehiculo->idvehiculo) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <div class="group">
                <label>Marca</label>
                <div class="select">
                    <select name="marca_idmarca" id="standard-select">
                        @foreach ($datoMarca as $datosMarca)
                        <option value="{{ $datosMarca->idmarca }}"
                            {{ ( $datosMarca->idmarca == $datoVehiculo->marca_idmarca) ? 'selected' : '' }}>
                            {{ $datosMarca->nombre }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <div class="group">
                <input type="text" name="modelo" value="{{ $datoVehiculo->modelo }}" placeholder="Modelo">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Modelo</label>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <div class="group">
                <input type="text" name="motor" value="{{ $datoVehiculo->motor }}" placeholder="Motor">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Motor</label>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <div class="group">
                <input type="number" name="anio" value="{{ $datoVehiculo->anio }}" placeholder="Año">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Año</label>
            </div>
        </div>
    </div>
    <div class="col-xs-5 col-sm-5 col-md-4">
        <div class="form-group">
            <div class="group">
                <input type="file" name="imagen" class="form-control">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Imagen</label>
            </div>

        </div>
    </div>
    <div class="col-xs-5 col-sm-5 col-md-5">
        <div class="form-group">
            <div class="group">
                <a class="btn btn-danger b" href="{{ route('vehiculo.adminVehiculo') }}">Volver</a>
                <button type="submit" class="btn btn-warning">Guardar</button>
            </div>
        </div>
    </div>
</form>
@endsection
