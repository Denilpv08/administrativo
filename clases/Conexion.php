<?php

	class Conectar{
		public function Conexion() {
			$servidor = "localhost";
			$usuario = "root";
			$password = "Dp119277";
			$base = "dbgestor";

			$conexion = mysqli_connect(
				$servidor,
				$usuario,
				$password,
				$base
			);
			$conexion->set_charset('utf8mb4');
			return $conexion;
		}
	}

?>