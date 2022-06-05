<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Provider;
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
        $providers = Provider::all();
        return view('products.create', compact('providers'));
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
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'provider_id' => $request->provider_id,
        ]);
        return redirect()->route('products.index')->with('success','Se ha creado correctamente un nuevo producto.');
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
