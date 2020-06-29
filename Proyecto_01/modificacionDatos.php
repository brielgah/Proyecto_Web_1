<?php
	$boleta=$_GET["boleta"];
	$query1="SELECT * FROM datos WHERE boleta=?";
	$conexion=mysqli_connect("localhost","root","57425595","alumnos");
	if(!$conexion)
	{
		echo "<script>
				alert('Error al conectarse a la Base de Datos');
				window.location='./sesionAdmin.php';
				</script>";
	}
	else
	{
		if($consulta=mysqli_prepare($conexion,$query1))
        {
            mysqli_stmt_bind_param($consulta,'s',$boleta);
            if(mysqli_stmt_execute($consulta))
            {
                mysqli_stmt_bind_result($consulta,$nombre,$ap_paterno,$ap_materno,$escuela,$estado,$direccion,$municipio,$cp,$email,$fechaNacimiento,$telefono,$celular,$promedio,$curp,$boleta);
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
	}
?>
<html>
	<head>
	<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <title>Datos de alumno</title>
		<link rel="stylesheet" href="styles/styles.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="enableDisable.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light container" style="background-color: #e3f2fd;">
            <div class="navbar-collapse">
                <div class="navbar-collapse">
                    <a class="nav-link header text-dark" href="https://www.ipn.mx/">
                        <img src="figures/ipn.png"  width="60" height="40" class="d-inline-block align-top" alt="ipn">
                        Instituto Politécnico Nacional
                    </a>
                </div>
                <div class="navbar-collapse collapse">
                    <a class="nav-link header text-dark" href="https://www.escom.ipn.mx/">
                        Escuela Superior de Cómputo
                        <img src="figures/escom.png"  width="60" height="40" class="d-inline-block align-top" alt="escom">
                    </a>
                </div>

            </div>
		</nav>
        <div class="container mt-4">
            <div class="container">
                <form id="datos_para_modificar" method="post" action="./modificarDatos.php" target="_parent">
                    <div class="card bg-light mx-2 my-2 px-2 py-2">
						<fieldset id="identidad" class="form-group">
                            <div class="card-header">
                                <legend class="text-center">Identidad</legend>
                            </div>
                            <div class="card-body">
                                <div class="form-group card-text">
                                   	<div class="form-row">
										<div class="col-md-6">
                                            <label for="ap-paterno">Apellido paterno:</label>
                                            <input type="text" id="ap-paterno" name="ap-paterno" class="form-control" value="<?php echo $ap_paterno ?>">
					    <div id="invalid_ap_paterno" class="invalid-feedback"><p></p></div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="ap-materno">Apellido materno: </label>
                                            <input type="tetx" id="ap-materno" name="ap-materno"  class="form-control" value="<?php echo $ap_materno; ?>" required >
					    <div id="invalid_ap_materno" class="invalid-feedback"><p></p></div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="nombre">Nombre:</label>
                                            <input type="text" id="nombre" name="nombre" value = "<?php echo $nombre; ?>" class="form-control" required>
					    <div id="invalid_nombre" class="invalid-feedback"><p></p></div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="boleta">Número de boleta: </label>
                                            <input type="text" id="boleta" name="boleta" class="form-control" value="<?php echo $boleta; ?>" required>
					    <div id="invalid_boleta" class="invalid-feedback"><p></p></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="fech-nac">Fecha de nacimiento: <svg class="bi bi-calendar" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1zm1-3a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2z"/>
                                            <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5zm9 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5z"/>
                                        </svg></label>
                                        <input type="date" id="fech-nac" name="fech-nac" class="form-control" value="<?php echo $//terminar ?>">
					    <div id="invalid_fecha" class="invalid-feedback"><p></p></div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="curp" required>CURP:</label>
                                        <input type="text" id="curp" name="curp" class="form-control" value="<?php echo $curp; ?>">
					    <div id="invalid_curp" class="invalid-feedback"><p></p></div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="entidad">Entidad de nacimiento:</label>
                                        <select name="entidad" class="form-control" id="entidad" required value="<?php echo $//Terminar ?>">
                                            <option value="Aguascalientes">Aguascalientes</option>
                                            <option value="Baja California">Baja California</option>
                                            <option value="Baja California Sur">Baja California Sur</option>
                                            <option value="Campeche">Campeche</option>
                                            <option value="Chiapas">Chiapas</option>
                                            <option value="Chihuahua">Chihuahua</option>
                                            <option value="Coahuila">Coahuila</option>
                                            <option value="Colima">Colima</option>
                                            <option value="Distrito Federal">Distrito Federal</option>
                                            <option value="Durango">Durango</option>
                                            <option value="Estado de México">Estado de México</option>
                                            <option value="Guanajuato">Guanajuato</option>
                                            <option value="Guerrero">Guerrero</option>
                                            <option value="Hidalgo">Hidalgo</option>
                                            <option value="Jalisco">Jalisco</option>
                                            <option value="Michoacán">Michoacán</option>
                                            <option value="Morelos">Morelos</option>
                                            <option value="Nayarit">Nayarit</option>
                                            <option value="Nuevo León">Nuevo León</option>
                                            <option value="Oaxaca">Oaxaca</option>
                                            <option value="Puebla">Puebla</option>
                                            <option value="Querétaro">Querétaro</option>
                                            <option value="Quintana Roo">Quintana Roo</option>
                                            <option value="San Luis Potosí">San Luis Potosí</option>
                                            <option value="Sinaloa">Sinaloa</option>
                                            <option value="Sonora">Sonora</option>
                                            <option value="Tabasco">Tabasco</option>
                                            <option value="Tamaulipas">Tamaulipas</option>
                                            <option value="Tlaxcala">Tlaxcala</option>
                                            <option value="Veracruz">Veracruz</option>
                                            <option value="Yucatán">Yucatán</option>
                                            <option value="Zacatecas">Zacatecas</option>
                                        </select>
                                    </div>
                                </div>
							</div>
						</fieldset>
					</div>
					<br>
					<div class="card bg-light mx-2 my-2 px-2 py-2">
                    	<fieldset id="contacto" class="form-group">
        	                <div class="card-header">
                                <legend class="text-center">Datos de contacto</legend>
                            </div>
                            <div class="card-body">
                                <div class="card-text">
                                    <div class="row">
                                        <div class="col">
                                            <label for="mail">Correo electrónico: <svg class="bi bi-envelope-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                                            </svg>
                                            </label>
                                            <input type="email" id="mail" name="mail" class="form-control" required value="<?php echo $email ?>">
					    <div id="invalid_email" class="invalid-feedback"><p></p></div>
                                        </div>
                                        <div class="col">
                                            <label for="telefono" required>Número telefónico: </label>
                                            <input type="text" id="telefono" name="telefono" class="form-control" required value="<?php echo $telefono ?>">
					    <div id="invalid_telefono" class="invalid-feedback"><p></p></div>
                                        </div>
                                        <div class="col">
                                            <label for="cel">Celular: <svg class="bi bi-phone" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M11 1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
                                                <path fill-rule="evenodd" d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                            </svg></label>
                                            <input type="text" id="cel" name="cel" required class="form-control" value="<?php echo $celular; ?>">
					    <div id="invalid_celular" class="invalid-feedback"><p></p></div>
                                        </div>
                                    </div>
                                    <label for="direccion">Dirección: <svg class="bi bi-map" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M15.817.613A.5.5 0 0 1 16 1v13a.5.5 0 0 1-.402.49l-5 1a.502.502 0 0 1-.196 0L5.5 14.51l-4.902.98A.5.5 0 0 1 0 15V2a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0l4.902.98 4.902-.98a.5.5 0 0 1 .415.103zM10 2.41l-4-.8v11.98l4 .8V2.41zm1 11.98l4-.8V1.61l-4 .8v11.98zm-6-.8V1.61l-4 .8v11.98l4-.8z"/>
                                    </svg></label>
                                    <div class="form-row">
                                        <div class="col-md-7">
                                            <input type="text" id="direccion" name="direccion" class="form-control" required value="<?php echo $direccion; ?>">
					    <div id="invalid_direccion" class="invalid-feedback"><p></p></div>
                                        </div>
                                        <div class="col-md">
                                            <input type="text" id="municipio" name="municipio" class="form-control" required value="<?php echo $municipio; ?>">
					    <div id="invalid_municipio" class="invalid-feedback"><p></p></div>
                                        </div>
                                        <div class="col-md">
                                            <input type="text" id="codigo_postal" name="codigo_postal" class="form-control" required value="<?php echo $cp; ?>">
					    <div id="invalid_codigo_postal" class="invalid-feedback"><p></p></div>
                                        </div>
                                    </div>
                                </div>
							</div>
						</fieldset>
                    </div>
                    <br>
                    <div class="card bg-light mx-2 my-2 px-2 py-2">
						<fieldset id="procedencia" class="form-group">
                            <div class="card-header"><legend class="text-center">Procedencia</legend></div>
                            <div class="card-body">
                                <div class="card-text">
                                    <div class="row">
                                        <div class="col">
                                            <label for="esc-proc">Escuela de procedencia:</label>
                                            <select name="esc-proc" id="esc-proc" class="form-control" required value="<?php echo $//Terminar ?>">
                                                <option value="cecyt1">CECyT 1</option>
                                                <option value="cecyt2">CECyT 2</option>
                                                <option value="cecyt3">CECyT 3</option>
                                                <option value="cecyt4">CECyT 4</option>
                                                <option value="cecyt5">CECyT 5</option>
                                                <option value="cecyt6">CECyT 6</option>
                                                <option value="cecyt7">CECyT 7</option>
                                                <option value="cecyt8">CECyT 8</option>
                                                <option value="cecyt9">CECyT 9</option>
                                                <option value="cecyt10">CECyT 10</option>
                                                <option value="cecyt11">CECyT 11</option>
                                                <option value="cecyt12">CECyT 12</option>
                                                <option value="cecyt13">CECyT 13</option>
                                                <option value="cecyt14">CECyT 14</option>
                                                <option value="cecyt15">CECyT 15</option>
                                                <option value="cecyt16">CECyT 16</option>
                                                <option value="otra">Otra</option>
                                            </select>
										</div>
                                    </div>
                                </div>
                            </div>
						</fieldset>
					</div>
                    <div class="text-center container">
						<button type="button" class="btn btn-secondary" id="modificar">Modificar</button>
						<button type="submit" class="btn btn-secondary" id="save">Guardar y salir</button>
					</div>
                </form>
            </div>
		</div>
	</body>
</html>
