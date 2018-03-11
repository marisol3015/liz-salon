@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Confirmar borrado del registro <a href="{{route('marcas.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Regresar </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p>Esta usted seguro que desea eliminar <strong>{{$marca->name}}</strong></p>

                    <form method="POST" action="{{ route('marcas.destroy', ['id' => $nombre->id]) }}">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-danger">Si quiero borrrarlo. Borrar <strong>{{$marca->nombre}}</strong></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop