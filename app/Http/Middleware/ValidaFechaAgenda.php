<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class ValidaFechaAgenda
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $agenda = $request;
        $hoy = date("Y-m-d H:i:s");
        // if ($request->ajax()) { return response('Unauthorized.', 401); } 
          
        $fechaDesde = date($agenda->fechaDesde);
        $fechaHasta = date($agenda->fechaHasta);
        $fechaFinalizacion = date($agenda->fechaFinalizacion);
        
        if($hoy < $fechaFinalizacion){
            Session::flash('error','Esta tarea finalizo '.$fechaFinalizacion);
            Session::flash('info', 'fin tarea');
           
             return back()->withInput();
        }
        
        if($hoy < $fechaHasta){
            Session::flash('error','Esta tarea aun no empezo '.$hoy.' - '.$fechaHasta);
            Session::flash('info', 'tarea no inicio ');
           
             return back()->withInput();
        }
        
        if($fechaDesde < $fechaHasta){
            Session::flash('error','Fecha Desde '.$fechaDesde.' es mayor a fecha hasta '.$fechaHasta);
            Session::flash('info', 'tarea no inicio ');
           
             return back()->withInput();
        }
        
        //dd($request);
        Session::flash('info', 'eeeeeeeeeNo puede modificar esta mascota '.$fechaFinalizacion);
        return $next($request);
    }
}
