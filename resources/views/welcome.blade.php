@extends('layouts.app')
@extends('menu.userMenu')
@section('content')
<div id="carouselMotos" class="carousel slide z-depth-1-half" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="https://wallpaperaccess.com/full/507379.jpg" alt="First slide" height="400">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="https://fondosmil.com/fondo/43759.jpg" alt="Second slide" height="400">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="https://harley-house.com/wp-content/uploads/2020/10/Harley-House-M1.jpg"
                alt="Third slide" height="400">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselMotos" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselMotos" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="container-body">
    <div class="row">
        <div class="col-lg-4">
            <h2 class="" style="color: #fff">Todo lo que importa es la carretera</h2>
            <i style="color: #fff">Pan America™ es nuestra máquina integral de dos ruedas construida para perdurar,
                diseñada
                para explorar y concebida para la aventura.
                Encuentra tu libertad sobre nuevos terrenos en 2021.</i>
        </div>
        <div class="col-lg-4">
            <img src="https://www.h-dsantiago.cl/img/home-panAmerica.jpg" width="680">
        </div>
    </div>
</div>
<p class="copyright text-center" style="color: #fff">{{config('app.name') }} © {{ now()->year }}</p>
</div>

@endsection
