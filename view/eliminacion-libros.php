<?php
session_start();
require_once ('../config/conexion2.php');
require_once ("../procesos/consultar-libros.php");
require_once ("../procesos/eliminar-libros.php");

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
				

				<div class="col-md-6 bg-white px-4 py-4">
						<div class="card border border-primary">
							<div class="card-header">
								<h3 class="text-center text-dark">Eliminar Registro</h3>
							</div>
							<div class="card-body">
								<h1 class="title text-center fw-bold">¿Está seguro de eliminar el siguiente registro?</h1>
								<p class="label fw-bold fs-4">ID: <span><?php echo $id; ?></span></p>
								<p class="label fw-bold fs-4">Nombre: <span><?php echo ($titulo); ?></span></p>


								<form method="post" action="" class="is-centered container">
									<div class="d-inline-flex gap-1">
										<div class="container">
											<div class="col-md-12 text-center">
												<input type="hidden" name="id_publicacion" value="<?php echo $id_publicacion; ?>">

												<a href="../view/lista-libros2.php" class="btn btn-black">Cancelar</a>
												<button type="submit" class="btn btn-danger">Eliminar</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
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