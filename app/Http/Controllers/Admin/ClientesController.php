<?php

namespace multiventas\Http\Controllers\Admin;

use multiventas\Models\Cliente;
use Illuminate\Http\Request;
use multiventas\Http\Controllers\Controller;

class ClientesController extends Controller
{
    /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $cliente = Cliente::all();
    $params = [
        'title' => 'Lista clientes',
        'cliente' => $cliente,
    ];
    return view('admin.clientes.clientes_list')->with($params);
  }

  /**
   * muestra el formualrio donde se creara el nuevo recurso.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $params = [
          'title' => 'Crear Clientes',
      ];
      return view('admin.clientes.clientes_create')->with($params);
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
          'documento'=> 'required|unique:clientes|numeric',
          'nombre' => 'required|alpha',
          'apellido' => 'required|alpha',
          'direccion' => 'required',
          'telefono' => 'required|numeric',
          'email' => 'required|email',
          
      ]);
      $cliente = Cliente::create([    //llama al metodo create del modelo                     
          'documento' => $request->input('documento'),
          'nombre' => $request->input('nombre'),
          'apellido' => $request->input('apellido'),
          'direccion' => $request->input('direccion'),
          'telefono' => $request->input('telefono'),
          'email' => $request->input('email'),
        
      ]);
      return redirect()->route('clientes.index')->with('success', "El cliente <strong>$cliente->nombre</strong> ha sido creada correctamente.");
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
          $cliente = Cliente::findOrFail($documento);
          $params = [
              'title' => 'Borrar cliente',
              'Empleado' => $cliente,
          ];
          return view('admin.clientes.clientes_delete',['Clientes' => $cliente]);
         
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
          $cliente = Cliente::findOrFail($documento);
          $params = [
              'title' => 'Editar cliente',
              'cliente' => $cliente,
          ];
          return view('admin.clientes.clientes_edit')->with($params);
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
              'documento'=> 'required|unique:clientes|numeric',
              'nombre' => 'required|alpha',
              'apellido' => 'required|alpha',
              'direccion' => 'required',
              'telefono' => 'required|numeric',
              'email' => 'required|email',
              
            
          ]);
          $cliente = Cliente::findOrFail($documento);
          $cliente->documento = $request->input('documento');
          $cliente->nombre = $request->input('nombre');
          $cliente->apellido = $request->input('apellido');
          $cliente->direccion = $request->input('direccion');
          $cliente->telefono = $request->input('telefono');
          $cliente->email = $request->input('email');
          $cliente->save();
          return redirect()->route('empleados.index')->with('success', "El cliente <strong>$$cliente->nombre</strong> ha sido actualizada.");
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
        $cliente = cliente::findOrFail($documento);
        $cliente->delete();
          return redirect()->route('$cliente.index')->with('success', "El empleado <strong>$$cliente->nombre</strong> ha sido eliminado.");
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
