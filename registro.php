<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Registro</title>
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="librerias/jquery-ui-1.13.1/jquery-ui.theme.css">
    <link rel="stylesheet" type="text/css" href="librerias/jquery-ui-1.13.1/jquery-ui.css">
</head>
<body>
	<div class="container">
		<h1 style="text-align: center;">Registro de usuario</h1>
		<hr>
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<form id="frmRegistro" method="post" onsubmit="return Agregar_Usuario_Nuevo()"
				autocomplete="off">
					<label>Nombre Personal</label>
					<input type="text" name="nombre" id="nombre" class="form-control" required="">
					<label>Fecha de nacimiento</label>
					<input type="text" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" required="" readonly="">
					<label>Email o Correo</label>
					<input type="email" name="correo" id="correo" class="form-control" required="">
					<label>Nombre de usuario</label>
					<input type="text" name="usuario" id="usuario" class="form-control" required="">
					<label>Password o Contraseña</label>
					<input type="password" name="password" id="password" class="form-control" required="">
					<br>
					<div class="row">
						<div class="col-sm-6 text-left">
							<button class="btn btn-primary">Registrar</button>
						</div>
						<div class="col-sm-6 text-right">
							<a href="index.php" class="btn btn-success">Iniciar Sesion</a>
						</div>
					</div>	
				</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
	<script src="librerias/jquery-3.6.0.min.js"></script>
	<script src="librerias/jquery-ui-1.13.1/jquery-ui.js"></script>
	<script src="librerias/sweetalert.min.js"></script>

	<script type="text/javascript">

		$(function(){
			var fechaA = new Date();
			var yyyy = fechaA.getFullYear();

			$("#fecha_nacimiento").datepicker({
				changeMonth: true,
				changeYear: true,
				yearRange: '1900:' + yyyy,
				dateFormat: "dd-mm-yy"
			});
		});

		function Agregar_Usuario_Nuevo(){
			$.ajax({
				method: "POST",
				data: $('#frmRegistro').serialize(),
				url: "procesos/usuario/registro/Agregar_Usuario.php",
				success:function(respuesta){
					respuesta = respuesta.trim();

					if (respuesta == 1) {
						$("#frmRegistro")[0].reset();
						swal(":D", "Agrego con exito", "success");
					} else if(respuesta == 2){
						swal("Este usuario ya existe, por favor digiste uno nuevo");

					} else {
						swal(":(", "Error al agregar", "Error");
					}
				}
			});	
			return false;		
		}
	</script>
</body>
</html>