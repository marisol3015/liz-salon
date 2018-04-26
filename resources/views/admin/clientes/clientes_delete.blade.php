@extends('layout')

@section('content')
<div class="">
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                <h2> <font color="white"><dt> Confirmar borrar el cliente:  <strong>{{$Clientes->nombre}}</strong> <strong>{{$Clientes->apellido}}</strong></dt></font></h2>
                <div class="clearfix"></div>
                </div>
                <div class="x_content">
                        <h3> <font color="black"><dt> Esta usted seguro que desea eliminar a:  <strong>{{$Clientes->nombre}}</strong> <strong>{{$Clientes->apellido}}</strong></dt></font></h3>
                        <form method="POST" action="{{ route('clientes.destroy', ['documento' => $Clientes->documento]) }}">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-danger">Si quiero eliminar al cliente </button>
                    </form>
                  </div>
            </div>
        </div>
    </div>
</div>
@stop








