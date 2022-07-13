<html> 

<head>

<title> Eliminando información </title>
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


<?php  if (empty($_POST['id']) && empty($_POST['form1']) &&  empty($_POST['form2'])  ) {   ?>

<form action="" method="post">


<div class="container text-center">

<h3>   PARA ELIMINAR INFORMACION A LA BASE DE DATOS </h3>

<div class="row">

<div class="col">
  <span>INGRESAR ID PARA ELIMINAR </span>
<input type="text" class="form-control" name="id"  value="">
</div>
</div>


<div class="row">
<div class="col text-center pt-5">
    <input type="hidden" name="form1" value="1">
<input type="submit" class="btn btn-primary" value="HAGA CLIC PARA BUSCAR EL REGISTRO">
</div>
</div>

</form>


</div>


<?php } ?>

 
<?php


if (isset($_POST['id']) && ($_POST['id']<>'')  && isset($_POST['form1']) && empty($_POST['form2']) ) {


// recibir las variables



$id = $_POST['id'];


$buscar_siexiste = OCIParse($conexion, " select id, nombres, apellidos, edad from usuarios where id = '$id'");
OCIExecute($buscar_siexiste, OCI_DEFAULT);
$rowx = oci_fetch_array($buscar_siexiste);
$id = $rowx['ID'];
$nombres = $rowx['NOMBRES'];
$apellidos = $rowx['APELLIDOS'];
$edad = $rowx['EDAD'];

if ($id <>'') { ?>
    
    
<div class="container w-80">

    <div class="row">
            <form action="" method="post">
            <div class="col border">
             <span class="btn btn-secondary"> IDENTIFICADOR O CODIGO </SPAN>   
            <input type="text" name="ida" class="form-control" readonly value="<?php  echo $id;  ?>" >
            </div>

            <div class="col">
            <span class="btn btn-secondary"> NOMBRES </SPAN>  
            <input type="text" name="nombrea" class="form-control" value="<?php  echo $nombres;  ?>" >
            </div>

            <div class="col">
            <span class="btn btn-secondary"> APELLIDOS </SPAN>  
            <input type="text" name="apellidoa" class="form-control" value="<?php  echo $apellidos;  ?>" >
            </div>

            <div class="col">
            <span class="btn btn-secondary"> EDAD </SPAN>  
            <input type="text" name="edada" class="form-control" value="<?php  echo $edad;  ?>" >
            </div>


    </div>

         <div class="row pt-3">
                
                <div class="col">
                <input type="hidden" name="form2" value="1">
                <input type="submit" class="btn btn-primary" value="haga clic para ELIMINAR el registro">

                </div>
                </form>
         </div>

</div>








<?php }  else   {  ?>

<div class="container w-50">

<div class="row">

 <div class="col">
   
 <h1> DISCULPE LA INFORMACION QUE BUSCA NO LA ENCUENTRO ...  </h1

 </div>


</div>

</div>


 <?php   }   } 
 
 
 if (isset($_POST['form2']) ) {

    $id = $_POST['ida'];   

 $actualizar = OCIParse($conexion, " delete from  usuarios  where id ='$id'    ");
   
  $rc=OCIExecute($actualizar);
 oci_commit($conexion);
 oci_free_statement($actualizar);

?>

<div class="container">
<div class="row">
 
   <div class="col">
 
    <h3> EL REGISTRO SE HA ELIMINADO CORRECTAMENTE .... <H3>

   </div>


</div>


</div>

<?PHP

 }   


 
 ?>






</body>

</html>