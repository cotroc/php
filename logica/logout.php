<?php
	session_start();
	session_unset();
	session_destroy();
	header("Location: /../index.php");
	/*
	/logica/logout.php
	Destruye los datos de la sesion,
	la cierra y vuelve al inicio.
	*/
 ?>
