<?php

namespace App\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;

class Admin
{
    
    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }
    /**
    protected $auth;
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$this->auth->user()->admin()){
            Session::flash('error','Sin privilegios de Administrador');            
            return back()->withInput();
            //return redirect()->to('products'); 
        }else{
             return $next($request);
        }
    }
}
