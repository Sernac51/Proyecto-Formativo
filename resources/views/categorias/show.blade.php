@extends('layouts.main')

@section('titulo', 'Detalle de Categoria')

@section('content')
<div class="my-3">
    <h2 class="my-3">Productos</h2>
    <ul class="list-group-flush mb-3">
        @foreach($products as $item)
            <li class="list-group-item">{{$item->nombre}}</li>
        @endforeach
    </ul>
<a href="{{ route('categorias.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection