<html>
    <head>
<!-- jQuery -->
<script src='/fullcalendar-3.9.0/lib/jquery.min.js'></script>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" href="/fullcalendar-3.9.0/fullcalendar.min.css"/>

<script src="/fullcalendar-3.9.0/fullcalendar.min.js"></script>
<style>
   
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
<body style="background-image: url('/admin/images/fondo.jpg')">
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
              <li><a href="/admin/categorias">Categorias</a></li>
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
      
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h2><kbd> Calendario de citas</kbd</h2></div>

                <div class="panel-body">
                    {!! $calendar->calendar() !!}
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="/fullcalendar-3.9.0/lib/moment.min.js"></script>
<script src="/fullcalendar-3.9.0/fullcalendar.min.js"></script>
{!! $calendar->script() !!}
<script src="{{asset('/fullcalendar-3.9.0/locale/es.js')}}"></script>
</html>


