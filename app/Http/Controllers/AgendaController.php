<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
use App\Http\Requests\AgendaRequest;

class AgendaController extends Controller
{
    public function __construct()
    {
        // Filtrar todos los métodos
        // $this->middleware('auth');

        // Filtrar solo estos métodos...
        $this->middleware('ValidaFechaAgenda', ['only' => ['update', 'create','update']]);

        // Filtrar todos los métodos excepto...
        // $this->middleware('subscribed', ['except' => ['fooAction', 'barAction']]);
    }
    
    public function index()
    {
        $agendas = Agenda::orderBy('id','DESC')->paginate(5);
        return view('agendas.index', compact('agendas'));
    }

    public function store(AgendaRequest $request)
    {
        //var_dump($request);
        
        $agenda = new Agenda;
        
        $agenda->idmascota = $request->idmascota;
        $agenda->descripcion = $request->descripcion;
        $agenda->fechaDesde = $request->fechaDesde;
        $agenda->fechaHasta = $request->fechaHasta;
        $agenda->fechaFinalizacion = $request->fechaFinalizacion;
        
        $agenda->save();
        return redirect()->route('agendas.index')->with('info', 'Agenda guardada');
        
    }
    
    public function update(AgendaRequest $request, $id)
    {
        $agenda = Agenda::find($id);
        
        $agenda->idmascota = $request->idmascota;
        $agenda->descripcion = $request->descripcion;
        $agenda->fechaDesde = $request->fechaDesde;
        $agenda->fechaHasta = $request->fechaHasta;
        $agenda->fechaFinalizacion = $request->fechaFinalizacion;
        
        $agenda->save();
        return redirect()->route('agendas.index')->with('info', 'Agenda actualizada - id.'.$id);
         
    }
    
    public function create()
    {
        return view('agendas.create');
    }
    
    public function edit($id)
    {
        $agenda = Agenda::find($id);
        return view('agendas.edit',  compact('agenda'));
    }
    
    public function show($id)
    {
        $agenda = Agenda::find($id);
        //dd($agenda->name);
        return view('agendas.show',  compact('agenda'));
    }
    
    public function destroy($id)
    {
        $agenda = Agenda::find($id);
        $agenda->delete();
        //dd($agenda->name);
        return back()->with('info', 'Agenda eliminada .'.$id);
        //return back();
    }
}
