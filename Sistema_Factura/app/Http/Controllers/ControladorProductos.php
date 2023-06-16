<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControladorProductos extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function creacion_producto()
    {
        return view('productos.creacion_producto');
    }
    public function formCreacionProducto(Request $request)
    {
        //dd($request->all());
        $nombreProducto = $request->input('nombreProducto');
        $precioProducto = $request->input('precioProducto');
        $stockProducto = $request->input('stockProducto');
        $descripcion = $request->input('descripcion');

        DB::table('Producto')->insert([
            'nombre' => $nombreProducto,
            'precio' => $precioProducto,
            'stock'=>$stockProducto,
            'descripcion'=>$descripcion
         ]);

         return redirect()->back()->with('message', 'Producto Creado Correctamente');

    }
    public function lista_productos()
    {

        $data['productos'] = DB::select('select * from Producto');
         return view('productos.lista_productos', $data);



    }
}
