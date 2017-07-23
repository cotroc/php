<?php
	include_once (__DIR__."/auxiliar/control.php");
	session_start();

	/*
	/servicio.php
	Formulario de inicio de sesion.
	*/
 ?>
 <!doctype html>
 <html>
	<head>
		<meta charset="utf-8"/>
		<title>Servicio Técnico</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
		integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
		integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<?php include_once (__DIR__."/menu/menu.php"); ?>
				</div>
				<div class="col-sm-4" style="padding-top:20px;">
					<form method="post" action="logica/logear.php">
						<table align="center">
							<tr>
								<td><label>Usuario: <label></td>
								<td><input type="number" name="cedula" required="true"></td>
							</tr>
							<tr>
								<td><label>Password: </label></td>
								<td><input type="password" name="contrasena" required="true"></td>
							</tr>
							<tr>
								<td><input type="submit" name="ingresar" value="Ingresar" class="btn btn-info"></td>
							</tr>
						</table>
					</form>
				</div>
				<div class="col-sm-4">
					<?php include_once (__DIR__."/menu/info.php"); ?>
				</div>
			</div>
		</div>
	</body>
 </html>
