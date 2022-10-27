@extends('layouts.main')

@section('titulo', 'Categorias')

@section('content')
@if($mensaje = Session::get('exito'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <p>{{ $mensaje }}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    <div class="row mt-5">
        <div class="col-3 ">
            <div class="card">
                <img src="{{ asset('images/tornilleria.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Tornilleria</h5>
                    <a href="#" class="btn btn-primary">Ver</a>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <img src="{{ asset('images/herramientas.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Herramientas</h5>
                    <a href="#" class="btn btn-primary">Ver</a>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <img src="{{ asset('images/electricos.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Electricos</h5>
                    <a href="#" class="btn btn-primary">Ver</a>
                </div>
            </div>
        </div>
        <div class="col-3 ">
            <div class="card">
                <img src="{{ asset('images/cortineros.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-text">Cortineros</h5>
                    <a href="#" class="btn btn-primary">Ver</a>
                </div>
            </div>
        </div>
    </div>        

@endsection
@section('scripts')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
<!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<script>
    $('.form-delete').submit(function(e){
        e.preventDefault();
        //Lanzar alerta de Sweetalert
        Swal.fire({
            title: '¿Esta seguro de eliminar?',
            text: "Esta acción no se podrá deshacer!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0d6efd',
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'Si, eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })
    });
</script>

@endsection