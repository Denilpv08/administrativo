<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Login</title>
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <link rel="stylesheet" type="text/css" href="librerias/bootstrap4/bootstrap.min.css">
</head>
<body>
	<div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->

      <!-- Icon -->
      <div class="fadeIn first">
        <img src="img/logo.jpg" id="icon" alt="User Icon" />
        <h1>Gestor de archivos</h1>
      </div>

      <!-- Login Form -->
      <form method="post" id="frmLogin" onsubmit="return logear()">
        <input type="text" id="login" class="fadeIn second" name="login" placeholder="username" 
        required="">
        <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required="">
        <input type="submit" class="fadeIn fourth" value="Iniciar Sesion">
      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="registro.php">Registrar</a>
      </div>
    </div>
  </div>
  <script src="librerias/jquery-3.6.0.min.js"></script>
  <script src="librerias/sweetalert.min.js"></script>

    <script type="text/javascript">
      function logear(){
        $.ajax({
          type:"POST",
          data:$('#frmLogin').serialize(),
          url:"procesos/usuario/login/login.php",
          success:function(respuesta){
            respuesta = respuesta.trim();
            if (respuesta == 1) {
              window.location = "vistas/inicio.php";
            } else {
              swal(":(", "Error de inicio de sesion", "error");
            }
          }
        });
        return false;
      }
    </script>

</body>
</html>