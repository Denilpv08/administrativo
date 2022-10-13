<?php
session_start();

	if (isset($_SESSION['usuario'])) {
		include "header.php";
		?>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="jumbotron">
						  <h1 class="display-4">Bienvenido, al gestor de archivo</h1>
						  <p class="lead">Esta pagina esta basada para facilitar su manejo de como almacenamineto de archivos para tener un orde en sus archivos y se vea profecional</p>
						  <hr class="my-4">
						  <br>
					</div>
				</div>
			</div>
		</div>
	<?php
		include "footer.php";
	} else {
		header("location:../index.php");
	}
?>

