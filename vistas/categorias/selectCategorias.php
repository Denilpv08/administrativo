<?php 
	
	session_start();
	require_once "../../clases/Conexion.php";
	$C = new Conectar();
	$conexion = $C->Conexion();
	$idUsuario = $_SESSION['idUsuario'];
	$sql = "SELECT id_categoria, nombre 
			FROM  t_categorias
			WHERE id_usuario = '$idUsuario'";
	$result = mysqli_query($conexion, $sql);

 ?>

 <select name="categoriasArchivos" id="categoriasArchivos" class="form-control">
 	<?php 
 		while($mostrar = mysqli_fetch_array($result)){
 		$idCategoria = $mostrar['id_categoria'];
 	 ?>
 	 <option value="<?php echo $idCategoria ?>"><?php echo $mostrar['nombre']; ?></option>	
 	 <?php 
 	 	}
 	  ?>
 </select>