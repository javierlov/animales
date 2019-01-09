<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = \App\User::orderBy('id','DESC')->paginate(5);
        return view('usuarios.index', compact('usuarios'));
    }
    
    
    public function show($id)
    {
        $usuario = \App\User::find($id);
        //dd($usuario->toArray());
        return view('usuarios.show',  compact('usuario'));
    }
    
}
