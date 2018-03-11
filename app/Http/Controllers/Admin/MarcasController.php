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
        $marcas = Marca::all();
        $params = [
            'title' => 'Lista Marcas',
            'marcas' => $marcas,
        ];
        return view('admin.marcas.marcas_list')->with($params);
    }

    /**
     * muestra el formualrio donde se creara el nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [
            'title' => 'Crear Marca',
        ];
        return view('admin.marcas.marcas_create')->with($params);
    }

    /**
     * almacena un nuevo recurso en la bd.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $this->validate($request, [  //es el nombre que viene desde la vista
            'nombre' => 'required|unique:marcas',
            'descripcion' => 'required',
        ]);
        $marca = Marca::create([    //llama al metodo create del modelo                     
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
        ]);
        return redirect()->route('marcas.index')->with('success', "La marca <strong>$marca->name</strong> ha sido creada correctamente.");
    }

    /**
     * muestra el recurso especifico para eliminar.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $marca = Brand::findOrFail($id);
            $params = [
                'title' => 'Borrar Marcas',
                'brand' => $marca,
            ];
            return view('admin.marcas.marcas_delete')->with($params);
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

    /**
     *muestro el formulario desde donde se va a editar.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
            $marca = Marca::findOrFail($id);
            $params = [
                'title' => 'Editar Marca',
                'marca' => $marca,
            ];
            return view('admin.marcas.marcas_edit')->with($params);
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    
    }

    /**
     * almacena las actualizaciones en la bd.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try
        {
            $this->validate($request, [
                'nombre' => 'required|unique:marcas,nombre,'.$id,
                'descripcion' => 'required',
            ]);
            $marca = Marca::findOrFail($id);
            $marca->nombre = $request->input('nombre');
            $marca->descripcion = $request->input('descripcion');
            $marca->save();
            return redirect()->route('marcas.index')->with('success', "The Marca <strong>$marca->nombre</strong> ha sido actualizada.");
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

    /**
     * permite eliminar un registro de la bd.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $marca = Marca::findOrFail($id);
            $marca->delete();
            return redirect()->route('marcas.index')->with('success', "The brand <strong>Brand</strong> has successfully been archived.");
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }
    
}
