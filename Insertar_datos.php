<html> 

<head>

<title> Insertando datos </title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link href="css/bootstrap.min.css" rel="stylesheet"> 


</head>

<body>

<?php include ("conectar_base_oracle.php");
  
  $conexion = OCILogon($user, $pass, $db);
  
  if (!$conexion){
    echo "Fallo la conexión ..." . var_dump ( OCIError() );
    die();
  }
?>


<?php  if (empty($_POST['id'])) {   ?>

<form action="" method="post">


<div class="container text-center">

<h3>   PARA INGRESAR INFORMACION A LA BASE DE DATOS </h3>

<div class="row">

<div class="col">
  <span> IDENTIFICADOR </span>
<input type="text" class="form-control" name="id" value="">
</div>


<div class="col">
<span> NOMBRES </span>
<input type="text" class="form-control" name="nombres" value="">
</div>

<div class="col">
<span> APELLIDOS </span>
<input type="text" class="form-control" name="apellidos" value="">
</div>

<div class="col">
<span> EDAD </span>
<input type="text" class="form-control" name="edad" value="">
</div>
</div>


<div class="row">
<div class="col text-center pt-5">
<input type="submit" class="btn btn-primary" value="HAGA CLIC AQUI PARA INGRESAR LOS VALORES A LA BASE DE DATOS">
</div>
</div>

</form>


</div>


<?php } ?>

 
<?php


if (isset($_POST['id']) && ($_POST['id']<>'')  ) {


// recibir las variables









$id = $_POST['id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$edad = $_POST['edad'];


$buscar_siexiste = OCIParse($conexion, " select * from usuarios where id = '$id'");
OCIExecute($buscar_siexiste, OCI_DEFAULT);
$rowx = oci_fetch_array($buscar_siexiste);
$siexiste = $rowx['ID'];


if ($siexiste <>'') { echo "disculpe pero ese codigo ya existe";  } else {
 
 
 $injectar = OCIParse($conexion, "insert into usuarios (id,  nombres,  apellidos,   edad) 
                                            values ('$id','$nombres', '$apellidos','$edad' )  ");

$rc=OCIExecute($injectar);
oci_commit($conexion);
oci_free_statement($injectar);

echo "se almaceno correctamente... ";

}


}

?>

</body>

</html>