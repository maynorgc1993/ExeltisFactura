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
                    <form action="/formCreacionProducto" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="nombreProducto" class="form-label">Nombre del Producto</label>
                            <input name="nombreProducto" type="text" class="form-control" placeholder="Nombre del Producto" required>
                        </div>
                        <div class="col">
                            <label for="precioProducto" class="form-label">Precio del Producto</label>
                            <input name="precioProducto" type="text" class="form-control" placeholder="100.00" required pattern="^[0-9]+\.?[0-9]{0,2}$">
                        </div>
                        <div class="col">
                            <label for="descripcion" class="form-label">Stock del Producto</label>
                            <input name="stockProducto" type="number" class="form-control" placeholder="5" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" name="descripcion" rows="5" required maxlenght="500"></textarea>
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
