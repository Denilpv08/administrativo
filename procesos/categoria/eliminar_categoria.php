<?php 

	session_start();
	require_once "../../clases/Categorias.php";
	$Categorias = new Categorias();
	
	echo $Categorias->eliminar_categoria($_POST['idCategoria']);
 ?>