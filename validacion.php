<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
body {
  background-image: url(pppp.png);
  background-repeat: repeat;
}
</style>
</head>


<script src="sweetalert/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert/sweetalert.css">

<?php  
session_start(); //esta linea tiene que ir antes de cualquier cosa, incluso de espacios
ob_start();
   
//error_reporting(0);

 include ("conectar_base_oracle.php");
    

	$conn = OCILogon($user, $pass, $db);

	if (!$conn){
		echo "Conexion es invalida" . var_dump ( OCIError() );
		die();
	}

?>
<body oncontextmenu="return false">
 
<?php
  


//declaramos como variables a los campos de texto del formulario.

$button1 = filter_var($_POST["button1"], FILTER_SANITIZE_STRING);
$button2 = filter_var($_POST["button2"], FILTER_SANITIZE_STRING);




$nombre=htmlentities(strtoupper($_POST["button"]));
$password=htmlentities(md5($_POST["button2"]));
//echo $nombre;



$query = OCIParse($conn, "select * from USUARIOS where id='$nombre'  AND clave='$password' order by id");
OCIExecute($query);

$cant=0;


while ($row = oci_fetch_array($query))
    {
	$cant = 1;	
	}



echo $cant;

 $query = OCIParse($conn, "select * from usuarios where id='$nombre'  AND clave='$password' order by id");
   OCIExecute($query, OCI_DEFAULT);

 while ($row = oci_fetch_array($query)){
						$_SESSION['ID'] = $row['ID'];
						$_SESSION['NOMBRE_COMPLETO'] =  $row['NOMBRE_COMPLETO']; 
						$_SESSION['CORREO'] =  $row['CORREO'];   
						$_SESSION['TELEFONO'] =  $row['TELEFONO'];   
						$veces =  $row['IP_LAST'];
						
						
						 }

   
	$timezone = "America/Guatemala";
date_default_timezone_set($timezone);
$today = date("d-m-Y");
$hora = "".date("l - H:i:s");

$fecha= date('d/m/y', strtotime($today));


//Si existe el usuario lo va a redireccionar a la pagina de Bienvenida.

if($cant == 1 && $_SESSION['token']==$_POST['cifrado']){ 

$timezone = "America/Guatemala";
date_default_timezone_set($timezone);
$today = date("d-m-Y");
$hora = "".date("l - H:i:s");

$fecha= date('d/m/y', strtotime($today));

$runs = $veces +1;

$query2 = OCIParse($conn, "update usuarios set ip_last = '$runs', fecha_last =TO_DATE('$fecha','dd/mm/yy'),hora_last='$hora' where id = '$nombre'");
$rc=OCIExecute($query2);
oci_commit($conn);
oci_free_statement($query2);
//oci_close($conn);

$ip = ""; 

if (!empty($_SERVER["HTTP_CLIENT_IP"])) 
{ 
//check for ip from share internet 
$ip = $_SERVER["HTTP_CLIENT_IP"]; 
} 
elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) 
{ 
// Check for the Proxy User 
$ip = $_SERVER["HTTP_X_FORWARDED_FOR"]; 
} 
else 
{ 
$ip = $_SERVER["REMOTE_ADDR"]; 
} 
$lugar = $ip;

$queryr = OCIParse($conn, "select max(id_accesos) as mayor from historial_accesos");
OCIExecute($queryr, OCI_DEFAULT);
$row = oci_fetch_array($queryr);
$correlativo = "".$row['MAYOR']+1; 



$query21r = OCIParse($conn, "insert into historial_accesos (id_accesos,nombre,fecha,hora,ip_acceso) 
                                       values('$correlativo','$nombrec', TO_DATE('$fecha','DD/MM/YY'),'$hora','$lugar')");
$rc=OCIExecute($query21r);
oci_commit($conn);
oci_free_statement($query21r);
oci_close($conn); 



//$query21 = OCIParse($conn, "insert into actividades (id,nombrecompleto,correo,fecha,hora) 
  //                                     values('$nombre','$nombrec','$correo', TO_DATE('$fecha','DD/MM/YY'),'$hora')");

//$rc=OCIExecute($query21);
//oci_commit($conn);
//oci_free_statement($query21);
//oci_close($conn); // esto permite cerrar la conexion si en algun mometo se colocan dos commit y se colocar un oci_close en medio no se puede... porque no dejaría grabar 


    
$_SESSION['hora']=time();  
header ("Location:pacientes"); 

}

//Si no existe lo va a enviar al login otra vez.
else if(htmlentities($cant) <= 0) {  
return;
?>


<body onLoad="setTimeout('window.location = 'index.php'',45000000)"><?php
print "<script>swal('Revise!', 'DISCULPE ALGO FUNCIONO MAL AL MOMENTO DE VALIDAR SUS CREDENCIALES DE ACCESO, POR FAVOR HAGA CLIC EN ACEPTAR Y VUELVA HA INTENTARLO, MUCHAS GRACIAS', 'error')</script>";

   print "<script> sleep(50000000000);</script>";
      print "<script>window.location = 'index.php';</script>";

  

    







}   
?>

</body>
</html>