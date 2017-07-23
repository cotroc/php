<?php
	include_once __DIR__."/../database/conDb.php";

	/*
	/database/usuarioDb.php
	Clase que maneja el objeto usuarioDb
	y se comunica con la base de datos,
	a traves de conDb.php de la cual hereda.
	*/

	class usuarioDb extends conDb{

		var $id;
		var $cedula;
		var $contrasena;
		var $nombre;
		var $apellido;
		var $cargo;

		function __construct(){
			$servidor = "localhost";
			$usuario = "root";
			$password = "";
			$base = "Datastorage";
			parent::__construct($servidor, $usuario, $password, $base);
		}

		//Verifica si la cedula existe.
		function existeCedula($userCedula) {
			$consulta = "SELECT * FROM usuarios WHERE cedula = '$userCedula'";
			$resultado = parent::ejecutarConsulta($consulta);
			$cantidad = parent::cantidadRegistros($resultado);
			if($cantidad == 0) {
				return false;
			} else {
				return true;
			}
		}

		//Crea un usuario, recibe como parametro un objeto usuarioDb.
		function altaUsuario(usuarioDb $usuario){
			$consulta = "INSERT INTO usuarios (cedula, nombre, apellido, cargo, contrasena)
									VALUES ('$usuario->cedula', '$usuario->nombre', '$usuario->apellido', '$usuario->cargo', md5('abc123'))";
			$resultado = parent::ejecutarConsulta($consulta);
			return $resultado;
		}

		//Verifica que el usuario existe y crea la sesion.
		function logearUsuario($uCed, $uCont){
			$consulta = "SELECT * FROM usuarios WHERE cedula = '$uCed'  and contrasena = '$uCont'";
			$resultado = parent::ejecutarConsulta($consulta);
			if(parent::cantidadRegistros($resultado) > 0) {
				$logeado = mysqli_fetch_array($resultado);
				$_SESSION['cedula'] = $logeado['cedula'];
				$_SESSION['nombre'] = $logeado['nombre'];
				$_SESSION['apellido'] = $logeado['apellido'];
				$_SESSION['cargo'] = $logeado['cargo'];
				$_SESSION['contrasena'] = $logeado['contrasena'];
				return true;
			} else {
				return false;
			}
		}

		//Cambia el password de los usuarios.
		function cambiarPassword($userCedula, $npassword) {
			$consulta = "UPDATE usuarios SET contrasena= '$npassword' WHERE cedula = '$userCedula'";
			$resultado = parent::ejecutarConsulta($consulta);
			return $resultado;
		}

		//Lista los tecnicos disponibles.
		function listarTecnicos() {
			$consulta = "SELECT * FROM usuarios WHERE cargo = 'tecnico'";
			$resultado = parent::ejecutarConsulta($consulta);
			return $resultado;
		}

		//Selecciona un usuario segun su cedula.
		function usuarioPorCedula($cedula) {
			$consulta = "SELECT * FROM usuarios WHERE cedula = $cedula";
			$resultado = parent::ejecutarConsulta($consulta);
			$registro = parent::retornarRegistros($resultado);
			return $registro;
		}
	}
 ?>
