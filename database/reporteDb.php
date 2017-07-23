<?php
	include_once __DIR__."/../database/conDb.php";

	/*
	/database/reporteDb.php
	Clase que maneja el objeto reporteDb
	y se comunica con la base de datos,
	a traves de conDb.php de la cual hereda.
	*/

	class reporteDb extends conDb {

		var $id;
		var $estado;
		var $fcreado;
		var $tecnico;
		var $fcierre;
		var $comentario;

		//Metodo constructor, carga los datos para la conexion con la database.
		function __construct() {
			$servidor = "localhost";
			$usuario = "root";
			$password = "";
			$base = "Datastorage";
			parent::__construct($servidor, $usuario, $password, $base);
		}

		//Crea un reporte, recibe como parametro un objeto reporteDb.
		function nuevoReporte(reporteDb $reporte) {
			$consulta = "INSERT INTO reportes (estado, fcreado, tecnico, comentario)
							VALUES ('$reporte->estado', '$reporte->fcreado', '$reporte->tecnico', '$reporte->comentario')";
			$resultado = parent::ejecutarConsulta($consulta);
			return $resultado;

		}

		//Elimina un reporte por su id.
		function eliminarReporte($id) {
			$consulta = "DELETE FROM reportes WHERE id = '$id'";
			$resultado = parent::ejecutarConsulta($consulta);
			return $resultado;
		}

		//Modifica un reporte, recibe como parametro un pbjeto reporteDb.
		function modificarReporte(reporteDb $reporte) {
			$consulta = "UPDATE reportes SET `estado` = 'modificado', `comentario` = '$reporte->comentario' WHERE `id` = '$reporte->id'";
			$resultado = parent::ejecutarConsulta($consulta);
			return $resultado;
		}

		//Cierra un reporte segun su id.
		function cerrarReporte($id) {
			$fecha = date_create();
			$fcierre = date_format($fecha, 'Y-m-d H:i:s');
			$consulta = "UPDATE reportes SET estado = 'cerrado', fcierre = '$fcierre' WHERE id = $id";
			$resultado = parent::ejecutarConsulta($consulta);
			return $resultado;
		}

		//Lista todos los reportes existentes.
		function listarReportes() {
			$consulta = 'SELECT * FROM reportes, usuarios where reportes.tecnico = usuarios.id';
			$resultado = parent::ejecutarConsulta($consulta);
			return $resultado;
		}

		//Lista reportes segun una fecha especifica o un rango de fechas.
		function listarReportesPorFecha($fdesde, $fhasta) {
			$consulta = "SELECT * FROM reportes, usuarios where reportes.tecnico = usuarios.id and (fcreado BETWEEN '$fdesde' and '$fhasta')";
			$resultado = parent::ejecutarConsulta($consulta);
			return $resultado;
		}

		//Selecciona un solo reporte, segun su id.
		function reportePorId($id) {
			$consulta = "SELECT * FROM reportes WHERE id = '$id'";
			$resultado = parent::ejecutarConsulta($consulta);
			$registro = parent::retornarRegistros($resultado);
			$reporte = new reporteDb();
			$reporte->id = $registro['id'];
			$reporte->estado = $registro['estado'];
			$reporte->fcreado = $registro['fcreado'];
			$reporte->tecnico = $registro['tecnico'];
			$reporte->comentario = $registro['comentario'];
			return $reporte;
		}
	}
?>
