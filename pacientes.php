<?php
session_start(); //esta linea tiene que ir antes de cualquier cosa, incluso de espacios
ob_start();
$usuario = $_SESSION['NOMBRE_COMPLETO'];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>.:! Control de Pacientes ...</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
         .bg { background: linear-gradient(217deg, rgba(255,0,0,.8), rgba(255,0,0,0) 70.71%)
             }

             #content {
margin:0;
 clear: both;
  	background: radial-gradient(ellipse closest-side, #EDF5ED, #C2EFC4 10%, #99DF9B 50%, #EAF5F4);
 padding: 0;
 overflow-y: scroll;
 width: 100%;
 height: 580px;
 border: 0;
 align-self: left;
 border-radius: 20px 20px 20px 20px;
  
}

.opciones{
    background: #E6EFEB;
margin-left: 10px;
    cursor: pointer;
    color: black;
    font-weight: bold;
padding: 5px;
display: block;
text-decoration: none;
font-size:10px;
font-family: 'Kumbh Sans', sans-serif;
text-shadow: 0.1em 0.1em 0.15em white;
  }

  .opciones:hover{
  
      background: #9CE1AA;
  color: black;
  
  border-bottom: solid 1px navy;
  border-right: solid 3px navy;
  font-weight: bold;
  font-size:10px;
  font-family: 'Kumbh Sans', sans-serif;
  text-shadow: 0.1em 0.1em 0.15em white

  }



    </style>  
</head>
  <body>
    
  <div class="container-fluid bg">
    <nav class="navbar navbar-expand-md navbar-light  border-bottom border-primary">
    <div class="container-fluid">
        <a href="#" class="navbar-brand"> <img width="30" heigh="30" src="medicina.png" > </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>

        </button>
        <div id="menu" class="collapse navbar-collapse">
        <ul class="navbar-nav ms-3">
            <li class="nav-item"><a class="nav-link" href="pacientes"> Inicio </a></li>
            <li class="nav-tem dropdown">
                <a  class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                    Opciones 
                </a>
                <ul class="dropdown-menu">
                 <li><div id="menu1" class="opciones">NUEVOS PACIENTES</div> </li>
                 <li><div id="menu2" class="opciones">REPORTES</div></li>
                 <li><div id="menu3" class="opciones">MANTENIMIENTOS</div></li>
                 <li><div id="menu4" class="opciones">NUEVOS USUARIOS</div></li>
                 <li><div  > <a href="salir" class="opciones">SALIR  </a></div></li>
                </ul>

                
            </li>
        </ul>
            
        <ul class="navbar-nav ms-3">
            <div class="row">
             <div class="col"> <?php echo $usuario; ?>
            </div>  

        </ul>      
            
</div>
</div>
</nav>


<iframe  



  scrolling="auto" src="pantalla_incio.php"  id="content" scrolling="auto"  ></iframe>


</div>






  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="menu.js"></script>
  </body>
</html>