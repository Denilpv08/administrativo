<?php
session_start();

	if (isset($_SESSION['usuario'])) {
		include "header.php";
		?>
		<div class="jumbotron jumbotron-fluid">
		  	<div class="container">
		    	<h1 class="display-4">Categorias</h1>
		    	<div class="row">
		    		<div class="col-sm-4">
		    			<span class="btn btn-primary" data-toggle="modal" data-target="#modal_agregar_categoria">
		    				<span class="fas fa-plus-circle"></span> Agregar Categoria
		    			</span>
		    		</div>
		    	</div>
		    	<hr>
		    	<div class="row">
		    		<div class="col-sm-12">
		    			<div id="Tabla_Categoria"></div>
		    		</div>
		    	</div>
		  	</div>
		</div>

	<!-- Modal -->
	<div class="modal fade" id="modal_agregar_categoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-sm" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Agregar nueva categoria</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form id="frmCategorias">
	        	<label>Nombre de la categoria</label>
	        	<input type="text" name="nombre_categoria" id="nombre_categoria" class="form-control">
	        </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	        <button type="button" class="btn btn-primary" id="btnGuardar">Guardar</button>
	      </div>
	    </div>
	  </div>
	</div>

<!-- Modal -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      		<form id="frmActulizar">
      			<input type="text" id="idCategoria" name="idCategoria" hidden="">
        		<label>Categoria</label>
        		<input type="text" id="CategoriaU" name="CategoriaU" class="form-control">
      		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-warning" id="btnActulizar">Actualizar</button>
      </div>
    </div>
  </div>
</div>

<?php
	include "footer.php";
?>
	<script src="../js/Categorias.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#Tabla_Categoria').load("categorias/Tabla_Categoria.php");

			$('#btnGuardar').click(function(){
				agregarCategoria();
			});

			$('#btnActulizar').click(function(){
				actulizaCategoria();
			});
		});
	</script>
<?php
	} else {
		header("location:../index.php");
	}
?>