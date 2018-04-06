@extends('layout')

@section('content')
<div class="">
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><kbd>Confirmar borrado del empleado </kbd></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p><kbd>Esta usted seguro que desea eliminar a:  <strong>{{$empleados->nombre}}</strong> <strong>{{$empleados->apellido}}</strong>
                        <kbd></p>

                    <form method="POST" action="{{ route('empleados.destroy', ['documento' => $empleados->documento]) }}">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-danger">Si quiero eliminar el empleado  </button>
                    </form>
                    <a href="{{route('empleados.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Regresar </a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop