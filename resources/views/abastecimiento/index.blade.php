@extends('layouts.main')

@section('titulo', 'Abastecimiento')

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
                    <th>Valor </th>
                </tr>
            </thead>
            <tbody>
                <form action="{{ route('abastecimiento.store') }}" method="post" class="needs-validation" novalidate>
                    @csrf
                    <td class="col-3">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="products_id" name="products_id" required>
                            <option selected >Selecione...</option>
                            @foreach($products as $item)
                                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                            @endforeach
                        </select>
                        <label for="products_id">Nombre</label>
                    </div>
                    </td>
                    <td class="col-3">
                        <div class="form-floating mb-2">
                            <input type="number" class="form-control" id="cantidad_id" name="cantidad_id" placeholder="Cantidad">
                            <label for="cantidad_id">Cantidad</label>
                        </div>
                    </td>
                    <td class="col-3">  
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="precio_unitario" name="precio_unitario" placeholder="Precio" >
                            <label for="precio_unitario">Valor</label>
                        </div>
                    </td>
                </form>
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