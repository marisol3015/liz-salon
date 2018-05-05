<?php

namespace multiventas\Http\Controllers\Admin;

use multiventas\Models\Color;
use Illuminate\Http\Request;
use multiventas\Http\Controllers\Controller;

class ColoresController extends Controller
{
    /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $color = color::all();
    $params = [
        'title' => 'Lista de servicios',
        'color' => $color,
    ];
    return view('admin.servicio.colores_list')->with($params);
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
      return view('admin.servicio.colores_create')->with($params);
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
      $color = color::create([    //llama al metodo create del modelo                     
          'nombre' => $request->input('nombre'),
          'precio' => $request->input('precio'),
              
      ]);
      return redirect()->route('colores.index')->with('success', "El Servicio<strong>$color->nombre</strong> ha sido creada correctamente.");
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
          $color = color::findOrFail($id);
          $params = [
              'title' => 'Borrar servicio',
              'color' => $color,
          ];
          return view('admin.servicio.colores_delete',['color' => $color]);
         
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
          $color =color::findOrFail($id);
          $params = [
              'title' => 'Editar Servicio',
              'color' => $color,
          ];
          return view('admin.servicio.colors_edit')->with($params);
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
          $color = color::findOrFail($id);
          $color->nombre = $request->input('nombre');
          $color->precio = $request->input('precio');
          $color->save();
          return redirect()->route('colores.index')->with('success', "El servicio <strong>$color->nombre</strong> ha sido actualizada.");
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
        $color =color::findOrFail($id);
        $color->delete();
          return redirect()->route('$colores.index')->with('success', "El servicio <strong>$color->nombre</strong> ha sido eliminado.");
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
