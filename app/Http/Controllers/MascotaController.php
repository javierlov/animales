<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mascota;
use App\Razas;
use App\Http\Requests\MascotaRequest;

class MascotaController extends Controller
{
   public function index()
    {
        // $razas = Razas::lists('nombre','id');
               
        $mascotas = Mascota::orderBy('id','DESC')->paginate(5);
        return view('mascotas.index', compact('mascotas'));
    }
    
    public function getRaza(Request $request, $idraza){
        if($request->ajax()){
            $raza = Mascota::getRaza($idraza);
            return response()->json($raza);
        }
    }

    public function store(MascotaRequest $request)
    {
        // 'idcliente', 'idraza', 'nombre', 'descripcion', 'fechaNacimiento', 'fechaFallecimiento', 'peso'
        
        $mascota = new Mascota;
        
        $mascota->idcliente = $request->idcliente;
        $mascota->idraza = $request->idraza;
        $mascota->nombre = $request->nombre;
        $mascota->descripcion = $request->descripcion;
        $mascota->fechaNacimiento = $request->fechaNacimiento;
        $mascota->fechaFallecimiento = $request->fechaFallecimiento;
        $mascota->peso = $request->peso;
        
        $mascota->save();
        return redirect()->route('mascotas.index')->with('info', 'Mascota guardada');
        
    }
    
    public function update(MascotaRequest $request, $id)
    {
        $mascota = Mascota::find($id);
        
        $mascota->idcliente = $request->idcliente;
        $mascota->idraza = $request->idraza;
        $mascota->nombre = $request->nombre;
        $mascota->descripcion = $request->descripcion;
        $mascota->fechaNacimiento = $request->fechaNacimiento;
        $mascota->fechaFallecimiento = $request->fechaFallecimiento;
        $mascota->peso = $request->peso;
        
        $mascota->save();
        return redirect()->route('mascotas.index')->with('info', 'Mascota actualizada - id.'.$id);
    }
    
    public function create()
    {
        return view('mascotas.create');
    }
    
    public function edit($id)
    {        
        $mascota = Mascota::find($id);
        return view('mascotas.edit',  compact('mascota'));
    }
    
    public function show($id)
    {
        $mascota = Mascota::find($id);
        //dd($mascota->name);
        return view('mascotas.show',  compact('mascota'));
    }
    
    public function destroy($id)
    {
        $mascota = Mascota::find($id);
        $mascota->delete();
        //dd($mascota->name);
        return back()->with('info', 'Mascota eliminada .'.$id);
        //return back();
    }
}
