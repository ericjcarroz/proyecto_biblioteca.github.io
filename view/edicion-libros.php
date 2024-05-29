<?php
session_start();
require_once ('../config/conexion2.php');
require_once ("../procesos/consultar-libros.php");
require_once ("../procesos/editar-libros.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Editar Publicaciones</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/estilos.css">
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
</head>

<body id="top" class="body-bg-1">
	<?php

	include ("../includes/menu-navegacion.php");


	?>
	<?php include ("../includes/menu-lateral.php"); ?>

	<div class="">
		<div class="row" id="body-row">
			<div class="main-content" id="formulario-editar-libros">


				<!-- INICIO DEL FORMULARIO DE EDICION DE LIBROS -->
				<?php

				if (isset ($_SESSION['msj']) && !empty ($_SESSION['msj'])) {
					// Almacena el mensaje en una variable para mayor claridad
					$mensaje = $_SESSION['msj'];
					$tipo_mensaje = $_SESSION['tipo_msj'];

					// Limpia el mensaje de  en la sesión para que no se muestre nuevamente
					unset($_SESSION['msj']);
					unset($_SESSION['tipo_msj']);

					// Muestra la alerta de SweetAlert2 con el mensaje de error
					if ($actualizacion) {
						# code...
						echo "<script>
						Swal.fire({
						icon: '{$tipo_mensaje}',
						title: '¡Excelente!',
						text: '{$mensaje}'
						});
						</script>";
											} else {
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
				<div class="col-md-10 col-sm-12 col-xl-8 bg-white p-1 m-md-auto">
					<div class="card border border-ec-4 rounded-end shadow-ec-1" id="form-mascotas">
						<div class="card-header">
							<h3 class="text-center fst-normal fw-normal text-black">Editar Publicaciones</h3>
							<h3 class="text-center fst-italic fw-normal" id="titulo-reg-masc">
								<?php
								//print_r($actualizacion);
								?>
							</h3>
						</div>
						<?php

						?>
						<div class="card-body">
							<form action="" class="form-inline" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="id_publicacion" value="<?php echo $id; ?>">
								<div class="form-group">
									<div class="col-md-12 mb-3">




									</div>
								</div>
								<div class="form-group row mb-5">

									<label for="titulo" class="col-sm-2 form-label">Titulo</label>
									<div class="col-sm-10">

										<input type="text" class="form-control border-ec-4"
											value="<?php echo $titulo ?>" id="titulo" name="titulo"
											placeholder="Nombre de la mascota">
									</div>


								</div>

								<div class="">



								</div>

								<div class="form-group row mb-5">
									<label for="contenido" class="col-sm-2 col-form-label ">Contenido</label>
									<div class="col-sm-10">

										<textarea class="form-control border-ec-4" id="contenido" name="contenido"
											rows="3"><?php echo $contenido ?></textarea>
									</div>
								</div>

								<div class="form-group row mb-5">
									<label for="autor" class="col-sm-2 col-form-label">Autor</label>
									<div class="col-sm-10">

										<input type="text" class="form-control border-ec-4" id="autor" name="autor"
											value="<?php echo $autor ?>"></input>
									</div>
								</div>


								<div class="form-group row mb-5">
									<label for="fecha_publicacion" class="col-sm-2 col-form-label">Fecha de
										Publicación</label>
									<div class="col-sm-10">

										<input type="date" class="form-control border-ec-4" id="fecha_publicacion"
											name="fecha_publicacion" value="<?php echo $fecha_publicacion ?>"></input>
									</div>
								</div>

								<div class="form-group row mb-5">
									<label for="archivo" class="col-sm-2 col-form-label">Libro (PDF)</label>

									<div class="col-sm-10">
										<input type="file" name="archivo" id="archivo" value=""
											class="form-control border-ec-4">
											<label for="nombre_publicacion">Publicación cargada:</label>
										<span><?php echo ' ' . $nombre_archivo ?></span>
										
									</div>
								</div>

								<?php


								?>

								<div class="d-grid gap-2 btn-group" role="group" aria-label="">
									<button type="submit" name="enviarDatos" value="enviarDatos"
										class="btn btn-success">Enviar Datos</button>
									<a href="../view/lista-libros2.php" class="btn btn-danger">Cancelar</a>
									<!--<button type="submit" name="cancelarEnvio" value="cancelarEnvio" class="btn btn-danger">Cancelar</button>-->
								</div>
						</div>
						</form>
					</div>

				</div>


			</div><!-- Main Col END -->
		</div>
	</div>
	</div>
	<?php include ('../includes/scripts.php'); ?>

	<script>


		document.getElementById("cancelarEnvio").addEventListener("click", function () {
			window.location.href = '../dashboard.php';
		});


	</script>
</body>

</html>