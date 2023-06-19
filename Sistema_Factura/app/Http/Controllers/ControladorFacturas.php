<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControladorFacturas extends Controller
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
    public function nuevaFactura()
    {
        $data['clientes'] = DB::select('select * from Cliente');
        $data['productos'] = DB::select('select * from Producto');

        return view('facturas.nuevaFactura', $data);

    }
    public function formNuevaFactura(Request $request){
        $idCliente = $request->input('selectCliente');
        $total = $request->input('total');
        $productos = $request->input('selectProducto');
        $tamano = count($productos);
        $total = (float) $total;
        $total = number_format($total, 2);
        // echo $total;
        // dd($request->all());

        $idFactura = time();
        DB::table('Factura')->insert([
               'idCliente'=>$idCliente,
               'idTipo_Pago'=>1,
               'total'=>$total
        ]);
        for($i=1; $i <= $tamano;$i++){
            DB::table('Factura_Producto')->insert([
                'idFactura' => $idFactura,
                'noFactura' => $idFactura,
                'idProducto' => $productos[$i],
                'cantidad_producto'=>$cantidad[$i],
                'subtotal_producto'=>$subProducto[$i]
         ]);
        }
          return redirect()->back()->with('message', 'Factura Creada Correctamente');

    }
    
    // public function formCreacionCliente(Request $request)
    // {
    //     //dd($request->all());
    //     $nombre = $request->input('nombreCliente');
    //     $apellido = $request->input('apellidoCliente');
    //     $direccion = $request->input('direccionCliente');
    //     $correo = $request->input('correo');
    //     $tel = $request->input('tel');
    //     $nit = $request->input('nit');

    //     DB::table('Cliente')->insert([
    //         'nombre' => $nombre,
    //         'apellido' => $apellido,
    //         'direccion'=>$direccion,
    //         'correo'=>$correo,
    //         'telefono'=>$tel,
    //         'nit'=>$nit
    //      ]);

    //      return redirect()->back()->with('message', 'Cliente Creado Correctamente');

    // }
    // public function lista_clientes()
    // {

    //     $data['clientes'] = DB::select('select * from Cliente');
    //      return view('clientes.lista_clientes', $data);



    // }
}
