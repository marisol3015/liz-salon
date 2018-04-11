@extends('layout')
@section('content')
<head>
    <link rel="stylesheet" type="text/css" href="jquery.datetimepicker.css"/ >
<script src="/public/js/jquery.js"></script>
<script src="/public/js/jquery.datetimepicker.js"></script>
</head>

<body>

<div class="">
    <div class="clearfix"></div>
    <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><kbd>Crear cita </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                   
                   <form method="POST" action="{{ route('CrearCita.create') }}" data-parsley-validate class="form-horizontal form-label-left">
                      
                        <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="titulo"><kbd>Titulo</kbd> <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ Request::old('Titulo') ?: '' }}" id="Titulo" name="Titulo" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('Titulo'))
                                <span class="help-block">{{ $errors->first('Titulo') }}</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('Fecha_inicio') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Fecha_inicio"><kbd>Fecha Inicio</kbd> <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="datetimepicker" type="text" value="{{ Request::old('Fecha_inicio') ?: '' }}" id="nombre" name="nombre" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('Fecha_inicio'))
                                <span class="help-block">{{ $errors->first('Fecha_inicio') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fecha_final') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha_final"><kbd>Fecha Final</kbd> <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ Request::old('fecha_final') ?: '' }}" id="fecha_final" name="apellido" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('fecha_final'))
                                <span class="help-block">{{ $errors->first('fecha_final') }}</span>
                                @endif
                            </div>
                        </div>                    
                       

                         <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <button type="submit" class="btn btn-success">Crear cita</button>
                                <a href="/admin/opciones"class="btn btn-info btn"><i class="fa fa-chevron-left"></i> Regresar </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
</body