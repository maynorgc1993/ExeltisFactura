<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControladorClientes extends Controller
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
    public function creacion_clientes()
    {
        return view('clientes.creacion_clientes');
    }
    public function formCreacionCliente(Request $request)
    {
        //dd($request->all());
        $nombre = $request->input('nombreCliente');
        $apellido = $request->input('apellidoCliente');
        $direccion = $request->input('direccionCliente');
        $correo = $request->input('correo');
        $tel = $request->input('tel');
        $nit = $request->input('nit');

        DB::table('Cliente')->insert([
            'nombre' => $nombre,
            'apellido' => $apellido,
            'direccion'=>$direccion,
            'correo'=>$correo,
            'telefono'=>$tel,
            'nit'=>$nit
         ]);

         return redirect()->back()->with('message', 'Cliente Creado Correctamente');

    }
    public function lista_clientes()
    {

        $data['clientes'] = DB::select('select * from Cliente');
         return view('clientes.lista_clientes', $data);



    }
}
