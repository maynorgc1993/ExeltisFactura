<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/creacion_producto', [App\Http\Controllers\ControladorProductos::class, 'creacion_producto'])->name('creacion_producto');
Route::post('/formCreacionProducto', [App\Http\Controllers\ControladorProductos::class, 'formCreacionProducto']);
Route::get('/lista_productos', [App\Http\Controllers\ControladorProductos::class, 'lista_productos'])->name('lista_productos');
Route::get('/creacion_clientes', [App\Http\Controllers\ControladorClientes::class, 'creacion_clientes'])->name('creacion_clientes');
Route::post('/formCreacionCliente', [App\Http\Controllers\ControladorClientes::class, 'formCreacionCliente']);
Route::get('/lista_clientes', [App\Http\Controllers\ControladorClientes::class, 'lista_clientes'])->name('lista_clientes');
Route::get('/nuevaFactura', [App\Http\Controllers\ControladorFacturas::class, 'nuevaFactura'])->name('nuevaFactura');
Route::post('/formNuevaFactura', [App\Http\Controllers\ControladorFacturas::class, 'formNuevaFactura']);

