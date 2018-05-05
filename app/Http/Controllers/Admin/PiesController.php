<?php

namespace multiventas\Http\Controllers\Admin;

use multiventas\Models\Pie;
use Illuminate\Http\Request;
use multiventas\Http\Controllers\Controller;

class PiesController extends Controller
{
    /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $pie= pie::all();
    $params = [
        'title' => 'Lista de servicios',
        'pie' => $pie,
    ];
    return view('admin.servicio.pies_list')->with($params);
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
      return view('admin.servicio.pies_create')->with($params);
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
      $pie = pie::create([    //llama al metodo create del modelo                     
          'nombre' => $request->input('nombre'),
          'precio' => $request->input('precio'),
              
      ]);
      return redirect()->route('pies.index')->with('success', "El Servicio<strong>$pie->nombre</strong> ha sido creada correctamente.");
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
          $pie = pie::findOrFail($id);
          $params = [
              'title' => 'Borrar servicio',
              'pie' => $pie,
          ];
          return view('admin.servicio.pies_delete',['pie' => $pie]);
         
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
          $pie =pie::findOrFail($id);
          $params = [
              'title' => 'Editar Servicio',
              'pie' => $pie,
          ];
          return view('admin.servicio.pies_edit')->with($params);
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
          $pie = pie::findOrFail($id);
          $pie->nombre = $request->input('nombre');
          $pie->precio = $request->input('precio');
          $pie->save();
          return redirect()->route('pies.index')->with('success', "El servicio <strong>$pie->nombre</strong> ha sido actualizada.");
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
        $pie =pie::findOrFail($id);
        $pie->delete();
          return redirect()->route('$pies.index')->with('success', "El servicio <strong>$pie->nombre</strong> ha sido eliminado.");
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
