@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Agregar Cliente </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{URL('clientes')}}{{isset($cliente) ? '/'. $cliente->id : ''}}">
                        {{ csrf_field() }}
                        @if (isset($cliente))
                            {{method_field('PUT')}}
                        @endif

                        <div class="form-group{{ $errors->has('nombreEmpresaCliente') ? ' has-error' : '' }}">
                            <label for="nombreEmpresaCliente" class="col-md-4 control-label">Nombre Cliente</label>

                            <div class="col-md-6">
                                <input id="nombreEmpresaCliente" type="text" class="form-control" name="nombreEmpresaCliente" value="{{  isset($cliente) ? $cliente->nombreEmpresaCliente : '' }}" required autofocus>

                                @if ($errors->has('nombreEmpresaCliente'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombreEmpresaCliente') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('correoContactoCliente') ? ' has-error' : '' }}">
                            <label for="correoContactoCliente" class="col-md-4 control-label">Correo electronico</label>

                            <div class="col-md-6">
                                <input id="correoContactoCliente" type="correoContactoCliente" class="form-control" name="correoContactoCliente" value="{{ isset($cliente) ? $cliente->correoContactoCliente : '' }}" required>

                                @if ($errors->has('correoContactoCliente'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('correoContactoCliente') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('encargadoEmpresaCliente') ? ' has-error' : '' }}">
                            <label for="encargadoEmpresaCliente" class="col-md-4 control-label">Nombre Encargado</label>

                            <div class="col-md-6">
                                <input id="encargadoEmpresaCliente" type="text" class="form-control" name="encargadoEmpresaCliente" value="{{  isset($cliente) ? $cliente->encargadoEmpresaCliente : '' }}" required autofocus>

                                @if ($errors->has('encargadoEmpresaCliente'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('encargadoEmpresaCliente') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('rutEmpresaCliente') ? ' has-error' : '' }}">
                            <label for="rutEmpresaCliente" class="col-md-4 control-label">RUT Cliente</label>

                            <div class="col-md-6">
                                <input id="rutEmpresaCliente" type="text" class="form-control" name="rutEmpresaCliente" value="{{  isset($cliente) ? $cliente->rutEmpresaCliente : '' }}" required autofocus>

                                @if ($errors->has('rutEmpresaCliente'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rutEmpresaCliente') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <!-- Nuevo campo rubro -->
                           <div class="form-group{{ $errors->has('rubroEmpresaCliente') ? ' has-error' : '' }}">
                            <label for="rubroEmpresaCliente" class="col-md-4 control-label">Rubros</label>

                            <div class="col-md-6">
                                <input id="rubroEmpresaCliente" type="rubroEmpresaCliente" class="form-control" placeholder="Separa los rubros por una coma (ej: auto, salud)" name="rubroEmpresaCliente"  value="{{isset($cliente) ? $cliente->rubroEmpresaCliente : ''}}" required>

                                @if ($errors->has('rubroEmpresaCliente'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rubroEmpresaCliente') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                                <div>
<a href="{{url('/clientes')}}" class="btn btn-info" role="button">Volver</a>
</div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection