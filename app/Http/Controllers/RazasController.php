<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Razas;
use App\Http\Requests\RazaRequest;

class RazasController extends Controller
{
    public function index()
    {
        //$lista = Razas::lists('nombre','id');
        $lista = \DB::table("razas")->pluck("nombre","id")->all();        
        $razas = Razas::orderBy('id','DESC')->paginate(5);

        // return view('razas.index', [compact('razas'), compact('lista')]);
        return view('razas.index')->with(compact('razas','lista') );
    }

    public function store(RazaRequest $request)
    {
        //var_dump($request);
        
        $raza = new Razas;
        
        $raza->nombre = $request->nombre;
        $raza->descripcion = $request->descripcion;
        $raza->idusuario = $request->idusuario;
        
        $raza->save();
        return redirect()->route('razas.index')->with('info', 'Raza guardada');
        
    }
    
    public function update(RazaRequest $request, $id)
    {
        $raza = Razas::find($id);
        
        $raza->nombre = $request->nombre;
        $raza->descripcion = $request->descripcion;
        $raza->idusuario = $request->idusuario;
        
        $raza->save();
        return redirect()->route('razas.index')->with('info', 'Raza actualizada - id.'.$id);
    }
    
    public function create()
    {
        return view('razas.create');
    }
    
    public function edit($id)
    {
        $raza = Razas::find($id);
        return view('razas.edit',  compact('raza'));
    }
    
    public function show($id)
    {
        $raza = Razas::find($id);
        //dd($raza->name);
        return view('razas.show',  compact('raza'));
    }
    
    public function destroy($id)
    {
        $raza = Razas::find($id);
        $raza->delete();
        //dd($raza->name);
        return back()->with('info', 'Raza eliminada .'.$id);
        //return back();
    }
}
