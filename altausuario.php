<?php
	include_once (__DIR__."/auxiliar/control.php");
	session_start();
	controlSesion();
	/*
	/altausuario.php
	Formulario para el alta de usuarios nuevos.
	*/
	
?>
<!DOCTYPE html>
	<html>
		<head>
			<title> Nuevo Tecnico </title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
			integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
			integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		</head>
		<body>
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<?php include_once __DIR__."/menu/menu.php"; ?>
					</div>
					<div class="col-sm-4" style="padding-top:20px;">
						<form action='logica/altausuarion.php' method='post'>
							<fieldset class="form-group">
								<legend>Ingresar Datos</legend>
								<table>
									<tr>
										<td><label for='cedula'>Cedula</label></td>
										<td><input type='number' name='cedula' size='30' required="true" ></td>
									</tr>
									<tr>
										<td><label for='nombre'>Nombre</label></td>
										<td><input type='texto' name='nombre' size='20' required="true"></td>
									</tr>
									<tr>
										<td><label for='apellido'>Apellido</label></td>
										<td><input type='texto' name='apellido' size='20' required="true"></td>
									</tr>
									<tr>
										<td><label for='cargo'>Cargo</label></td>
										<td>
											<select name='cargo'>
											 <option value="tecnico">Tecnico</option>
											 <option value="supervisor">Supervisor</option>
											</select>
										</td>
									</tr>
									<tr>
										<td><input type='submit' name='cargar' value='Ingresar' class="btn btn-info"></td>
										<td align='right'><a href='index.php' class='btn btn-info' role='button' style='width:70px'>Volver</a>
								</table>
							</fieldset>
						</form>
					</div>
					<div class="col-sm-4">
						<?php include_once (__DIR__."/menu/info.php"); ?>
					</div>
				</div>
			</div>


		</body>
	</html>
