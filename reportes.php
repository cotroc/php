<?php
	include_once (__DIR__."/database/reporteDb.php");
	include_once (__DIR__."/auxiliar/control.php");
	session_start();
	controlSesion();

	/*
	/reportes.php
	Pagina que muestra la lista de todos
	los reportes existentes.
	Si el usuario es un tecnico no podra
	cerrar o borrar reportes.
	*/
	
	if($_SESSION['cargo'] == "tecnico") {
		$btnborrar = "disabled";
		$btncerrar = "disabled";
	} else {
		$btnborrar = "";
		$btncerrar = "";
	}
 ?>
 <!doctype html>
 <html>
	<head>
		<meta charset="utf-8"/>
		<title>Listado de Reportes</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
		integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
		integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php include_once (__DIR__."/menu/menu.php"); ?>
				</div>
				<div class="col-sm-6" style="padding-top:20px;">
					<form action="altareporte.php" method="post">
							<input type="submit" name="modificar" value="Modificar" size="20" class="btn btn-info">
							<input type="submit" name="borrar" value="Borrar" size="20" class="btn btn-info" <?php echo $btnborrar; ?>>
							<input type="submit" name="cerrar" value="Cerrar" class="btn btn-info" <?php echo $btncerrar; ?>>
							<a href="reportesfecha.php" class='btn btn-info' role='button' style='width:150px'>Por fecha</a>
						<table class="table">
							<tr>
								<th>id</th>
								<th>Estado</th>
								<th>Creado</th>
								<th>Tecnico</th>
								<th>Cerrado</th>
								<th>Comentario</th>
							</tr>
								<?php
									$reps = new reporteDb();
									$lista = $reps->listarReportes();
										while ($row = mysqli_fetch_array($lista)) {
											echo "<tr>
											<td><input type='radio' name='id' value='$row[0]'</td>
											<td>$row[1]</td>
											<td>$row[2]</td>
											<td>$row[8]</td>
											<td>$row[4]</td>
											<td>$row[5]</td>
											</tr>";
										}
								?>
						</table>
					</form>
				</div>
				<div class="col-sm-3">
					<?php include_once (__DIR__."/menu/info.php"); ?>
				</div>
			</div>
		</div>
	</body>
 </html>
