<?php

	require_once "../../../clases/Usuario.php";

	$password = sha1($_POST['password']);
	$fecha_nacimiento = explode("-", $_POST['fecha_nacimiento']);
	$fecha_nacimiento = $fecha_nacimiento[2] . "-" . $fecha_nacimiento[1] . "-" . $fecha_nacimiento[0];
	$datos = array(
		"nombre" => $_POST['nombre'],  
    	"fecha_nacimiento" => $fecha_nacimiento,  
    	"correo" => $_POST['correo'],  
    	"usuario" => $_POST['usuario'],
    	"password" => $password  
	);

	$usuario = new Usuario();
	echo $usuario->Agregar_Usuario($datos);

?>