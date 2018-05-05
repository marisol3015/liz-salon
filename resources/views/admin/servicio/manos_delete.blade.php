@extends('layout')

@section('content')
<div class="">
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                        <h2 > <font color="white">Confirmar borrado del Servicio de cuidado de Manos  <strong>{{$mano->nombre}}</strong></font> </h2>
                      <div class="clearfix"></div>
                </div>
                <div class="x_content">
                        <form method="post" action="{{ route('manos.destroy', ['id' => $mano->id]) }}" data-parsley-validate class="form-horizontal form-label-left">

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