<?php

	Class conDb{

		/*
		/database/conDb.php
		Clase que maneja la conexion
		y las consultas a la base de datos.
		*/
		private $conexion;

			//Metodo constructor.
			function __construct ($servidor, $usuario, $password, $base){
				$this->conexion = mysqli_connect($servidor, $usuario, $password, $base);
				if (!$this->conexion)
					die ("Error al conectarse al Servidor");
			}

			//Selecciona una base de datos dentro del motor.
			function seleccionBase ($nombreBase) {
				$base = mysqli_select_db($this->conexion, $nombreBase);
				return $base;
			}

			//Ejecuta una consulta.
			function ejecutarConsulta ($consulta){
				$resultado = mysqli_query($this->conexion, $consulta);
				return $resultado;
			}

			function cantidadRegistros ($resultado){
				$cantidadRegistros = mysqli_num_rows($resultado);
				return $cantidadRegistros;
			}

			//Retorna los registros de una consulta exitosa.
			function retornarRegistros ($resultado){
				$reg = mysqli_fetch_array($resultado);
				return $reg;
			}

			//Cierra la conexion con la base.
			function cerrarConexion(){
				mysqli_close($this->conexion);
			}
	}
?>
