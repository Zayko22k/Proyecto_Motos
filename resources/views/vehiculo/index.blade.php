@extends('layouts.app')
@extends('menu.userMenu')
@section('content')
@foreach ($datosVehiculo as $datoMoto)
<div class="row">
    <div class="col-md-12">
        <h3>{{ $datoMoto->nombre }}</h3>
        <h6>{{ $datoMoto->modelo }}</h6>
    </div>
</div>
<hr>
<div class="container-2">
    <div class="moto-image">
        <img src="/image/{{ $datoMoto->imagen }}" title="{{ $datoMoto->imagen }}" alt="">
        <div class="info">
            <ul>
                <li><strong>Motor: </strong>{{ $datoMoto->motor }}</li>
                <li><strong>Año: </strong>{{ $datoMoto->anio }}</li>
            </ul>
        </div>
    </div>
</div>
<hr>
@endforeach
@endsection