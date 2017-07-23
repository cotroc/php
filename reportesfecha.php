<?php
	include_once (__DIR__."/auxiliar/control.php");
	include_once (__DIR__."/database/reporteDb.php");
	session_start();

	/*
	/reportesporfecha.php
	Formulario para listar reportes
	filtrados por fecha.
	*/
 ?>
 <!doctype html>
 <html>
	<head>
		<meta charset="utf-8"/>
		<title>Reportes por Fecha</title>
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
					<form method="post" action="reportesfecha.php">
						<input type="submit" name="filtrar" value="Filtrar" class="btn btn-info">
						<a href="reportes.php" class='btn btn-info' role='button' style='width:150px'>Volver</a><br><br>
						<fieldset class="form-group">
							<label for="fdesde">Desde</label>
							<input type="date" name="fdesde">
						</fieldset>
						<fieldset class="form-group">
							<label for="fhasta">Hasta</label>
							<input type="date" name="fhasta">
						</fieldset>
					</form>
					<table class="table">
						<tr>
							<th>id</th>
							<th>Estado</th>
							<th>Creado</th>
							<th>Tecnico</th>
							<th>Cierre</th>
							<th>Comentario</th>
						</tr>
							<?php
								if(isset($_REQUEST['filtrar'])) {
									$fdesde = $_REQUEST['fdesde']." 00:00:00";
									$fhasta = $_REQUEST['fhasta']." 23:59:59";
								$reps = new reporteDb();
								$lista = $reps->listarReportesPorFecha($fdesde, $fhasta);
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
								}
							?>
					</table>
				</div>
				<div class="col-sm-3">
				  <?php include_once (__DIR__."/menu/info.php"); ?>
				</div>
			</div>
		</div>
	</body>
 </html>
