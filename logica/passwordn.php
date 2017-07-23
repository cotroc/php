<?php
	include_once __DIR__."/../database/usuarioDb.php";
	include_once __DIR__."/../auxiliar/control.php";
	session_start();
	controlSesion();

	/*
	/logica/passwordn.php
	Procesa el formulario de cambio de password.
	Verifica primero que el actual es correcto.
	Doble verificacion de el password nuevo.
	Si todo es correcto realiza el Cambio
	en la base de datos.
	*/

	if(isset($_REQUEST['cambiar'])){
		$userCedula = $_SESSION['cedula'];
		$contrasena = md5($_REQUEST['anterior']);
		$npassword = md5($_REQUEST['nueva']);
		$confirmar = md5($_REQUEST['confirmar']);
		$usuario = new usuarioDb();

		if(!$usuario->logearUsuario($userCedula, $contrasena)) {
			controlRedirect("/../password.php");
			controlSetMensaje("Contrasena incorrecta");

			var_dump($usuario->logearUsuario($userCedula, $contrasena));
		} else {
			if($npassword == $confirmar){
				$usuario->cambiarPassword($userCedula, $npassword);
				controlRedirect("/../password.php");
				controlSetMensaje("Cambio realizado");

			} else{
					controlRedirect("/../password.php");
					controlSetMensaje("Las contrasenas no coinciden");
			}

		}
	} else {
		controlRedirect("/../index.php");
	}
?>
