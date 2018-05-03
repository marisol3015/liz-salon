<?php

namespace multiventas\Http\Controllers\Admin;
use multiventas\Models\Event;
use Illuminate\Http\Request;
use multiventas\Http\Controllers\Controller;
class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $params = [
                'title' => 'Crear Citas',
            ];
            return view('admin.Agenda.agenda_create')->with($params);
        } 
    }


    /**
     * muestra el formualrio donde se creara el nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    
        {
            $params = [
                'title' => 'Crear Citas',
            ];
        return view('admin.Agenda.agenda_create')->with($params);
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
            'title' => 'required|alpha',
            'start_date' => 'required',
            'end_date' => 'required',
             ]);
        $event = Event::create([    //llama al metodo create del modelo                     
            'title' => $request->input('title'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
           
        ]);
        return redirect()->route('empleados.index')->with('success');    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
