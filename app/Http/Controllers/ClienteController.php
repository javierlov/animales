<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Http\Requests\ClienteRequest;

class ClienteController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        //$this->middleware('guest')->except('logout');
    }
    
     public function index()
    {
        $clientes = Cliente::orderBy('id','DESC')->paginate(5);
        return view('clientes.index', compact('clientes'));
    }

    public function store(ClienteRequest $request)
    {
        $cliente = new Cliente;
  
        $cliente->nombre = $request->nombre;
        $cliente->descripcion = $request->descripcion;
        $cliente->direccion = $request->direccion;
        $cliente->email = $request->email;
        $cliente->sexo = $request->sexo;
        
        $cliente->save();
        return redirect()->route('clientes.index')->with('info', 'Cliente guardado');
        
    }
    
    public function update(ClienteRequest $request, $id)
    {
        $cliente = Cliente::find($id);
        
        $cliente->nombre = $request->nombre;
        $cliente->descripcion = $request->descripcion;
        $cliente->direccion = $request->direccion;
        $cliente->email = $request->email;
        $cliente->sexo = $request->sexo;
        
        $cliente->save();
        return redirect()->route('clientes.index')->with('info', 'Cliente actualizado - id.'.$id);
    }
    
    public function create()
    {
        return view('clientes.create');
    }
    
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('clientes.edit',  compact('cliente'));
    }
    
    public function show($id)
    {
        $cliente = Cliente::find($id);
        //dd($cliente->name);
        return view('clientes.show',  compact('cliente'));
    }
    
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        //dd($cliente->name);
        return back()->with('info', 'Cliente eliminado .'.$id);
        //return back();
    }
}
