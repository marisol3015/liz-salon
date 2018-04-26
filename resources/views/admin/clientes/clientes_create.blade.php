@extends('layout')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h1> <font color="white"><dt> Crear cliente </dt></font></h1>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('clientes.store') }}" data-parsley-validate class="form-horizontal form-label-left">
                      
                        <div class="form-group{{ $errors->has('documento') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="documento"><dt>Documento<span class="required">*</span></dt>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ Request::old('documento') ?: '' }}" id="documento" name="documento" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('documento'))
                                <span class="help-block">{{ $errors->first('documento') }}</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ Request::old('nombre') ?: '' }}" id="nombre" name="nombre" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('nombre'))
                                <span class="help-block">{{ $errors->first('nombre') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido">Apellido <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ Request::old('apellido') ?: '' }}" id="apellido" name="apellido" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('apellido'))
                                <span class="help-block">{{ $errors->first('apellido') }}</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direccion">Direccion<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ Request::old('direccion') ?: '' }}" id="direccion" name="direccion" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('apellido'))
                                <span class="help-block">{{ $errors->first('direccion') }}</span>
                                @endif
                            </div>
                        </div>
                       
                        <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono">Telefono <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ Request::old('telefono') ?: '' }}" id="telefono" name="telefono" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('telefono'))
                                <span class="help-block">{{ $errors->first('telefono') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ Request::old('email') ?: '' }}" id="email" name="email" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('email'))
                                <span class="help-block">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>

                         <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <button type="submit" class="btn btn-success">Crear Cliente</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop