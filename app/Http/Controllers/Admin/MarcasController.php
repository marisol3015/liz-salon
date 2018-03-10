<?php

namespace multiventas\Http\Controllers\Admin;

use multiventas\Models\Marca;
use Illuminate\Http\Request;
use multiventas\Http\Controllers\Controller;

class MarcasController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.marcas.marcas_list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.marcas.marcas_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $this->validate($request, [
            'nombre' => 'required|unique:marcas',
            'descripcion' => 'required',
        ]);
        $brand = Marca::create([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
        ]);
        return redirect()->route('marcas.index')->with('success', "La marca <strong>$brand->name</strong> ha sido creada correctamente.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.marcas.marcas_delete');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.marcas.marcas_edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return redirect()->route('marcas.index')->with('success', "The brand <strong>Brand</strong> has successfully been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->route('marcas.index')->with('success', "The brand <strong>Brand</strong> has successfully been archived.");
    }
}
