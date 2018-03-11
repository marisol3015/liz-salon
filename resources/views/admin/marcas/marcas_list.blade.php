@extends('templates.admin.layout')

@section('content')
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Marcas <a href="{{route('marcas.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Nuevo </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Marca</th>
                                <th>Descripcion</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Marca</th>
                                <th>Descripcion</th>
                                <th>Accion</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if (count($marcas))
                            @foreach($marcas as $row)
                            <tr>
                                <td>{{$row->nombre}}</td>
                                <td>{{$row->descripcion}}</td>
                                <td>
                                    <a href="{{ route('marcas.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                                    <a href="{{ route('marcas.show', ['id' => $row->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                                </td>
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