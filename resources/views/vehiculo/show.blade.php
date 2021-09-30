@extends('layouts.app')
@extends('menu.adminMenu')
@section('content')

<div class="row">
    <div class="col-lg-4">
    <h3>Moto</h3>
    <hr>
        <div class="desc">
            <h3>Marca</h3>
            <i> {{ $datosVehiculo->nombre }}</i>
            <hr>
            <h3 >Modelo</h3>
            <i> {{ $datosVehiculo->nombre }}</i>
            <hr>
            <h3>Motor</h3>
            <i> {{ $datosVehiculo->motor }}</i>
            <hr>
            <h3>Año</h3>
            <i> {{ $datosVehiculo->anio }}</i>
            <hr>
            <h3>Fecha Registro</h3>
            <i> {{ $datosVehiculo->created_at }}</i>
            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-warning" href="{{ route('vehiculo.adminVehiculo') }}">Volver</a>
            </div>
        </div>
    </div>
    </div>
    <div class="vertical-line"></div> 
    <div class="col-lg-7 pt-4">
        <div class="col-lg-5">
            <h3>Imagen Referencial</h3>
        </div>
        <img id="img-ref" class="detail-view" src="/image/{{ $datosVehiculo->imagen }}" title="{{ $datosVehiculo->imagen}}" width="680">
    </div>
</div>

@endsection
