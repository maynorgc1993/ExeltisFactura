@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                    <form action="/formCreacionCliente" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="nombreCliente" class="form-label">Nombre del Cliente</label>
                            <input name="nombreCliente" type="text" class="form-control" placeholder="Nombre del Producto" required>
                        </div>
                        <div class="col">
                            <label for="apellidoCliente" class="form-label">Apellido del Cliente</label>
                            <input name="apellidoCliente" type="text" class="form-control" placeholder="Nombre del Producto" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="direccionCliente" class="form-label">Direccion del Cliente</label>
                            <input name="direccionCliente" type="text" class="form-control" placeholder="Direccion del Cliente" required>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="correo" class="form-label">Correo del Cliente</label>
                            <input name="correo" type="email" class="form-control" placeholder="cliente@ejemplo.com" required>
                        </div>
                        <div class="col">
                            <label for="tel" class="form-label">Tel. del Cliente</label>
                            <input name="tel" type="text" class="form-control" placeholder="55550000" required>
                        </div>
                        <div class="col">
                            <label for="nit" class="form-label">NIT. del Cliente</label>
                            <input name="nit" type="text" class="form-control" placeholder="55550000" required>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-primary " type="submit">ENVIAR</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
