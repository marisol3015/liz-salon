<?php

namespace multiventas\Http\Controllers\Admin;

use multiventas\Models\Mano;
use Illuminate\Http\Request;
use multiventas\Http\Controllers\Controller;

class ManosController extends Controller
{
    /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $mano = mano::all();
    $params = [
        'title' => 'Lista de servicios',
        'mano' => $mano,
    ];
    return view('admin.servicio.manos_list')->with($params);
  }

  /**
   * muestra el formualrio donde se creara el nuevo recurso.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $params = [
          'title' => 'Crear servicio',
      ];
      return view('admin.servicio.manos_create')->with($params);
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
       
          'nombre' => 'required|alpha',
          'precio' => 'required|numeric',
                   
      ]);
      $mano = mano::create([    //llama al metodo create del modelo                     
          'nombre' => $request->input('nombre'),
          'precio' => $request->input('precio'),
              
      ]);
      return redirect()->route('manos.index')->with('success', "El Servicio<strong>$mano->nombre</strong> ha sido creada correctamente.");
  }

  /**
   * muestra el recurso especifico para eliminar.
   *
   * @param  int  $documento
   * @return \Illuminate\Http\Response
   */
  public function show($documento)
  {
      try{
          $mano = mano::findOrFail($documento);
          $params = [
              'title' => 'Borrar servicio',
              'mano' => $mano,
          ];
          return view('admin.servicio.manos_delete',['mano' => $mano]);
         
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
   * @param  int  $documento
   * @return \Illuminate\Http\Response
   */
  public function edit($documento)
  {
      try
      {
          $mano =mano::findOrFail($documento);
          $params = [
              'title' => 'Editar Servicio',
              'mano' => $mano,
          ];
          return view('admin.servicio.manos_edit')->with($params);
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
  public function update(Request $request, $documento)
  {
      try
      {
          $this->validate($request, [
         'nombre' => 'required|alpha',
         'precio'=> 'required|numeric',                   
            
          ]);
          $mano = mano::findOrFail($documento);
          $mano->nombre = $request->input('nombre');
          $mano->precio = $request->input('precio');
          $cliente->save();
          return redirect()->route('manos.index')->with('success', "El cliente <strong>$mano->nombre</strong> ha sido actualizada.");
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
   * @param  int  $documento
   * @return \Illuminate\Http\Response
   */
  public function destroy($documento)
  {
      try
      {
        $mano =mano::findOrFail($documento);
        $mano->delete();
          return redirect()->route('$manos.index')->with('success', "El cliente <strong>$mano->nombre</strong> ha sido eliminado.");
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
