@extends('layouts.main')

@section('titulo', 'Venta')

@section('content')
    @if($mensaje = Session::get('exito'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $mensaje }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="my-3">
        <table class="table table-hover" >
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Valor unitario</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <form action="{{ route('products.store') }}" method="post" class="needs-validation" novalidate>
                    @csrf
                    <td class="col-3">  
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="producto" name="producto" placeholder="Producto">
                            <label for="producto">Producto</label>
                        </div>
                    </td>
                    <td class="col-3">
                        <div class="form-floating mb-2">
                            <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad">
                            <label for="cantidad">Cantidad</label>
                        </div>
                    </td>
                    <td class="col-3">  
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="precio_unitario" name="precio_unitario" placeholder="Precio" disabled>
                            <label for="precio_unitario">Precio</label>
                        </div>
                    </td>
                    <td class="col-3">  
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="subtotal" name="subtotal" placeholder="Subtotal" disabled>
                            <li>
                                <a class="dropdown-item rounded mb-2" href="{{ route('ventas.index') }}">Ventas</a>
                            </li>    <label for="subtotal">Subtotal</label>
                        </div>
                    </td>
                </form>
                @foreach ($ventas as $item)
                    
                @endforeach
                {{-- @foreach (products as $item)
                    
                @endforeach
                    <td>{{ $item->precio}}</td> --}}
            </tbody>
        </table>
        <button type="submit" class="btn btn-secondary">Guardar</button>
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