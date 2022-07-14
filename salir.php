<html>
<head>
<meta charset="utf-8">
<title>.:! Saliendo del Colegio Virtual </title>
 <link rel="stylesheet" href="css/style2.css?n=1">
<link href="css/bootstrap.min.css" rel="stylesheet"> 
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">



</head>






<style type="text/css">body {

background: linear-gradient(217deg, rgba(255,0,0,.8), rgba(255,0,0,0) 70.71%)
  

}

.linea {
  padding-top: 5px;
 font-family: 'Kumbh Sans', sans-serif; font-size: 12px;
   background: linear-gradient(to right, #F4FEF6, #6BC07B);
    max-width: 100%; height: 5px; 
    text-align: right; color: #0A4807;

 }




    
 </style>


<body>


<?php
session_start(); //esta linea tiene que ir antes de cualquier cosa, incluso de espacios
ob_start();
session_unset();
session_destroy();

header("location: index.php");

?>
<body oncontextmenu="return false">
   <div class="container w-50 "> <div class="row"> <div class="col">
<span class="float-right">
  <a href="index.php"><img class="d-block img-fluid" src="https://static.wixstatic.com/media/7869d1_65e5c0c6fefb4162aae025bdf27db41d~mv2.jpg" width="150" height="150" alt="First slide"></a>
</span>

</div></div></div>

     <div class="container w-50"> <div class="row"> <div class="col">   
   <div class="linea"> © <?php echo date('Y'); ?>  Saliendo del sistema ...  </div>
</div></div></div>


</body>
</div>
</html>