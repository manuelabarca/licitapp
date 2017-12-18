@if(Auth::user()->estado == 3)
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Panel de administracion</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                   
          @if(Session::has('success'))
          <h3>{{ Session::get('success')}}</h3>
          @endif
          <table class="table table-striped">
                <thead>
                    <tr>
                    <th>ID</th>
                  <th>Nombre</th>
                  <td>Email</th>
                  <th>Rubro</th>
                  <th>Estado</th>
                  <th>Intermediario</th>
                        <th>
                            <a href="{{URL('/admin/usuarios/create')}}" class="btn btn-success btn-xs">Crear usuario</a>
                        </th>
            </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $key => $user)
                    <tr>
                     <td>{{($key+1)}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                       <td>{{$user->rubro}}</td>
                        <td>{{$user->estado}}</td>
                         <td>{{$user->intermediario}}</td>
                          <td>
                            <center>
                                <a href="{{URL('/admin/usuarios/' . $user->id . '/edit')}}" class="btn btn-xs btn-info" >Editar</a>
                                <form action="{{URL('/admin/usuarios/' .$user->id)}}" method="POST">
                                    {{csrf_field()}}
                                    {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-xs btn-danger">Eliminar</button>
                                </form>
                                <a href="{{URL('/admin/usuarios/' . $user->id)}}" class="btn btn-xs btn-primary" >Ver</a>
                            </center>
                          </td>
                    </tr>
                  @endforeach
                  </tbody>
                  </table>
             
<div>
<a href="{{url('/admin')}}" class="btn btn-info" role="button">Volver</a>
</div>
                        </div>
                        </div>
                        </div>
</div>
@endsection
@else
    {!! header("Location: https://licitapp.cl") !!}
    {!! die() !!}
@endif