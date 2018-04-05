@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Editar Empleado<a href="{{route('empleados')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Regresar </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('empleados.update', ['documento' => $empleado->documento]) }}" data-parsley-validate class="form-horizontal form-label-left">
                            <div class="form-group{{ $errors->has('documento') ? ' has-error' : '' }}">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="documento">Documento <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="{{$empleado->documento}}" id="documento" name="documento" class="form-control col-md-7 col-xs-12">
                                        @if ($errors->has('documento'))
                                        <span class="help-block">{{ $errors->first('documento') }}</span>
                                        @endif
                                    </div>
                                </div>
        
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{$empleado->nombre}}" id="nombre" name="nombre" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('nombre'))
                                <span class="help-block">{{ $errors->first('nombre') }}</span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido">apellido <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="{{$empleado->apellido}}" id="apellido" name="apellido" class="form-control col-md-7 col-xs-12">
                                    @if ($errors->has('apellido'))
                                    <span class="help-block">{{ $errors->first('apellido') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direccion">direccion <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="{{$empleado->direccion}}" id="apellido" name="direccion" class="form-control col-md-7 col-xs-12">
                                        @if ($errors->has('direccion'))
                                        <span class="help-block">{{ $errors->first('direccion') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono">telefono <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" value="{{$empleado->telefono}}" id="telefono" name="telefono" class="form-control col-md-7 col-xs-12">
                                            @if ($errors->has('telefono'))
                                            <span class="help-block">{{ $errors->first('telefono') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">email <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" value="{{$empleado->email}}" id="email" name="email" class="form-control col-md-7 col-xs-12">
                                                @if ($errors->has('email'))
                                                <span class="help-block">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('usuario') ? ' has-error' : '' }}">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="usuario">usuario <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" value="{{$empleado->usuario}}" id="usuario" name="usuario" class="form-control col-md-7 col-xs-12">
                                                    @if ($errors->has('usuario'))
                                                    <span class="help-block">{{ $errors->first('usuario') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('contrasena') ? ' has-error' : '' }}">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contrasena">contrasena <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" value="{{$empleado->contrasena}}" id="contrasena" name="contrasena" class="form-control col-md-7 col-xs-12">
                                                        @if ($errors->has('contrasena'))
                                                        <span class="help-block">{{ $errors->first('contrasena') }}</span>
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