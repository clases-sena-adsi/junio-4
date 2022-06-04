<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProvidersController extends Controller
{
    //GET
    public function index()
    {
        $providers = Provider::all();
        return view('providers.index', compact('providers'));
    }

    // GET
    public function create()
    {
        return view('providers.create');
    }

    //GET
    public function show($id)
    {
        $provider = Provider::find($id);
        return view('providers.show', compact('provider'));
    }

    // POST
    public function store(Request $request)
    {
        $provider = Provider::create($request->all());
        return redirect()->route('providers.index');
    }

    // GET
    public function edit($id)
    {
        $provider = Provider::find($id);
        return view('providers.edit', compact('provider'));
    }

    // PUT
    public function update(Request $request, $id)
    {
        $provider = Provider::find($id)->update($request->all());
        return redirect()->route('providers.index');
    }

    //DELETE
    public function destroy($id)
    {
        $provider = Provider::find($id)->delete();
        return redirect()->route('providers.index');
    }
}
