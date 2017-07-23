<?php
  include_once (__DIR__."/../database/reporteDb.php");
  include_once (__DIR__."/../auxiliar/control.php");
  session_start();
  controlSesion();

  /*
  /logica/altareporte.php
  Procesa el formulario de ingreso de reportes.
  Decide, si el reporte es nuevo, lo inserta.
  De lo contrario lo modifica.
  */
  if(!isset($_REQUEST['tecnico'])) {
    controlRedirect("/../altareporte.php");
    controlSetMensaje("Faltan datos");
  }

  if(isset($_REQUEST['nuevo'])) {
	  $reporte = new reporteDb();
	  $reporte->estado = "abierto";
	  $fecha = date_create();
	  $fcreado = date_format($fecha, 'Y-m-d H:i:s');
      $reporte->fcreado = $fcreado;
      $reporte->tecnico = $_REQUEST['tecnico'];
      $reporte->comentario = $_REQUEST['comentario'];
      $reporte->nuevoReporte($reporte);
      controlRedirect("/../reportes.php");
      controlSetMensaje("Reporte $reporte->tecnico agregado con exito");

  } elseif(isset($_REQUEST['modificar'])) {
	$reporte = new reporteDb();
	$reporte->id = $_SESSION['id'];
	$reporte->estado = "modificado";
	$reporte->comentario = $_REQUEST['comentario'];
	$reporte->modificarReporte($reporte);
  controlRedirect("/../reportes.php");
  controlSetMensaje("Reporte $reporte->id modificado con exito");
	unset($_SESSION['id']);
  }
 ?>
