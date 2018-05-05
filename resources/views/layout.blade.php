<html>
    <head>
        <title>Liz salón</title>
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
    
    .navbar {
    margin-bottom: 0;
    background-color: #2d2d30;/*seleccion del menu mas*/
    border: 0;
    font-size: 11px !important;
    letter-spacing: 4px;
    opacity:0.9;
}

/* adiciona color a los nombres */
.navbar li a, .navbar .navbar-brand { 
    color: #e0e0e0 !important;
}

/*sombreado al pasar el mouse por un nombre */
.navbar-nav li a:hover {
    color: #8bc34a !important;
}

/* The active link */
.navbar-nav li.active a {
    color: #fff !important;
    background-color:#29292c !important;
}

/* Remove border color from the collapsible button */
.navbar-default .navbar-toggle {
    border-color: transparent;
}

}
        </style>
      </head>
 
      <body style="background-image: url('/admin/images/fondo.jpg')" >
        <nav class="navbar navbar-default navbar-fixed-top " >
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>                        
                </button>
                <a class="navbar-brand" href="admin/imagen/favicon.png">Liz salon</a>
              </div>
              <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="/home">Inicio</a></li>
                  <li><a href="/admin/empleados">Empleados</a></li>
                  <li><a href="/admin/clientes">Clientes</a></li>
                  <li><a href="/admin/opciones">Citas</a></li>
                  <li><a href="/admin/facturacion">Facturación</a></li>
                  <li><a href="/admin/informes">Informes</a></li>
                  <li><a href="/admin/servicios">Servicios</a></li>
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
              </div>
            </div>
          </nav>      
          

            <div class="container text-center"  >   
                    <br />
        <!-- page content -->
       @include('templates.admin.partials.alerts')
        @yield('content')
    </div>
    <!-- /page content -->
</body>
</html>