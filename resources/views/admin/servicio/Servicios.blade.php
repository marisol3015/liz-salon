@extends('layout')
<html>
    <head>          
        <title>Categorias</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
  <style>
          
        .container {
            padding: 30px 120px;
            color: 	#000000;
            /*background-image: url("admin/images/fondo.jpg");
            */
           
        }
        .person {
            border: 5px solid transparent;
            margin-bottom: 10%;
            width: 60%;
            height: 20%;
                    
        }
        .person:hover {
            border-color: #F48888;
            }
    
 
        </style>
      </head>
 
      <body style="background-image: url('/admin/images/fondo.jpg')" >
     
              <div class="container text-center"   >
                 <div class="col-sm-3" >
                        <a href="/admin/cortes">
            <h3 class="text-center"><strong><kbd>Corte</kbd></strong></h3><br>
            <img src="images/corte.jpg" class="img-circle person" alt="Empleado"  >
                        </a>
          </div>
          <div class="col-sm-3">
                <a href="/admin/peinados">
            <h3 class="text-center"><strong><kbd>Peinado</kbd></strong></h3><br>
            <img src="images/peinado.jpg" class="img-circle person" alt="Cliente">
        </a>  
        </div>
          
          <div class="col-sm-3">
                <a href="/admin/colores">
            <h3 class="text-center"><strong><kbd>Color</kbd></strong></h3><br>
            <img src="images/color.jpg" class="img-circle person" alt="Caja"  >
        </a>
        </div>
           <div class="col-sm-3">
              <a href="/admin/keratinas">
            <h3 class="text-center"><strong><kbd>Keratina</kbd></strong></h3><br>
            <img src="images/keratina.jpg" class="img-circle person" alt="Agenda"  >
        </a>
          </div>        
          <div class="col-sm-3">
            <a href="/admin/depilaciones">
          <h3 class="text-center"><strong><kbd>Depilacion</kbd></strong></h3><br>
          <img src="images/depilacion.jpg" class="img-circle person" alt="Agenda"  >
      </a>
        </div>      
                 
        <div class="col-sm-3">
            <a href="/admin/manos">
          <h3 class="text-center"><strong><kbd>Cuidado Manos</kbd></strong></h3><br>
          <img src="images/manos.jpg" class="img-circle person" alt="Agenda"  >
      </a>
        </div>    
        <div class="col-sm-3">
            <a href="/admin/pies">
          <h3 class="text-center"><strong><kbd>Cuidado Pies</kbd></strong></h3><br>
          <img src="images/pies.jpg" class="img-circle person" alt="Agenda"  >
      </a>
        </div>    
        <div class="col-sm-3">
            <a href="/admin/maquillajes">
          <h3 class="text-center"><strong><kbd>Maquillaje</kbd></strong></h3><br>
          <img src="images/maquillaje.jpg" class="img-circle person" alt="Agenda"  >
      </a>
        </div>       
      </div>
        
      </body>
      </html>