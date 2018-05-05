<?php

namespace multiventas\Http\Controllers\Admin;

use multiventas\Models\Keratina;
use Illuminate\Http\Request;
use multiventas\Http\Controllers\Controller;

class KeratinasController extends Controller
{
    /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $keratina = keratina::all();
    $params = [
        'title' => 'Lista de servicios',
        'keratina' => $keratina,
    ];
    return view('admin.servicio.keratinas_list')->with($params);
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
      return view('admin.servicio.keratinas_create')->with($params);
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
      $keratina = keratina::create([    //llama al metodo create del modelo                     
          'nombre' => $request->input('nombre'),
          'precio' => $request->input('precio'),
              
      ]);
      return redirect()->route('keratinas.index')->with('success', "El Servicio<strong>$keratina->nombre</strong> ha sido creada correctamente.");
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
          $keratina = keratina::findOrFail($id);
          $params = [
              'title' => 'Borrar servicio',
              'keratina' => $keratina,
          ];
          return view('admin.servicio.keratinas_delete',['keratina' => $keratina]);
         
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
          $keratina =keratina::findOrFail($id);
          $params = [
              'title' => 'Editar Servicio',
              'keratina' => $keratina,
          ];
          return view('admin.servicio.keratinas_edit')->with($params);
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
          $keratina = keratina::findOrFail($id);
          $keratina->nombre = $request->input('nombre');
          $keratina->precio = $request->input('precio');
          $keratina->save();
          return redirect()->route('keratinas.index')->with('success', "El servicio <strong>$keratina->nombre</strong> ha sido actualizada.");
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
        $keratina =keratina::findOrFail($id);
        $keratina->delete();
          return redirect()->route('$keratinas.index')->with('success', "El servicio <strong>$keratina->nombre</strong> ha sido eliminado.");
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
