<?php
	session_start();
	include_once __DIR__."/../objetos/Usuario.php";
	include_once __DIR__."/../auxiliar/control.php";
	include_once __DIR__."/../database/usuarioDb.php";

	/*
	/logica/altausuario.php
	Procesa el formulario de usuario nuevo.
	Verifica que la cedula no existe
	e inserta el usuario.
	*/
	if(controlPermiso()){
		if(isset($_REQUEST['cedula'])){
			$userCedula = $_REQUEST['cedula'];
			$userNombre = $_REQUEST['nombre'];
			$apellido = $_REQUEST['apellido'];
			$cargo = $_REQUEST['cargo'];
			$user = new usuarioDb();
			$user->cedula = $userCedula;
			$user->nombre = $userNombre;
			$user->apellido = $apellido;
			$user->cargo = $cargo;

			if($user->existeCedula($userCedula)) {
				controlRedirect("../altausuario.php");
				controlSetMensaje("La cedula ya existe");

			} else {
				if($user->altaUsuario($user)) {
					controlRedirect("../altausuario.php");
					controlSetMensaje("Alta correcta: $userNombre");

				} else {
					controlSetMensaje("Error al ingresar");
					controlRedirect("../altausario.php");
				}
			}

		}else {
			controlRedirect("../altausario.php");
			controlSetMensaje("No hay datos");

		}
	}else{
		controlRedirect("index.php");
		controlSetMensaje("Permiso insuficiente");

	}
?>
