<?php
	if(isset($_SESSION['cedula'])) {
		$valueini = "Inicio";
		$enlace = "index.php";
		if($_SESSION['cargo'] == 'supervisor') {
			$hrefaltau = "altausuario.php";
			$hrefaltar = "/altareporte.php";
			$classbtn = "btn btn-info";
		} else {
			$hrefaltau = "#";
			$hrefaltar = "#";
			$classbtn = "btn btn-default";
		}
	} else {
		$valueini = "Iniciar Sesion";
		$enlace = "servicio.php";
		$hrefaltau = "altausuario.php";
		$hrefaltar = "/altareporte.php";
		$classbtn = "btn btn-info";
	}
 ?>
 <div>
	 <h2><span class='label label-pill label-default' >Menu</span></h2>
	 <a href=<?php echo "'$enlace'" ?> class='btn btn-info' role='button' style='width:150px'><?php echo "$valueini" ?></a><br><br>
	 <a href=<?php echo "'$hrefaltau'" ?> class=<?php echo "'$classbtn'" ?> role='button' style='width:150px'>Alta de Usuarios</a><br><br>
	 <a href=<?php echo "'$hrefaltar?var=nuevo'" ?> class=<?php echo "'$classbtn'" ?> role='button' style='width:150px'>Nuevo Reporte</a><br><br>
	 <a href='/reportes.php' class='btn btn-info' role='button' style='width:150px'>Reportes</a><br><br>
	 <a href="password.php" class='btn btn-info' role='button' style='width:150px'>Cambiar Password</a><br><br>
	 <a href='logica/logout.php' class='btn btn-info' role='button' style='width:150px'>Cerrar Sesion</a><br><br>
 </div>
