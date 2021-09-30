@extends('layouts.app')
@extends('menu.adminMenu')
@section('content')

@if ($mensaje = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $mensaje }}</p>
</div>
@elseif ($mensaje = Session::get('borrado'))
<div class="alert alert-danger">
    <p>{{ $mensaje }}</p>
</div>
@elseif ($mensaje = Session::get('notFound'))
<div class="alert alert-danger">
    <p>{{ $mensaje }}</p>
</div>
@endif

<div class="row">
    <div class="col-12 pt-2">
        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-3">
                                <h3>Gestion Motos</h3>
                            </div>
                            <div class="col-sm-9">
                                <a href="{{ route('vehiculo.create') }}" class="btn btn-warning"><i
                                        class="material-icons">&#xE147;</i><span>Añadir Nueva Moto</span></a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Motor</th>
                                <th>Año</th>
                                <th>Registrado el</th>
                                <th>Imagen Referencial</th>
                                <th class="text-center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($datosVehiculo as $datoVehiculo)
                            <tr>
                                <td>{{ $datoVehiculo->idvehiculo }}</td>
                                <td>{{ $datoVehiculo->nombre }}</td>
                                <td>{{ $datoVehiculo->modelo }}</td>
                                <td>{{ $datoVehiculo->motor }}</td>
                                <td>{{ $datoVehiculo->anio }}</td>
                                <td>{{ $datoVehiculo->created_at }}</td>
                                <td><img src="/image/{{ $datoVehiculo->imagen }}" title="{{ $datoVehiculo->imagen}}"
                                        width="100px">
                                </td>
                                <td>
                                    <form action="{{ route('vehiculo.destroy',$datoVehiculo->idvehiculo) }}" method="POST">

                                    <a href="{{ route('vehiculo.show',$datoVehiculo->idvehiculo) }}" class="view"
                                        title="Ver" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                                    <a href="{{ route('vehiculo.edit',$datoVehiculo->idvehiculo) }}" class="edit"
                                        title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                        @csrf
                                        @method('DELETE')
                                        <a onclick='this.parentNode.submit(); return false' href="{{ route('vehiculo.destroy',$datoVehiculo->idvehiculo) }}" class="delete"
                                            title="Eliminar" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <div class="empty">
                                <img class="img-responsive"
                                    src="https://www.shareicon.net/data/2015/08/18/86945_warning_512x512.png" width="32"
                                    height="32">
                                <label class="text-warning">No hay registros añadidos</label>
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="clearfix">
                        <div class="hint-text">Mostrando <b>{{ $contadorVehiculo }}</b> de
                            <b>{{ $contadorVehiculo }}</b> Entradas</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
