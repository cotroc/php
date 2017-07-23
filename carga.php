<?php

	/*
	/carga.php
	Scrip de inicio.
	Genera la base de datos si no existe,
	genera las tablas necesarias para el
	funcionamiento de la aplicacion y
	por ultimo agrega datos para poder
	hacer pruebas.
	*/

	$conexion = mysqli_connect("127.0.0.1", "root", "");
	echo "Servidor: '127.0.0.1' / Usuario: 'root' / No requiere password.<br>";
	$consulta = "CREATE DATABASE IF NOT EXISTS `datastorage` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;";
	$exe = mysqli_query($conexion, $consulta);
	mysqli_select_db($conexion, 'datastorage');
	echo "Base 'datastorage' creada? ";
	var_dump($exe); echo "<br>";

	$consulta = "CREATE TABLE `usuarios` (
				  `id` int(11) Primary Key AUTO_INCREMENT NOT NULL,
				  `cedula` int(11) NOT NULL,
				  `nombre` varchar(128) NOT NULL,
				  `apellido` varchar(128) NOT NULL,
				  `cargo` enum('supervisor','tecnico') NOT NULL,
				  `contrasena` varchar(32) NOT NULL
				) ENGINE=InnoDB";
	$exe = mysqli_query($conexion, $consulta);
	echo "Tabla 'usuarios' creada? ";
	var_dump($exe); echo "<br>";

	$consulta = "CREATE TABLE `reportes` (
				  `id` int(11) Primary Key AUTO_INCREMENT NOT NULL,
				  `estado` enum('abierto','cerrado','modificado') NOT NULL,
				  `fcreado` timestamp NULL DEFAULT NULL,
				  `tecnico` int(11) NOT NULL,
				  `fcierre` timestamp NULL DEFAULT NULL,
				  `comentario` varchar(128) NOT NULL,
				  FOREIGN KEY (`tecnico`) REFERENCES `usuarios`(`id`) ON DELETE CASCADE
				) ENGINE=InnoDB";
	$exe = mysqli_query($conexion, $consulta);
	echo "Tabla 'reportes' creada? ";
	var_dump($exe); echo "<br>";

	$consulta = "INSERT INTO usuarios (cedula, nombre, apellido, cargo, contrasena) VALUES
							(12345678, 'Marco', 'Antonio', 'supervisor', 'c8862fc1a32725712838863fb1a260b9'),
							(23456781, 'Pedro', 'Picapiedra', 'tecnico', 'e99a18c428cb38d5f260853678922e03'),
							(34567812, 'Pablo', 'Marmol', 'tecnico', 'e99a18c428cb38d5f260853678922e03'),
							(45678123, 'Vilma', 'Palma', 'tecnico', 'e99a18c428cb38d5f260853678922e03')";

	$exe = mysqli_query($conexion, $consulta);
	echo "Datos insertados en 'usuarios'? ";
	var_dump($exe); echo "<br>";

	$consulta = "INSERT INTO `reportes` (`estado`, `fcreado`, `tecnico`, `comentario`) VALUES
							('abierto', '2016-07-20 15:17:22', 2, 'Pc no enciende'),
							('abierto', '2016-07-20 15:36:39', 3, 'eL teClaDo tiEnE lucEs QUe pARPadeAn'),
							('abierto', '2016-07-20 06:56:27', 4, 'No funciona internet'),
							('abierto', '2016-07-20 06:56:52', 4, 'VIRUS!'),
							('abierto', '2016-07-21 07:00:02', 2, 'Coca Cola en el teclado'),
							('abierto', '2016-07-21 07:00:16', 4, 'Error al actualizar windows'),
							('abierto', '2016-07-21 07:00:27', 2, 'La impresora muestra papel atascado, pero no hay nada'),
							('abierto', '2016-07-21 07:23:32', 2, 'El monitor hace ruido'),
							('abierto', '2016-07-22 04:19:54', 3, 'Disco duro lleno'),
							('abierto', '2016-07-22 04:20:12', 4, 'Sale humo de la fuente'),
							('abierto', '2016-07-22 04:20:39', 3, 'Nofuncionalabarraespaciadora!')";
	$exe = mysqli_query($conexion, $consulta);
	echo "Datos insertados en 'reportes'? ";
	var_dump($exe); echo "<br>";

	mysqli_close($conexion);
	 ?>
<!doctype html>
<body>
	<div align="center">
		<div>
			<h2>Carga completada con éxito</h2>
			<h3>Usuario Supervisor (Jefe)</h3>
			<table border="1">
				<tr>
					<th>Cedula</th>
					<th>Contraseña</th>
				</tr>
				<tr>
					<td>12345678</td>
					<td>3022</td>
				</tr>
			</table>
			<h3>Mas informacion</h3>
				<p>Existen datos de prueba ya <br>
					ingresados para poder testear <br>
					la aplicacion, como por ejemplo <br>
					tecnicos y registros con <br>
					diferentes fechas.
				</p>
				<p> Todos los tecnicos tienen <br>
					asignados por defecto la misma <br>
					contraseña. (abc123).
				</p>
				<a href="index.php">Iniciar</a>
				<br><br>
				<label>>>Silvana Garcia<<</label><br>
				<label>>>Omar Urrutia<<</label>
		</div>
	</div>
</body>
