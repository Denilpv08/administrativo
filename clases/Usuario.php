<?php

	require_once "Conexion.php";

	class Usuario extends Conectar{
		public function Agregar_Usuario($datos){
			$conexion = Conectar::Conexion();

			if (self::Buscar_Usuario_Repetido($datos['usuario'])) {
				return 2;
			} else {
				$sql = "INSERT INTO t_usuarios (nombre,
											fechaNacimiento,
											email,
											usuario,
											password) 
						VALUES (?, ?, ?, ?, ?)";
				$query = $conexion->prepare($sql);
				$query->bind_param('sssss', $datos['nombre'],
										$datos['fecha_nacimiento'],
										$datos['correo'],
										$datos['usuario'],
										$datos['password']);
				$exito = $query->execute();
				$query->close();
				return $exito;
			}
		}

		public function Buscar_Usuario_Repetido($usuario) {
			$conexion = Conectar::Conexion();
			$sql = "SELECT usuario
			 		FROM t_usuarios 
			 		WHERE usuario = '$usuario'";
			$result = mysqli_query($conexion, $sql);
			$datos = mysqli_fetch_array($result);

			if ($datos['usuario'] != "" || $datos['usuario'] == $usuario) {
				return 1;
			}else {
				return 0;
			}
		}

		public function login($usuario, $password) {
			$conexion = Conectar::Conexion();

			$sql = "SELECT count(*) AS existeUsuario
					FROM t_usuarios
			 		WHERE usuario = '$usuario' 
			 		AND password = '$password'";
			$result = mysqli_query($conexion, $sql);

			$respuesta = mysqli_fetch_array($result)['existeUsuario'];

			if ($respuesta > 0) {
				$_SESSION['usuario'] = $usuario;

				$sql = "SELECT id_usuario
						FROM t_usuarios
			 			WHERE usuario = '$usuario' 
			 			AND password = '$password'";
			 	$result = mysqli_query($conexion, $sql);
			 	$idUsuario = mysqli_fetch_row($result)[0];

			 	$_SESSION['idUsuario'] = $idUsuario;

			 	return 1;
			} else {
				return 0;
			}
		}
	}

?>