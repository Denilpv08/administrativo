function agregarCategoria() {
	var  categoria = $('#nombre_categoria').val();
	if (categoria == "") {
		swal("Debes de agregar una categoria");
			return false;
	} else {
		$.ajax({
			type:"POST",
			data:"categoria=" + categoria,
			url:"../procesos/categoria/agregar_categoria.php",
			success:function(respuesta){
				respuesta = respuesta.trim();
				if (respuesta == 1) {
					$('#Tabla_Categoria').load("categorias/Tabla_Categoria.php");
					$('#nombre_categoria').val("");
					swal(":D", "agregado con exito", "success");
				} else {
					swal(":(", "Fallo al agregar", "error");
				}
			}
		});
	}
}

function eliminarCategoria(idCategoria) {
	idCategoria = parseInt(idCategoria);
	if (idCategoria < 1) {
		swal("No tienes la ID de la categoria");
		return false;
	} else {
		swal({title: "Estas seguro de eliminar esta categoria?",
			  text: "Una vez eliminada, no podra recuperarse!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
		.then((willDelete) => {
		  if (willDelete) {
		  		$.ajax({
		  			type:"POST",
		  			data:"idCategoria=" + idCategoria,
		  			url:"../procesos/categoria/eliminar_categoria.php",
		  			success:function(respuesta){
		  				respuesta = respuesta.trim();
		  				if (respuesta == 1) {
		  					$('#Tabla_Categoria').load("categorias/Tabla_Categoria.php");
		  					swal("eliminado con exito", {icon: "success",});
		  				} else {
		  					swal(":(", "Fallo al eliminar", "error");
		  				}
		  			}
		  		});
		  }
		});
	}
}

function editarCategoria(idCategoria) {
	$.ajax({
		type:"POST",
		data:"idCategoria=" + idCategoria,
		url:"../procesos/categoria/editarCategoria.php",
		success:function(respuesta){
			respuesta = jQuery.parseJSON(respuesta);

			$('#idCategoria').val(respuesta['idCategoria']);
			$('#CategoriaU').val(respuesta['nombreCategoria']);
		}
	});
}

function actulizaCategoria(){
	if ($('#CategoriaU').val() == "") {
		swal("No hay categoria");
		return false;
	} else {
		$.ajax({
			type:"POST",
			data:$('#frmActulizar').serialize(),
			url:"../procesos/categoria/actulizarCategoria.php",
			success:function(respuesta){
				respuesta = respuesta.trim();

				if (respuesta == 1) {
					$('#Tabla_Categoria').load("categorias/Tabla_Categoria.php");
					swal(":D", "Actulizado con exito", "success");
				} else {
					swal(":(", "Error al actulizar", "error");
				}
			}
		});
	}
}
