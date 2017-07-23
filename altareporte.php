<?php
	require_once (__DIR__."/database/usuarioDb.php");
	require_once (__DIR__."/database/reporteDb.php");
	require_once (__DIR__."/auxiliar/control.php");
	session_start();
	controlSesion();

	/*
	/altareporte.php
	Formulario para el alta de los reportes.
	Tambien procesa la informacion necesaria
	para modificar, borrar o cerrar reportes.
	*/
	
	$rep = new reporteDb();
	if(isset($_REQUEST['id'])) {
		$id = $_REQUEST['id'];

		if(isset($_REQUEST['borrar'])) {
			$rep->eliminarReporte($id);
			controlRedirect("reportes.php");
			controlSetMensaje("Reporte $id eliminado con exito");

		} elseif (isset($_REQUEST['modificar'])) {
			$rep = $rep->reportePorId($id);
			$_SESSION['id'] = $id;

		} elseif(isset($_REQUEST['cerrar'])) {
			$rep->cerrarReporte($_REQUEST['id']);
			controlRedirect("reportes.php");
			controlSetMensaje("Reporte cerrado.");
		}

	} elseif(isset($_REQUEST['var'])) {
		$rep->estado = "abierto";
		$rep->fcreado = null;
		$rep->tecnico = null;
		$rep->comentario = null;

	} else {
		controlRedirect("reportes.php");
		controlSetMensaje("Seleccionar para modificar, cerrar o borrar.");
	}
 ?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Reportes</title>
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
					<form action="logica/altareporte.php" method="post">

						<fieldset class="form-group">
							<label for="estado">Estado: </label>
							<label name="estado"><?php echo "$rep->estado"; ?></label>
						</fieldset>

						<fieldset class="form-group">
							<label for="fcreado">Abierto el</label>
							<label><?php echo "$rep->fcreado"; ?></label>
						</fieldset>

						<fieldset class="form-group">
							<label for="tecnico">Tecnico</label>
							<select name="tecnico">
								<?php
									$tecnicos = new usuarioDb();
									$tecnicos = $tecnicos->listarTecnicos();
									while ($rows = mysqli_fetch_array($tecnicos)){
										if($rows['id'] == $rep->tecnico) {
 											echo "<option value=".$rows['id']." selected>".$rows['nombre']."</option>";
 										} else {
 											echo "<option value=".$rows['id'].">".$rows['nombre']."</option>";
 										}
									}
								?>
							</select>
						</fieldset>
						<fieldset class="form-group">
							<label for="comentario">Comentario</label>
							<textarea class="form-control" rows="5" name="comentario"><?php echo "$rep->comentario";?></textarea>
						</fieldset>
						<?php
							if($rep->tecnico != null) {
								$submit = "Modificar";
								$subname = "modificar";
								$disabled = "";
								if($rep->estado == 'cerrado') {
									$disabled = "disabled";
								}
							} else {
								$submit = "Nuevo";
								$subname = "nuevo";
								$disabled = "";
							}
						?>
						<input type="submit" value=<?php echo "'$submit'"?> name=<?php echo "'$subname'"?> class="btn btn-info" <?php echo "$disabled"; ?>>
						<a href="reportes.php" class='btn btn-info' role='button' style='width:150px'>Volver</a>
					</form>
				</div>
				<div class="col-sm-4">
					<?php include_once (__DIR__."/menu/info.php"); ?>
				</div>
			</div>
		</div>
	</body>
</html>
