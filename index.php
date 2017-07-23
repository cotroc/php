<?php
	include_once (__DIR__."/auxiliar/control.php");
	include_once (__DIR__."/database/usuarioDb.php");
	session_start();

	/*
	/index.php
	Pagina principal.
	Si hay un usario logeado
	muestra una lista de tecnicos disponibles.
	*/

 ?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Inicio</title>
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
						<?php
							if(isset($_SESSION['cedula'])) {
								echo "<label>Lista de Tecnicos</label>
								<table class='table'>
									<tr>
										<th>Cedula</th>
										<th>Nombre</th>
										<th>Apellido</th>
									</tr>";
											$reps = new usuarioDb();
											$lista = $reps->listarTecnicos();
												while ($row = mysqli_fetch_array($lista)) {
													echo "<tr>
													<td>$row[1]</td>
													<td>$row[2]</td>
													<td>$row[3]</td>
													</tr>";
												}
									echo "</table>";
							} else {
								echo "<h3>Pagina Principal</h3><br><br><label>Requiere inicio de sesion</label>";
							}
						 ?>
					</div>
					<div class="col-sm-4">
						<?php include_once (__DIR__."/menu/info.php"); ?>
					</div>
				</div>
			</div>
	</body>
</html>
