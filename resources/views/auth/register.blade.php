@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registro</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo electronico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contrasena</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar contrasena</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        
                        <!-- Nuevo campo empresa -->
                           <div class="form-group{{ $errors->has('empresa') ? ' has-error' : '' }}">
                            <label for="empresa" class="col-md-4 control-label">Empresa</label>

                            <div class="col-md-6">
                                <input id="empresa" type="empresa" class="form-control" name="empresa" required>

                                @if ($errors->has('empresa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('empresa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
   <!-- Nuevo campo rubro -->
                           <div class="form-group{{ $errors->has('rubro') ? ' has-error' : '' }}">
                            <label for="rubro" class="col-md-4 control-label">Rubros</label>

                            <div class="col-md-6">
                                <input id="rubro" type="rubro" class="form-control" placeholder="Separa los rubros por una coma (ej: auto, salud)" name="rubro" required>

                                @if ($errors->has('rubro'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rubro') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           <!-- Nuevo campo rubro -->
                           <div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">

                            <div class="col-md-6">
                                <input id="estado" type="hidden" class="form-control"  name="estado" value="0" >

                                @if ($errors->has('estado'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('estado') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- Intermediario -->
                            <div class="form-group{{ $errors->has('intermediario') ? ' has-error' : '' }}">
                                 <label for="intermediario" class="col-md-4 control-label">Eres intermediario?</label>
                            <div class="col-md-6">
                              <select name="intermediario">
                              <option value="1">Si</option>
                              <option value="0">No</option>
                              </select>
                                @if ($errors->has('intermediario'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('intermediario') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrarse
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
