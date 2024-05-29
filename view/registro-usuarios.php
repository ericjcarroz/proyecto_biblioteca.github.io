<?php

session_start();

?>

<!DOCTYPE html>
<html lang="ES">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro de Usuarios | Biblioteca</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/estilos.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="">
	<div class="">
		<div class="container-fluid" id="margen_form_login">
			<div class="row justify-content-center mt-4 mb-6">
				<div class="col-md-6 col-sm-10 col-xl-4 col-xxl-6">
					<div class="bg-white py-4 pb-5 my-0 px-5 border-form-login" id="">
						<h1 class="title text-center mb-2 text-uppercase text-black fs-3 fst-normal fw-bold"
							id="titulo_login">Biblioteca Virtual</h1>
						<p class="fs-4 text-black text-center" id="marco-carroz">Marco Antonio Carroz</p>
						<p class="fs-4 text-black text-center fw-bold text-uppercase" id="">Registro de Usuarios</p>
						<?php

						if (isset($_SESSION['msj']) && !empty($_SESSION['msj'])) {
							// Almacena el mensaje en una variable para mayor claridad
							$mensaje = $_SESSION['msj'];

							// Limpia el mensaje de error en la sesión para que no se muestre nuevamente
							unset($_SESSION['msj']);

							// Muestra la alerta de SweetAlert2 con el mensaje de error
							echo "<script>
										Swal.fire({
											icon: 'success',
											title: '¡Excelente!',
											text: '{$mensaje}'
										});
									</script>";
						}
						?>
						<form method="POST" action="../procesos/registrar_usuarios.php" id="formulario-inicio"
							class="mt-0">

							<div class="form-group py-3">
								<label for="nombre" class="fw-bold">Nombre de Usuario</label>
								<input type="text" class="form-control py-2 border-ec-2 mt-1" id="nombre" name="nombre"
									placeholder="Ingresa aquí tu nombre de usuario">
							</div>

							<div class="form-group py-3">
								<label for="correo" class="fw-bold">Correo del Usuario</label>
								<input type="email" class="form-control py-2 border-ec-2 mt-1" id="correo" name="correo"
									placeholder="Ingresa aquí tu correo">

							</div>

							<div class="form-group py-3">
								<label for="contrasena" class="fw-bold">Contraseña</label>
								<input type="password" class="form-control py-2 border-ec-2 mt-1" id="contrasena"
									name="contrasena" placeholder="Contraseña">
							</div>
							<div class="d-grid gap-2 mt-5">

								<button type="submit" class="btn btn-primary" name="registrarse" id="registrarse">
									<p class="pt-0 mb-1 fw-medium text-uppercase text-white fst-normal" id="">
										Registrarse</p>
								</button>
								<a href="../index.php" class="btn btn-danger">
									<p class=" pt-0 mb-1 fw-medium text-uppercase text-white fst-normal">Cancelar
										Registro</p>
								</a>

							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>


	<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
	<?php include("../includes/footer.php"); ?>
</body>

</html>