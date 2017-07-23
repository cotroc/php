<?php
	include_once (__DIR__."/auxiliar/control.php");
	session_start();
	controlSesion();

	/*
	/pasword.php
	Formulario para cambiar el password.
	*/

 ?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Opciones</title>
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
					<fieldset><legend>Cambio de Contraseña</legend>
						<form method="post" action='logica/passwordn.php'>
							<table>
								<tr>
									<td><label for='anterior'>Anterior:</label></td>
									<td><input type='password' name='anterior' size='20'></td>
								</tr>
								<tr>
									<td><label for='nueva'>Nueva:&nbsp;</label></td>
									<td><input type='password' name='nueva' size='20'></td>
								</tr>
								<tr>
									<td><label for='confirmar'>Confirmar:&nbsp;</label></td>
									<td><input type='password' name='confirmar' size='20'></td>
								</tr>
								<tr>
									<td><input type='submit' name='cambiar' value='Cambiar' class='btn btn-info' ></td>
								</tr>
							</table><br>
						</form>
					</fieldset>
				</div>
				<div class="col-sm-4">
					<?php include_once (__DIR__."/menu/info.php"); ?>
				</div>
			</div>
		</div>



	</body>
</html>
