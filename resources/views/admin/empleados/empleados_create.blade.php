@extends('layout')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><kbd>Crear empleado </kbd><a href="{{route('empleados.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Regresar </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('empleados.store') }}" data-parsley-validate class="form-horizontal form-label-left">
                      
                        <div class="form-group{{ $errors->has('documento') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="documento"><p><kbd>documento <span class="required">*</kbd></p></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ Request::old('documento') ?: '' }}" id="documento" name="documento" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('documento'))
                                <span class="help-block">{{ $errors->first('documento') }}</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre"><p><kbd>Nombre <span class="required">*</kbd></p></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ Request::old('nombre') ?: '' }}" id="nombre" name="nombre" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('nombre'))
                                <span class="help-block">{{ $errors->first('nombre') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido"><p><kbd>apellido <span class="required">*</kbd></p></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ Request::old('apellido') ?: '' }}" id="apellido" name="apellido" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('apellido'))
                                <span class="help-block">{{ $errors->first('apellido') }}</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direccion"><p><kbd>direccion <span class="required">*</kbd></p></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ Request::old('direccion') ?: '' }}" id="direccion" name="direccion" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('apellido'))
                                <span class="help-block">{{ $errors->first('direccion') }}</span>
                                @endif
                            </div>
                        </div>
                       
                        <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono"><p><kbd>telefono <span class="required">*</kbd></p></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ Request::old('telefono') ?: '' }}" id="telefono" name="telefono" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('telefono'))
                                <span class="help-block">{{ $errors->first('telefono') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"><p><kbd>email <span class="required">*</kbd></p></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ Request::old('email') ?: '' }}" id="email" name="email" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('email'))
                                <span class="help-block">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('usuario') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="usuario"><p><kbd>usuario <span class="required">*</kbd></p></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ Request::old('usuario') ?: '' }}" id="usuario" name="usuario" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('usuario'))
                                <span class="help-block">{{ $errors->first('usuario') }}</span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('contrasena') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contrasena"><p><kbd>contraseña <span class="required">*</kbd></p></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ Request::old('contrasena') ?: '' }}" id="contrasena" name="contrasena" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('contrasena'))
                                <span class="help-block">{{ $errors->first('contrasena') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <button type="submit" class="btn btn-success">Crear Empleado</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop