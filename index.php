




<?php

session_start(); //esta linea tiene que ir antes de cualquier cosa, incluso de espacios
ob_start();

$token = md5(uniqid(rand(), true));
$_SESSION['token'] = $token;

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		
       .:| Administración de pacientes	</title>

       <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">


	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css?n=1">
	<link rel="stylesheet" type="text/css" href="css/main.css?n=1">

<style type="text/css">

 .linea {
  padding-top: 5px;
 font-family: 'Kumbh Sans', sans-serif; font-size: 12px;
   background: linear-gradient(to right, #EAF5F4,navy);
    max-width: 100%; height: 5px; 
    text-align: right;

 }
  
	
	.bg {

		background: linear-gradient(217deg, rgba(255,0,0,.8), rgba(255,0,0,0) 70.71%)
	}
</style>


</head>
<body>
<hr>
<div class="container bg p-l-50 p-r-50 p-t-15 p-b-54  rounded pt-5">
	<div class="row"> 

		<div class="col text-center">

      <img src="https://static.wixstatic.com/media/7869d1_65e5c0c6fefb4162aae025bdf27db41d~mv2.jpg" width="325" width="325"> 

		</div>

    <div class="col">
 

    <div class="limiter">
		
			
				<form  action="validacion.php" method="POST"  autocomplete="off">
				
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is required">
					<!--	<span class="bg"><b>USUARIO</b></span> -->
						
						<input class="input100" type="text" name="user" required placeholder="Escriba aquí el usuario">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
					<!--	<span class="bg"><b>CONTRASEÑA</b></span> -->
						<input class="input100" type="password" name="password" required placeholder="Ingrese su contraseña">
						<input type="hidden" name="cifrado" value="<?php echo $token; ?>">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
							<br><br>			
				
						<div class="wrap-login100-form-btn">
						
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Haga clic para acceder
							</button>
							</div>

				  	</div>
								
				</form>

				<div>
					<?php
					
						if (isset($_REQUEST["loginError"])) {

							echo "Usuario / clave incorrectas";
						}
					?>
				</div>
			
		
	</div>
    
 

		</div>


	</div>	

</div>


   <div class="container w-60 p-t-80  "><div>
   	
   <div class="linea"> © <?php echo date('Y'); ?> Administración de Pacientes  </div>


</body>
</html>