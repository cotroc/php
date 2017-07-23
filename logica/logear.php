<?php
	include_once __DIR__."/../database/usuarioDb.php";
	include_once __DIR__."/../auxiliar/control.php";
	session_start();

	/*
	/logica/logear.php
	Procesa el formulario de inicio de sesion.
	*/
	if(isset($_REQUEST['ingresar'])){
		$cedula = $_REQUEST['cedula'];
		$contrasena = md5($_REQUEST['contrasena']);
		$usuario = new usuarioDb();
		if(!$usuario->logearUsuario($cedula, $contrasena)) {
			controlRedirect("../index.php");
			controlSetMensaje("Error usuario o contrasenia");

		}else {
			unset($_SESSION['mensaje']);
			controlRedirect("../index.php");
		}
	}
 ?>
