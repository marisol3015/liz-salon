@extends('layout')

@section('content'  )
<div class="" >

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2><font color="white">Lista de Servicio Cuidado de Manos <a href="{{route('manos.create')}}" class="btn btn-primary btn"><i class="fa fa-plus"></i>Nuevo </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content text-center " >
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                  <th>Acción</th>
                            
                            </tr>
                        </thead>
                           <tbody>
                            @if (count($mano))
                            @foreach($mano as $row)
                            <tr>
                                <td>{{$row->nombre}}</td>
                                <td>{{$row->precio}}</td>
                                                              <td>
                                   <a href="{{ route('manos.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Editar </a></i> </a>
                                   <a href="{{ route('manos.show', ['id' => $row->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-chevron-left"></i> Eliminar </a></i> </a>
                               </td
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop