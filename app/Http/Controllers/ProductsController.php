<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //GET
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
     // GET
    public function create()
    {
        return view('products.create');
    }
     //GET
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }
    // POST
    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return redirect()->route('products.index');
    }
     // GET
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }
    // PUT
    public function update(Request $request, $id)
    {
        $product = Product::find($id)->update($request->all());
        return redirect()->route('products.index');
    }
    //DELETE
    public function destroy($id)
    {
        $product = Product::find($id)->delete();
        return redirect()->route('products.index');
    }
}
