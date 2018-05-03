
<html>
    <head>
    <title>Datepicker</title>
    <!-- Jquery -->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
 
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!-- Datepicker Files -->
    <link rel="stylesheet" href="{{asset('css/bootstrap-datetimepicker.css')}}">
    <script src="{{asset('js/bootstrap-datetimepicker.js')}}"></script>
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
<body  style="background-image: url('/admin/images/fondo.jpg')">
    <nav class="navbar navbar-default navbar-fixed-top "  >
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
                        <form method="post" action="{{ route('CrearCita.store') }}" data-parsley-validate class="form-horizontal form-label-left">
                           
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Tipo de servicio <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" value="{{ Request::old('title') ?: '' }}" id="title" name="title" class="form-control col-md-7 col-xs-12">
                                            @if ($errors->has('title'))
                                            <span class="help-block">{{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                    </div>
            
                        <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                            <label for="date" class="control-label col-md-3 col-sm-3 col-xs-12" for="start_date">Fecha de cita <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ Request::old('start_date') ?: '' }}" id="datetimepicker" name="start_date" class='input-group date'>
                                @if ($errors->has('start_date'))
                                <span class="help-block">{{ $errors->first('start_date') }}
                                    <span class="input-group-addon"> </span>
                                        <span class="glyphicon glyphicon-calendar"></span>
                                   </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                            <label for="date" class="control-label col-md-3 col-sm-3 col-xs-12" for="end_datee">Fecha de fin de cita <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ Request::old('end_date') ?: '' }}" id="datetimepicker1" name="end_date" class='input-group date'>
                                @if ($errors->has('end_date'))
                                <span class="help-block">{{ $errors->first('end_date') }}
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span></span>
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
 
<script  type="text/javascript">
            $(function () {
                $('#datetimepicker').datetimepicker();
                $('#datetimepicker1').datetimepicker();
            });
    
</script>
</body>
</html>