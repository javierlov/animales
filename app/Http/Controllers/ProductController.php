<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function __construct(){
       
        $this->middleware('auth');
        $this->middleware('admin',['only'=>['destroy','create','update','edit']]);
        //$this->middleware('guest')->except('logout');
    }
    
     public function index()
    {
        $products = Product::orderBy('id','DESC')->paginate(5);
        return view('products.index', compact('products'));
    }
    
    public function store(ProductRequest $request)
    {
        $product = new Product;
        
        $product->name = $request->name;
        $product->short = $request->short;
        $product->body = $request->body;
        
        $product->save();
        return redirect()->route('products.index')->with('info', 'El producto fue guardado');
    }
    
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        
        $product->name = $request->name;
        $product->short = $request->short;
        $product->body = $request->body;
        
        $product->save();
        return redirect()->route('products.index')->with('info', 'El producto fue actualizado - id.'.$id);
    }
    
    public function create()
    {
        return view('products.create');
    }
    
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit',  compact('product'));
    }
    
    public function show($id)
    {
        $product = Product::find($id);
        //dd($product->toArray());
        return view('products.show',  compact('product'));
    }
    
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        //dd($product->name);
        return back()->with('info', 'El producto fue eliminado');
        //return back();
    }
}
