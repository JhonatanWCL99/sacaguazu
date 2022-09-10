<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteCreateRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(){
        $clientes = Cliente::paginate(10);
        return view('clientes.index',compact('clientes'));
    }
    public function create(){
        return view('clientes.create');
    }

    public function store(ClienteCreateRequest $request){
        $cliente = new Cliente();
        $cliente->nombre = $request->nombre." ".$request->apellido;
        $cliente->correo = $request->correo;
        $cliente->direccion = $request->direccion;
        $cliente->telefono = $request->telefono;
        $cliente->save();

        return redirect()->route('clientes.index');
    }

    public function show($id){
        $cliente =Cliente::find($id);
        return view('clientes.show',compact('cliente'));
    }

    public function edit($id){
        $cliente =Cliente::find($id);
        return view('clientes.edit',compact('cliente'));
    }

    public function update(Request $request,$id){
        $cliente = Cliente::find($id);
        $cliente->nombre = $request->nombre." ".$request->apellido;
        $cliente->correo = $request->correo;
        $cliente->direccion = $request->direccion;
        $cliente->telefono = $request->telefono;
        $cliente->save();
        return redirect()->route('clientes.index');

    }


    public function destroy($id){
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}
