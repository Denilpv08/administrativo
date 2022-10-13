<?php
	
	require_once "Conexion.php";
	class Categorias extends Conectar {
		public function Agregar_Categoria($datos) {
			$conexion = Conectar::Conexion();

			$sql = "INSERT INTO t_categorias (id_usuario, nombre) 
					VALUES (?, ?)";
			$query = $conexion->prepare($sql);
			$query->bind_param("is", $datos['idUsuario'],
									 $datos['categoria']);

			$respuesta = $query->execute();
			$query->close();

			return $respuesta;
		}

		public function eliminar_categoria($idCategoria) {
			$conexion = Conectar::Conexion();
			
			$sql = "DELETE FROM t_categorias 
					WHERE id_categoria = ?";	
			$query = $conexion->prepare($sql);
			$query->bind_param("i", $idCategoria);
			$respuesta = $query->execute();
			$query->close();
			return $respuesta;
		}

		public function editarCategoria($idCategoria) {
			$conexion = Conectar::Conexion();

			$sql = "SELECT id_categoria, nombre 
					FROM t_categorias 
					WHERE id_categoria = '$idCategoria'";
			$result = mysqli_query($conexion, $sql);

			$categoria = mysqli_fetch_array($result);

			$datos = array("idCategoria" => $categoria['id_categoria'], 
							"nombreCategoria" => $categoria['nombre']);
			return $datos;
		}

		public function actualizarCategoria($datos){
			$conexion = Conectar::Conexion();

			$sql = "UPDATE t_categorias 
					SET nombre = ? 
					WHERE id_categoria = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param("si", $datos['categoria'],
									 $datos['idCategoria']);
			$respuesta = $query->execute();
			$query->close();
			return $respuesta;
		}
	}

?>