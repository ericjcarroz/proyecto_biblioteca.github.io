<?php

session_start();

require "../config/conexion2.php";

require ("../procesos/registrar-libros.php");

?>



<!DOCTYPE html>
<html lang="ES">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro de Mascotas</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/estilos.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body id="top" class="">
	<?php include ("../includes/menu-navegacion.php"); ?>
	<?php include ("../includes/menu-lateral.php"); ?>


	<div class="">
		<div class="row" id="body-row">
			<div class="main-content ml-6" id="formulario-registro-libros">


				<!-- INICIO DEL FORMULARIO DE REGISTRO DE NUEVAS PUBLICACIONES -->
				<?php

				if (isset ($_SESSION['msj']) && !empty ($_SESSION['msj'])) {
					// Almacena el mensaje en una variable para mayor claridad
					$mensaje = $_SESSION['msj'];
					$tipo_mensaje = $_SESSION['tipo_msj'];

					// Limpia el mensaje de  en la sesión para que no se muestre nuevamente
					unset($_SESSION['msj']);
					unset($_SESSION['tipo_msj']);

					// Muestra la alerta de SweetAlert2 con el mensaje de error
					if ($insercion) {
						# code...
						echo "<script>
											Swal.fire({
												icon: '{$tipo_mensaje}',
												title: '¡Excelente!',
												text: '{$mensaje}'
											});
										</script>";
					}else{
						echo "<script>
											Swal.fire({
												icon: '{$tipo_mensaje}',
												title: 'Error',
												text: '{$mensaje}'
											});
										</script>";
					}
				}
				?>
				<div class="col-md-10 col-sm-12 col-xl-8 bg-white p-1 mx-auto">
					<div class="card border border-ec-4 rounded-end shadow-ec-1" id="form-mascotas">
						<div class="card-header">
							<h3 class="text-center fst-italic fw-normal" id="titulo-reg-masc">Registro de Publicaciones
							</h3>
						</div>
						<div class="card-body">
							<form action="" class="form-inline" method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<div class="col-md-12 mb-3">

										<!--<label for="txtID">ID</label>
											<input type="text" class="form-control" value="<?php echo $txtID; ?>" id="txtID" name="txtID" placeholder="ID" required readonly>-->

									</div>
								</div>
								<div class="form-group row mb-5">

									<label for="nombre_mascota" class="col-sm-2 form-label">Título de
										Publicación</label>
									<div class="col-sm-10">

										<input type="text" class="form-control border-ec-4" value="" id="titulo"
											name="titulo" placeholder="Título de la publicación">
									</div>
								</div>

								<div class="form-group row mb-5">
									<label for="exampleFormControlTextarea1"
										class="col-sm-2 col-form-label ">Contenido</label>
									<div class="col-sm-10">

										<textarea class="form-control border-ec-4" id="contenido" name="contenido"
											rows="3"></textarea>
									</div>
								</div>

								<div class="form-group row mb-5">
									<label for="autor" class="col-sm-2 col-form-label">Autor</label>
									<div class="col-sm-10">

										<input type="text" class="form-control border-ec-4" id="autor" name="autor"
											placeholder="Autor de la obra literaria"></input>
									</div>
								</div>


								<div class="form-group row mb-5">
									<label for="fecha_publicacion" class="col-sm-2 col-form-label">Fecha de Publicación
									</label>
									<div class="col-sm-10">

										<input type="date" class="form-control border-ec-4" id="fecha_publicacion"
											name="fecha_publicacion"></input>
									</div>
								</div>

								<div class="form-group row mb-5">
									<label for="archivo" class="col-sm-2 col-form-label">Libro (PDF)</label>

									<div class="col-sm-10">
										<input type="file" name="archivo" id="archivo" class="form-control border-ec-4"
											required>

									</div>
								</div>


								<div class="d-grid gap-2 btn-group" role="group" aria-label="">
									<button type="submit" name="enviarDatos" value="enviarDatos" class="btn btn-success"
										onclick="enviarFormulario()">Enviar Datos</button>
									<button type="reset" name="enviarDatos" value="enviarDatos"
										class="btn btn-danger">Cancelar</button>

								</div>
						</div>
						</form>
					</div>

				</div>


			</div><!-- Main Col END -->
		</div>
	</div>
	</div>

	<script src="../js/validaciones.js"></script>

</body>

</html>