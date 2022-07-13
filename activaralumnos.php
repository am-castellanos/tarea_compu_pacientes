<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>.:! Control de Pacientes ...</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<title> .::| Activar usuarios ...  </title>



<script>


  <script> 
function target_popup(form) {
    window.open('', 'formpopup', 'width=950,height=650,left=150,top=90,resizeable,scrollbars');
    form.target = 'formpopup';
}
</script> 







  <?php

include ("conectar_base_oracle.php");

	$conn = OCILogon($user, $pass, $db);

	if (!$conn){
		echo "Conexion es invalida" . var_dump ( OCIError() );
		die();
	}


 $timezone = "America/Guatemala";
  date_default_timezone_set($timezone);
  $today = date("d/m/y");

  $anio = date("Y");

?>

</head>
  <body>
	<div class="container">
    <div class="bg-secondary text-white text-center"> ACTIVANDO USUARIOS    </div> 
    <form action="registrar_alumnos" method="POST" onsubmit="target_popup(this)" >

  <div class="row pt-2">
    <div class="col text-right border">
    NOMBRE COMPLETO 
    </div>
    <div class="col">
    <input type="text" name="nombre" class="form-control"  value="" required>
    </div>
   </div>


   <div class="row pt-2">
    <div class="col text-right border">
    USUARIO 
    </div>
    <div class="col">
    <input type="text" name="usuario" class="form-control"  value="" required>
    </div>
   </div>

   <div class="row pt-2">
    <div class="col text-right border">
    CONTRASEÑA
    </div>
    <div class="col">
    <input type="password" name="clave" class="form-control" value="" required>
    </div>
   </div>

   <div class="row pt-2">
    <div class="col text-right border">
    TELEFONOS
    </div>
    <div class="col">
    <input type="text" name="telefono" class="form-control" value="" required>
    </div>
   </div>

   <div class="row pt-2">
    <div class="col text-right border">
    CORREO DE NOTIFICACION
    </div>
    <div class="col">
    <input type="text" name="correo" class="form-control" value="" required>
    </div>
   </div>

   <div class="row">

    <div class="col text-center">
    <input type="submit" name="Submit" class="btn btn-primary" value="CREAR CREDENCIALES PARA EL ALUMNO" />
    </div>
   </div>


   
   </div>








</FORM>	



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="menu.js"></script>
  </body>
</html>