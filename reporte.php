<html> 

<head>

<title> lISTAR INFORMACIÓN DE NUESTRA TABLA </title>
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

<div class="container w-90">

     <div class="row">
         

                <div class="col">
                    
                    <table class="table">

                    <thead>
                        <th> id </th><th> nombres </th><th> apellidos </th><th> edad </th>

                    </thead>

                        <tbody>

                        <?php    

                        $consulta = OCIParse($conexion, " select * from usuarios order by id asc");
                        OCIExecute($consulta, OCI_DEFAULT);   
                        while ($row = oci_fetch_array($consulta)) { ?>

                        <tr>
                            <td> <?php  echo $row['ID']  ?> </td>

                            <td> <?php  echo $row['NOMBRES']  ?> </td>
                            <td> <?php  echo $row['APELLIDOS']  ?> </td>
                            <td> <?php  echo $row['EDAD']  ?> </td>

                        </tr>
                        <?php } ?>

                        </table>

                        </tbody>



                    </table>





                </div>



     </div>



</div>














</body>

</html>