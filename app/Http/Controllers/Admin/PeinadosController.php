<?php

namespace multiventas\Http\Controllers\Admin;

use multiventas\Models\Peinado;
use Illuminate\Http\Request;
use multiventas\Http\Controllers\Controller;

class PeinadosController extends Controller
{
    /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $peinado =peinado::all();
    $params = [
        'title' => 'Lista de servicios',
        'peinado' => $peinado,
    ];
    return view('admin.servicio.peinados_list')->with($params);
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
      return view('admin.servicio.peinados_create')->with($params);
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
      $peinado = peinado::create([    //llama al metodo create del modelo                     
          'nombre' => $request->input('nombre'),
          'precio' => $request->input('precio'),
              
      ]);
      return redirect()->route('peinados.index')->with('success', "El Servicio<strong>$peinado->nombre</strong> ha sido creada correctamente.");
  }

  /**
   * muestra el recurso especifico para eliminar.
   *
   * @param  int  $documento
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      try{
          $peinado = peinado::findOrFail($id);
          $params = [
              'title' => 'Borrar servicio',
              'peinado' => $peinado,
          ];
          return view('admin.servicio.peinados_delete',['peinado' => $peinado]);
         
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
  public function edit($id)
  {
      try
      {
          $peinado =peinado::findOrFail($id);
          $params = [
              'title' => 'Editar Servicio',
              'peinado' => $peinado,
          ];
          return view('admin.servicio.peinados_edit')->with($params);
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
         'nombre' => 'required|alpha',
         'precio'=> 'required|numeric',                   
            
          ]);
          $peinado = peinado::findOrFail($id);
          $peinado->nombre = $request->input('nombre');
          $peinado->precio = $request->input('precio');
          $peinado->save();
          return redirect()->route('peinados.index')->with('success', "El servicio <strong>$peinado->nombre</strong> ha sido actualizada.");
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
  public function destroy($id)
  {
      try
      {
        $peinado = peinado::findOrFail($id);
        $peinado->delete();
          return redirect()->route('$peinados.index')->with('success', "El peinado <strong> $peinado->nombre</strong> ha sido eliminado.");
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
