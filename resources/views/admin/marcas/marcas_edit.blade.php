@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Editar Marca<a href="{{route('marcas.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Regresar </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('marcas.update', ['id' => $marca->id]) }}" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Marca <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{$marca->nombre}}" id="nombre" name="nombre" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('nombre'))
                                <span class="help-block">{{ $errors->first('nombre') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descripcion">Descripcion <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{$marca->descripcion}}" id="descripcion" name="descripcion" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('descripcion'))
                                <span class="help-block">{{ $errors->first('descripcion') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <input name="_method" type="hidden" value="PUT">
                                <button type="submit" class="btn btn-success">Guardar Cambios</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop