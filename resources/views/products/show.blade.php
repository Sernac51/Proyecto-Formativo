@extends('layouts.main')

@section('titulo', 'Detalle del producto')

@section('content')
    <div class="row my-3">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <table class="table table-bordered mt-3">
                <tbody>
                    <tr>
                        <td class="fw-bold">Nombre</td>
                        <td>{{ $products->nombre}}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Precio Venta</td>
                        <td>{{ $products->precio}}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Cantidad</td>
                        <td>{{ $products->Cantidad}}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Categoria</td>
                        <td>{{ $products->categorias}}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Precio Abastecimiento</td>
                        <td>{{ $products->valor}}</td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Volver</a>
            <a href="{{ route('abastecimiento.index') }}" class="btn btn-warning" id="abastecimiento">Abastecer</a>
        </div>

    </div>

@endsection