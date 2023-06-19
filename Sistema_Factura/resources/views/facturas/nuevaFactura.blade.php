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
                    <form id="formulario" action="/formNuevaFactura" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="selectCliente" class="form-label">Seleccionar Cliente</label>
                            <select id="selectCliente" class="form-select" name="selectCliente">
                                <option selected></option>
                                @foreach($clientes as $cliente)
                                <option data-nit="{{$cliente->nit}}"  value="{{$cliente->idCliente}}">{{$cliente->nombre}} {{$cliente->apellido}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="nitCliente" class="form-label">Nit del Cliente</label>
                            <input id="nitCliente" name="nitCliente" type="text" class="form-control" placeholder="NIT" required>
                        </div>
                        <div class="col">
                            <label for="total" class="form-label">Total Factura</label>
                            <input id="total" name="total" type="text" class="form-control"  required>
                        </div>
                    </div>

                    <br>
                    <div class="row">

                        <div class="col">
                            <button id="agregarProductoBtn" class="btn btn-secondary " type="button">Agregar Producto</button>
                        </div>
                        <div class="col">
                            <button id="verTotalBtn" class="btn btn-warning " type="button">Ver Total</button>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary " type="submit">ENVIAR</button>
                        </div>
                    </div> <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@prepend('scripts')
<script>
    $(document).ready(function() {
        var contador = 0; //contador producto
        $('#selectCliente').on('change', function() {
            var nit = $(this).find(':selected').data('nit');
            $('#nitCliente').val(nit);
        });
        function recalcularSubtotal(contador) {
            var precioU = parseFloat($('#precioU' + contador).val());
            var cantidad = parseInt($('#cantidad' + contador).val());
            var subtotal = precioU * cantidad;
            $('#subProducto' + contador).val(subtotal);
        }
        $('#verTotalBtn').click(function(e) {      
            var total = 0;
            $('.filaProducto').each(function() {
                var subtotal = parseFloat($(this).find('.subProducto').val());        
                    total += subtotal;
            });
                
                // Mostrar el total
                $('#total').val(total);
        });
        $('#agregarProductoBtn').click(function(e) {
            contador++;

            var newRow = $('<div class="row filaProducto">' + //agrega la fila del producto
                            '<div class="col">' +
                                '<label for="selectProducto' + contador + '" class="form-label">Producto</label>' +
                                '<select id="selectProducto' + contador + '" class="form-select" name="selectProducto[' + contador + ']">' +
                                    '<option selected></option>' +
                                    '@foreach($productos as $producto)' +
                                    '<option data-precio="{{$producto->precio}}" value="{{$producto->idProducto}}">{{$producto->nombre}}</option>' +
                                    '@endforeach' +
                                '</select>' +
                            '</div>' +
                            '<div class="col">' +
                                '<label for="precioU' + contador + '" class="form-label">Precio U.</label>' +
                                '<input id="precioU' + contador + '" name="precioU[' + contador + ']" type="text" class="form-control"  required>' +
                            '</div>' +
                            '<div class="col">' +
                                '<label for="cantidad' + contador + '" class="form-label">Cantidad</label>' +
                                '<input value="0" id="cantidad' + contador + '" name="cantidad[' + contador + ']" type="text" class="form-control"  required>' +
                            '</div>' +
                            '<div class="col">' +
                                '<label for="subProducto' + contador + '" class="form-label">Subtotal Producto</label>' +
                                '<input id="subProducto' + contador + '" name="subProducto[' + contador + ']" type="text" class="form-control subProducto"  required>' +
                            '</div>' +
                            '<div class="col">' +
                                '<br><button class="btn btn-danger eliminarBtn" type="button"><i class="bi bi-trash"></i></button>' +
                            '</div>' +
                        '</div>');
                       
                        $('#formulario').append(newRow);

                        $('#selectProducto' + contador).change(function() { //cambia el precio del producto
                        var precio = $(this).find(':selected').data('precio');
                        $('#precioU' + contador).val(precio);

                            recalcularSubtotal(contador);

                    
                        $('#cantidad' + contador).change(function() {//cambia subtotal
                            recalcularSubtotal(contador);
                        });
        });
        });
        $(document).on('click', '.eliminarBtn', function() {
            $(this).closest('.row').remove();
        });
        $(document).ready(function() {
    var contador = 0;
    
    
    
});
    });
</script>
@endprepend