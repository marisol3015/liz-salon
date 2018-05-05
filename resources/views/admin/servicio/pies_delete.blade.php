@extends('layout')

@section('content')
<div class="">
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                        <h2 > <font color="white">Confirmar borrado del Servicio Cuidado de Pies<strong>{{$maquillaje->nombre}}</strong></font> </h2>
                      <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <h3>Esta usted seguro que desea eliminar el servicio:  <strong>{{$pie->nombre}}</strong> <strong>{{$empleados->apellido}}</strong>
                    </h3>

                    <form method="POST" action="{{ route('pies.destroy', ['id' => $pie->id]) }}">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-danger">Si quiero eliminar el servicio  </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop