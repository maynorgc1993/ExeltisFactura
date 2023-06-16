@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <table id="tablaProductos" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Accion</th>

            </tr>
        </thead>
        <tbody>
        @foreach($productos as $producto)
            <tr>
                <td>{{$producto->nombre}}</td>
                <td>{{$producto->descripcion}}</td>
                <td>Q{{$producto->precio}}</td>
                <td>{{$producto->stock}}</td>
                <td>
                    <a class="btn btn-primary" href="#">Editar</a>  <a class="btn btn-danger" href="#">Eliminar</a>
                </td>

            </tr>
        @endforeach

        </tbody>
        <tfoot>
            <tr>
                <th>Producto</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>
        </tfoot>
    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@prepend('scripts')
<script>
    $(document).ready(function () {
    $('#tablaProductos').DataTable();
    });
</script>
@endprepend

