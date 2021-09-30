@extends('layouts.app')
@extends('menu.adminMenu')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="desc">
            <hr>
            <h3>Nombre</h3>
            <i> {{ $datosMarca->nombre }}</i>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-warning" href="{{ route('marca.adminMarca') }}">Volver</a>
            </div>
        </div>
    </div>
    </div>
</div>

@endsection