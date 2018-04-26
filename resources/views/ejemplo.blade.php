<html lang="en">
    <head>
        <title>Inicio</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
          
        .container {
            padding: 30px 120px;
            color: 	#000000;
            background-image: url("admin/images/fondo.jpg");
            
           
        }
        .person {
            border: 5px solid transparent;
            margin-bottom: 10%;
            width: 60%;
            height: 30%;
           
          
        }
        .person:hover {
            border-color: #F48888;
        }

        </style>
      </head>
 
      <body>
      <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto " ">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                          
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

      <div class="container text-center"   >


        <div class="col-sm-4" >
            <a href="/home">
<h3 class="text-center"><strong><kbd>Bienvenido</kbd></strong></h3><br>
<img src="admin/images/Empleado.jpg" class="img-circle person" alt="Empleado"  >
            </a>
</div>

                 <div class="col-sm-4" >
                        <a href="/admin/empleados">
            <h3 class="text-center"><strong><kbd>Empleados</kbd></strong></h3><br>
            <img src="admin/images/Empleado.jpg" class="img-circle person" alt="Empleado"  >
                        </a>
          </div>
          <div class="col-sm-4">
                <a href="/admin/clientes">
            <h3 class="text-center"><strong><kbd>Clientes</kbd></strong></h3><br>
            <img src="admin/images/Cliente.jpg" class="img-circle person" alt="Cliente">
        </a>  
        </div>
          
          <div class="col-sm-4">
              
            <h3 class="text-center"><strong><kbd>Facturar</kbd></strong></h3><br>
            <img src="admin/images/Caja.jpg" class="img-circle person" alt="Caja"  >
        </a>
        </div>
          
          <div class="col-sm-4">
              <h3 class="text-center"><strong><kbd>Contabilidad</kbd></strong></h3><br>
              <img src="admin/images/Contabilidad.jpg" class="img-circle person" alt="Contabilidad"  >
            </div>         
        <div class="col-sm-4">
              <a href="/admin/opciones">
            <h3 class="text-center"><strong><kbd>Agenda</kbd></strong></h3><br>
            <img src="admin/images/Agenda.jpg" class="img-circle person" alt="Agenda"  >
        </a>
          </div>        
          <div class="col-sm-4"  style="float:right">
            <h3 class="text-center"><strong><kbd>Catalogo</kbd></strong></h3><br>
            <img src="admin/images/Catalogo.jpg" class="img-circle person" alt="Catalogo"  >
          </div>   
      </div>
        
      </body>
      </html>