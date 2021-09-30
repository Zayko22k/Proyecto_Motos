@extends('layouts.app')
@extends('menu.adminMenu')
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> Parece ha ocurrido un problema.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="row">
    <div class="col-lg-4">
        <h3>Ingreso de nuevo Vehiculo</h3>
    </div>
</div>
<hr>
<form action="{{ route('vehiculo.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <div class="group">
                <label>Marca</label>
                <div class="select">
                    <select name="marca_idmarca" id="standard-select">
                        @foreach ($datoMarca as $dato)
                        <option value="{{ $dato->idmarca }}">
                            <li>{{ ucfirst($dato->nombre) }}</li>
                        </option>
                        @endforeach
                    </select>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <div class="group">
                <input type="text" name="modelo" placeholder="modelo">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Modelo</label>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <div class="group">
                <input type="text" name="motor" placeholder="motor">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Motor</label>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <div class="group">
                <input type="number" name="anio" placeholder="año">
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
                <button type="submit" class="btn btn-warning">Crear</button>
            </div>
        </div>
    </div>
</form>
@endsection
