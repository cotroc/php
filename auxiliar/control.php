<?php

	//Controla que existe una sesion iniciada, si no es asi regresa al inicio.
	function controlSesion() {
		if(isset($_SESSION['cedula'])) {
			return true;
		} else {
			$_SESSION['mensaje'] = "Requiere iniciar Sesion.";
			controlRedirect("/../index.php");
		}
	}

	//Verifica que el usuario sea supervisor.
	function controlPermiso() {
		if($_SESSION['cargo'] == 'supervisor') {
			return true;
		} else {
		return false;
		}
	}

	//Crea un mensaje en la sesion para ser utilizado luego.
	function controlSetMensaje($mensaje) {
		$_SESSION['mensaje'] = $mensaje;
	}

	//Muestra mensajes de la sesion.
	function controlMensaje() {
		if(isset($_SESSION['mensaje'])) {
			echo $_SESSION['mensaje'];
			unset($_SESSION['mensaje']);
		}
	}

	//Redirecciona dentro del sitio.
	function controlRedirect($pagina) {
		header("Location: $pagina");
	}
?>
