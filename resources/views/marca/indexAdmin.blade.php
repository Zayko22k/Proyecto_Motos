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
@elseif ($mensaje = Session::get('Error'))
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
                                <h3>Gestion Marca</h3>
                            </div>
                            <div class="col-sm-9">
                                <a href="{{ route('marca.create') }}" class="btn btn-warning"><i
                                        class="material-icons">&#xE147;</i><span>Añadir Nueva Marca</span></a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Registrado el</th>
                                <th class="text-center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($datosMarca as $datoMarca)
                            <tr>
                                <td>{{ $datoMarca->idmarca }}</td>
                                <td>{{ $datoMarca->nombre }}</td>     
                                <td>{{ $datoMarca->created_at }}</td>
                                <td>
                                    <form action="{{ route('marca.destroy',$datoMarca->idmarca) }}" method="POST">

                                    <a href="{{ route('marca.show',$datoMarca->idmarca) }}" class="view"
                                        title="Ver" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                                    <a href="{{ route('marca.edit',$datoMarca->idmarca) }}" class="edit"
                                        title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                        @csrf
                                        @method('DELETE')
                                        <a onclick='this.parentNode.submit(); return false' href="{{ route('marca.destroy',$datoMarca->idmarca) }}" class="delete"
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
                        <div class="hint-text">Mostrando <b>{{ $contadorMarca }}</b> de
                            <b>{{ $contadorMarca }}</b> Entradas</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
