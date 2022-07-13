<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    
     <div class="container mt-3 text-center">


        <h1 >   CONTROL DE PACIENTES </H1>

       <div class="row">
  
                    <div class="col text-center">
                    <form action="insertar_datos" method="post">
                    <input type="submit" class="btn btn-primary"   value="CLIC PARA INSERTAR INFO">
                    </form>
                    </div>


                    <div class="col text-center">
                    <form action="actualizar_datos" method="post">
                    <input type="submit" class="btn btn-secondary"   value="CLIC PARA ACTUALIZAR INFO">
                    </form>
                    </div>

                    <div class="col text-center">
                    <form action="eliminar_datos" method="post">
                    <input type="submit" class="btn btn-secondary"   value="CLIC PARA ELIMINAR  INFO">
                    </form>
                    </div>
                    <div class="col text-center">
                    <form action="reporte" method="post">
                    <input type="submit" class="btn btn-secondary"   value="CLIC PARA REPORTAR  INFO">
                    </form>
                    </div>


       </div>



     </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>