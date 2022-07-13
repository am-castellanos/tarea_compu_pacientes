
 <script src="sweetalert/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert/sweetalert.css">

<html>
	<head>
		<title>
			CREACION DE USUARIOS NUEVOS
		</title>
	</head>
	<body>


<?php  

function comprobar_email($email) {
    return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? 1 : 0;
}

 include ("conectar_base_oracle.php");

	$conn = OCILogon($user, $pass, $db);

	if (!$conn){
		echo "Conexion es invalida" . var_dump ( OCIError() );
		die();
	}

function mail_attachment($mailto, $from_mail, $from_name, $replyto, $subject, $message) {
  //  $content = chunk_split(base64_encode($content));
    $uid = md5(uniqid(time()));
     $header = "From: ".$from_name." <".$from_mail.">\r\n";
    $header .= "Reply-To: ".$replyto."\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
    $header .= "This is a multi-part message in MIME format.\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
    $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $header .= $message."\r\n\r\n";
    $header .= "--".$uid."\r\n";
  //  $header .= $content."\r\n\r\n";
    $header .= "--".$uid."--";
  
    if (mail($mailto, $subject, $message, $header)) {
		?>
    <br>
  <?php
     //   echo "Correo Enviado Satisfactoriamente ... ";
    } else {
		?>
    <br>
  <?php
        echo "Ha sucedido un error en el envío del correo";
    }

}


 //  $query = OCIParse($conn, "select *  from users order by id");
 //  OCIExecute($query, OCI_DEFAULT);
 
if ($_POST['usuario']=='' or $_POST['clave']=='' or $_POST['nombre']=='' or $_POST['correo']=='')
{echo "Todos los campos son importantes no los puede dejar vacios, por favor rectifique ...."; 
return;
}



$nombre=ltrim($_POST["usuario"]);
$telefono=ltrim($_POST["telefono"]);
$cla=$_POST["clave"];
$nombrecompleto=ltrim($_POST["nombre"]);
$correo=$_POST["correo"];
$encriptada=md5($cla);


if (comprobar_email($_POST['correo']))  {} else {  ?>  
 <body onLoad="setTimeout('window.close()',2400)"> <?php
print "<script>swal('Revise!', 'LA DIRECCION ELECTRONICA ES IMPORTANTE QUE SEA UNA DIRECCION VALIDA', 'error')</script>";
return;   }


$ress=2; 

$query = OCIParse($conn, "select * from usuarios where id='$nombre' order by id ");
   OCIExecute($query, OCI_DEFAULT);
   while ($row = oci_fetch_array($query))
    {
   $ress = 1;
  }

if ($ress==1)  { ?>  
 <body onLoad="setTimeout('window.close()',2400)"> <?php
print "<script>swal('Revise!', 'EL ALUMNO YA ESTA REGISTRADO', 'error')</script>";
return; }



$res=2;

$query = OCIParse($conn, "select * from usuarios where id='$nombre' order by id ");
   OCIExecute($query, OCI_DEFAULT);
   while ($row = oci_fetch_array($query))
    {
	 $nombreexiste = $row['NOMBRE_COMPLETO']; 	
	$res = 1;
	}
   
	if ($res==1)
	{
?>
<br>

<?php
	?>  
 <body onLoad="setTimeout('window.close()',2400)"> <?php
print "<script>swal('Revise!', 'ESTE ALUMNO YA TIENE CONFIGURADO UN ACCESO A LA PLATAFORMA, POR FAVOR RECTIFIQUE', 'error')</script>";
return;

	
	}
else

{
if ($res==2)
{
$query = OCIParse($conn, "insert into usuarios(id, clave, nombre_completo, correo,telefono) values('".$nombre."','".$encriptada."','".$nombrecompleto."','".$correo."','".$telefono."')");
$rc=OCIExecute($query);
oci_commit($conn);
oci_free_statement($query);
oci_close($conn);




$origen=$correo;
$master='lemusjulio42@gmail.com';

$deee=" PLATAFORMA ACADEMIA ROYAL ...";
    
$mensaje='';
$contador=0;
$subject = " Notificacion de acceso a la plataforma ";

$mensaje .= "<h1 style=\"BACKGROUND-COLOR: #E5F4FA\"align=center><FONT color=black> Buen día Estimado Alumno </font>  </h1> ";

$mensaje .= "<P style=\"BACKGROUND-COLOR: #E5F4FA\"align=center><FONT color=black> Por este medio se notifica que fue agregado, a nuestro sistema y apartir del presente tendra acceso . </font>  </P> ";

$mensaje .= "<table border=\"0\"  align=\"center\"   width=\"55%\" cellspacing=\"5\" cellpadding=\"5\">";

$mensaje .= "<tr>   <td   align=\"right\" bgcolor=navy style=\"color: #ffff\" colspan=\"2\"> ".$nombrecompleto." </td>  </tr>";
$mensaje .= "<tr>   <td   align=\"right\" bgcolor=green style=\"color: #ffff\" > USUARIO </td>  <td   align=\"right\" bgcolor=green style=\"color: #ffff\" > ".$nombre." </td>   </tr>";
$mensaje .= "<tr>   <td   align=\"right\" bgcolor=green style=\"color: #ffff\" > CLAVE </td>  <td   align=\"right\" bgcolor=green style=\"color: #ffff\" > ".$cla." </td>   </tr>";

$mensaje .= "</table>";

$mensaje .= "<h1 style=\"BACKGROUND-COLOR: #E5F4FA\"align=center><FONT color=black> PARA ACCEDER PUEDE IR A WWW.ACADEMIAROYAL.COM, <br> A CONTINUACION SELECCIONE COLEGIO VIRTUAL Y PROCEDA A INGRESAR LAS CREDENCIALES RECIBIDAS   </font>  </h1> "; 






  $mensaje .= "<hr>";

// $contestar=$correo_usuario;

//$headers  = 'From: [ Colegio Virtual Academia Royal ]  recepcion@academiaroyal.com'. "\r\n" .
  //          'Reply-To: '. $contestar . "\r\n" .
    //        'MIME-Version: 1.0' . "\r\n" .
      //      'Content-type: text/html; charset=UTF-8'."\r\n".
        //    'X-Mailer: PHP/' . phpversion();
  
 $adm="lemusjulio42@gmail.com";
    
   //   mail("$correo", $subject, $mensaje, $headers);
 //       mail("$adm", $subject, $mensaje, $headers);











 
}
}

?>



 <body onLoad="setTimeout('window.close()',2400)"> <?php
print "<script>swal('Correcto!', 'EL ACCESO A LA PLATAFORMA SE HA CONFIGURADO CORRECTAMENTE', 'success')</script>";
return;  