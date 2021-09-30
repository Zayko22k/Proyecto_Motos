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
        <h3>Ingreso de nueva Marca</h3>
    </div>
</div>
<hr>
<br>
<form action="{{ route('marca.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div class="group">
                    <input type="text" name="nombre" placeholder="Nombre">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Nombre</label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-5 col-sm-5 col-md-5">
        <div class="form-group">
            <div class="group">
                <a class="btn btn-danger b" href="{{ route('marca.adminMarca') }}">Volver</a>
                <button type="submit" class="btn btn-warning">Crear</button>
            </div>
        </div>
    </div>
</form>
@endsection
