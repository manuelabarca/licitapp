<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title id="tituloprueba">{{ config('app.name', 'Licitapp') }}</title>

    <!-- Styles -->
    <link href="{{ asset('js/introjs/introjs.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link href="{{ asset('css/comparar.css') }}" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <style>
.resaltar{background-color:#58ACFA;}
</style> 


    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        {{ config('app.name', 'Licitapp') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                          <!--Borrado{{ route('login') }}-->
                            <li><a href="{{ route('register') }}">Registrarse</a></li>
                        @else
                        
                        <li class="dropdown" id="revisadas" onclick="nRevisada('{{count(auth()->user()->unreadNotifications)}}')">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                               Notificaciones <span class="badge">{{count(auth()->user()->unreadNotifications)}}</span>
                                </a>
                                 <ul class="dropdown-menu">
                                 <li>
                                @foreach(auth()->user()->unreadNotifications as $notification)
                                @include('layouts.notificaciones.'.snake_case(class_basename($notification->type)))

                                @endforeach
                                 </li>
                                 </ul>
                                 </li>
                           
                            <li class="dropdown" id="menu2">
                                <a href="#" id="nombremenu" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }}
                                    
                                     <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" id="menu" data-step="0">
                               
                                <li><a href="{{ url('/home') }}"data-step="1" data-intro="Bienvenido a licitapp">Inicio</a></li>
                                 @if(Auth::user()->estado == 3)
                                <li><a href="{{ url('/admin') }}">Backoffice</a></li>
                                 @endif
                                @if(Auth::user()->intermediario == 1)
                                <li><a href="{{ url('/clientes') }}" >Mis clientes</a></li>
                                @endif
                                <li><a href="{{ url('/rubro') }}"data-step="2" data-intro="Aquí podras encontrar todas las licitaciones según tu rubro">Mi rubro</a></li>
                                <li><a href="{{ url('/licitaciones') }}" id="busqueda" data-step="3" data-intro="Busca nuevas oportunidades de negocio !">Licitaciones</a></li>
                                <li><a href="{{ url('/ordenes') }}"data-step="4" data-intro="Revisa que esta comprando el estado y quien lo compro">Ordenes de compra</a></li>
                                <li><a href="{{ url('/empresas') }}"data-step="5" data-intro="Aqui puedes revisar todas las empresas, que participan en las licitaciones">Empresas del estado</li>
                                <li><a href="{{ url('/herramientas') }}"data-step="6" data-intro="Usa nuestras herramientas comparativas para mejorar tu proceso de adjudicacion">Herramientas</a></li>
                                <li><a href="{{ url('/seguidas') }}"data-step="7" data-intro="En la seccion 'Licitaciones' puedes seguir las licitaciones que quieras y aqui podras ver cuales sigues ">Licitaciones seguidas</a></li>
                                
                                @if(Auth::user()->estado == 0)
                                <li><a href="{{ url('suscripcion') }}"data-step="8" data-intro="Paga para ser usuario premium y descubre un monton de nuevas funcionalidades">Ser premium</a></li>
                                @elseif(Auth::user()->estado == 1)
                                <li><a href="{{ url('herramientasP') }}">Herramientas premium</a></li>
                                @endif
                                <li><a href="{{ url('/perfil') }}/{{ Auth::user()->id }}"data-step="9" data-intro="Por ultimo podras editar alguno de tus datos personales aqui">Ajustes</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                           Salir
                                        </a>
                                       

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                   
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
         @include ('footer') 
    </div>

    <!-- Scripts -->
    
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('js/licitapp.js') }}"></script>
    <script src="{{asset('js/introjs/intro.min.js')}}"></script>

        <script src="{{asset('js/notificaciones.js')}}"></script>
<script src="{{asset('js/highcharts.js')}}"></script>
<script src="{{asset('js/graficasHome.js')}}"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{asset('config/paso-a-paso.js')}}"></script>
<script>
    @if(Session::has('message'))
        var type="{{Session::get('alert-type','info')}}"


        switch(type){
            case 'info':
                 toastr.info("{{ Session::get('message') }}");
                 break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif

 </script>
   <script type='text/javascript' >
    $.expr[':'].icontains = function(obj, index, meta, stack){
    return (obj.textContent || obj.innerText || jQuery(obj).text() || '').toLowerCase().indexOf(meta[3].toLowerCase()) >= 0;
    };
    $(document).ready(function(){   
        $('#buscador').keyup(function(){
                     buscar = $(this).val();
                     $('#lista li').removeClass('resaltar');
                            if(jQuery.trim(buscar) != ''){
                               $("#lista li:icontains('" + buscar + "')").addClass('resaltar');
                            }
            });
    });   
 </script> 
  <script type='text/javascript' >
    $.expr[':'].icontains = function(obj, index, meta, stack){
    return (obj.textContent || obj.innerText || jQuery(obj).text() || '').toLowerCase().indexOf(meta[3].toLowerCase()) >= 0;
    };
    $(document).ready(function(){   
        $('#buscador').keyup(function(){
                     buscar = $(this).val();
                     $('#lista tr').removeClass('resaltar');
                            if(jQuery.trim(buscar) != ''){
                               $("#lista tr:icontains('" + buscar + "')").addClass('resaltar');
                            }
            });
    });   
 </script> 
</body>
</html>
