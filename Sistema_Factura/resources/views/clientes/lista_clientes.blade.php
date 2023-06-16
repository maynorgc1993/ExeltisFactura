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
                <th>Nombre</th>
                <th>Correo</th>
                <th>Tel.</th>
                <th>Nit</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clientes as $cliente)
            <tr>
                <td>{{$cliente->nombre}} {{$cliente->apellido}}</td>
                <td>{{$cliente->correo}}</td>
                <td>{{$cliente->telefono}}</td>
                <td>{{$cliente->nit}}</td>
                <td>
                    <a class="btn btn-primary" href="#">Editar</a>  <a class="btn btn-danger" href="#">Eliminar</a>
                </td>

            </tr>
        @endforeach

        </tbody>
        <tfoot>
            <tr>
            <th>Nombre</th>
                <th>Correo</th>
                <th>Tel.</th>
                <th>Nit</th>
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
    $('#tablaClientes').DataTable();
    });
</script>
@endprepend

