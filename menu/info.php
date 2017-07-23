<?php
	if(isset($_SESSION['nombre'])){
		$nombre = $_SESSION['nombre'];
		$nombre = $nombre." / ".$_SESSION['cargo'];
	} else {
		$nombre = "invitado";
	}
 ?>
<div>
	<h2><span class='label label-pill label-default' >Hola <?php echo "$nombre"; ?></span></h2>
	<?php controlMensaje(); ?>
</div>
