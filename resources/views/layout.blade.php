<html lang="en">
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

        </style>
      </head>
 
      <body style="background-image: url('/admin/images/fondo.jpg')" >
           

            <div class="container text-center"  >   
                    <br />
        <!-- page content -->
       @include('templates.admin.partials.alerts')
        @yield('content')
    </div>
    <!-- /page content -->
</body>
</html>