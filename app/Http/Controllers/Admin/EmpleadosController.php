<?php

namespace multiventas\Http\Controllers\Admin;

use multiventas\Models\Empleado;
use multiventas\Models\user;
use Illuminate\Http\Request;
use multiventas\Http\Controllers\Controller;

class EmpleadosController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::all();
        $params = [
            'title' => 'Lista empleados',
            'empleado' => $empleados,
        ];
        return view('admin.empleados.empleados_list')->with($params);
    }

    /**
     * muestra el formualrio donde se creara el nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [
            'title' => 'Crear Empleados',
        ];
        return view('admin.empleados.empleados_create')->with($params);
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
            'documento'=> 'required|unique:empleados|numeric',
            'nombre' => 'required|alpha',
            'apellido' => 'required|alpha',
            'direccion' => 'required',
            'telefono' => 'required|numeric',
            'email' => 'required|email',
            'contrasena' => 'required',
        ]);
        $empleado = empleado::create([    //llama al metodo create del modelo                     
            'documento' => $request->input('documento'),
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'direccion' => $request->input('direccion'),
            'telefono' => $request->input('telefono'),
            'email' => $request->input('email'),
            'contrasena' => $request->input('contrasena'),
        ]);
        $usuario = user::create([
                'name' =>  $request->input(trim('nombre')),
                'email' =>  $request->input(trim('email')),
                'password' => bcrypt( $request->input('contrasena')),
        ]);
        return redirect()->route('empleados.index')->with('success', "El empleado <strong>$empleado->nombre</strong> ha sido creada correctamente.");
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
            $empleado = Empleado::findOrFail($documento);
            $params = [
                'title' => 'Borrar empleado',
                'Empleado' => $empleado,
            ];
            return view('admin.empleados.empleados_delete',['empleados' => $empleado]);
           
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
            $empleado = Empleado::findOrFail($documento);
            $params = [
                'title' => 'Editar empleado',
                'empleado' => $empleado,
            ];
            return view('admin.empleados.empleados_edit')->with($params);
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
                'documento'=> 'required|numeric',
                'nombre' => 'required|alpha',
                'apellido' => 'required|alpha',
                'direccion' => 'required',
                'telefono' => 'required|numeric',
                'email' => 'required|email',
                'contrasena' => 'required',
              
            ]);
            $empleado = Empleado::findOrFail($documento);
            $empleado->nombre = $request->input('nombre');
            $empleado->apellido = $request->input('apellido');
            $empleado->direccion = $request->input('direccion');
            $empleado->telefono = $request->input('telefono');
            $empleado->email = $request->input('email');
            $empleado->contrasena = $request->input('contrasena');
            $empleado->save();
        
            return redirect()->route('empleados.index')->with('success', "El empleado <strong>$empleado->nombre</strong> ha sido actualizada.");
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
            $empleado = Empleado::findOrFail($documento);
            $empleado->delete();
            return redirect()->route('empleados.index')->with('success', "El empleado <strong>$empleado->nombre</strong> ha sido eliminado.");
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
