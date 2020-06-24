<?php
    session_start();
    $user=$_SESSION["username"];
    $pass=$_SESSION["password"];
    $consulta_temp="SELECT * FROM datos WHERE curp=?";
    $conexion = mysqli_connect("localhost","root","57425595","alumnos");
    if(!$conexion)
    {
        mysqli_close($conexion);
        echo "<script>
            alert('Error al conectarse a la Base de Datos');
            window.location='./index.html';
            </script>";
    }
    else
    {   
        if($consulta=mysqli_prepare($conexion,$consulta_temp))
        {
            mysqli_stmt_bind_param($consulta,'s',$user);
            if(mysqli_stmt_execute($consulta))
            {
                mysqli_stmt_bind_result($consulta,$nombre,$escuela,$direccion,$email,$fechaNacimiento,$telefono,$celular,$promedio,$curp,$boleta,$estado);
                mysqli_stmt_fetch($consulta);
            }
            else
            {
                mysqli_stmtm_close($conexion);
                mysqli_close($conexion);
                echo "<script>
                    alert('Hubo un error al realizar la consulta');
                    window.location='./index.html';
                    </script>"; 
            }
        }
        else
        {
            mysqli_stmtm_close($conexion);
            mysqli_close($conexion);
            echo "<script>
                    alert('Hubo un error al realizar la consulta');
                    window.location='./index.html';
                 </script>"; 
        }
    }
    session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Registro enero 2020</title>
        <style>
            label{
                font-weight: bold;
            }
            p{
                font-size: large;
            }
        </style>
    </head>
    <body class="bg-light">
        <nav class="navbar navbar-light navbar-expand-lg container" style="background-color: #e3f2fd;">
            <div class="collapse navbar-collapse" id="navbar-content">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="./index.html">Registro</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="https://www.ipn.mx/">IPN</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="https://www.escom.ipn.mx/">ESCOM</a>
                    </li>
                </ul>
            </div>
            <div class="navbar-nav mr-auto header">
                <a class="nav-link" href="https://www.ipn.mx/"><img src="figures/ipn.png"  width="60" height="40" class="d-inline-block align-top" alt="ipn"></a>
            </div>
        </nav>
        <main class="container">
             <div class="card bg-light mb-3">
                <div class="card-header">
                    <div class="card-header">
                        <h1>Información personal</h1>
                    </div>
                    <div class="card-body">
                        <div class="card-title"><h2>Alumno: <?php echo $nombre ?> </h2></div>
                        <div class="card-text">
                            <div class="list-group">
                                <div class="row list-group-item">
                                    <div class="col-md-4">
                                        <p><strong>Boleta: </strong><?php echo $boleta ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>Fecha de nacimiento: </strong><?php echo $fechaNacimiento ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>CURP: </strong><?php echo $curp ?></p> 
                                    </div>
                                </div>
                                <div class="row list-group-item">
                                    <div class="col-md-5">
                                        <p><strong>Entidad de nacimiento: </strong><?php echo estado ?> </p> 
                                    </div>
                                    <div class="col-md-5">
                                        <p><strong>Dirección:  </strong><?php echo $direccion ?></p>
                                    </div>
                                </div>
                                <div class="row list-group-item">
                                    <div class="col-md-3">
                                        <p><strong>Teléfono:  </strong><?php echo $telefono ?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <p><strong>Celular: </strong><?php echo $celular ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>Escuela de procedencia: </strong><?php echo $escuela ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-s text-center">
                                <button type="submit" id="gen-pdf" class="btn btn-outline-danger">PDF <i class="fa fa-file-pdf-o"></i></button>
                                <button type="button" onclick="location.href='./inicioSesion.html'" id="log-out" class="btn btn-outline-dark">Salir <i class="fa fa-sign-out"></i>                                </button>
                        </div>
                    </div>
                </div>
             </div>
        </main>
    </body>
</html>