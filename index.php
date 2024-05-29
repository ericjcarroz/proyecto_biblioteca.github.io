<?php
session_start();

require_once("config/conexion2.php");


?>
<!DOCTYPE html>
<html lang="ES">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inicio de Sesión | Biblioteca</title>
	<link rel="shortcut icon" href="img/libros.jpg" />
	<link rel="stylesheet" href="css/cosmo.css" />
	<link rel="stylesheet" href="css/estilos.css" />
	<link rel="stylesheet" href="css/sweetalert2.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="">
	<div class="">
		<div class="container-fluid" id="margen_form_login">
			<div class="row justify-content-center mt-4 mb-6">
				<div class="col-md-4 col-sm-10 col-xl-4 col-xxl-4">
					<div class="bg-white py-4 pb-5 my-0 px-5 border-form-login shadow-ec-1" id="">
						<h1 class="title text-center mb-2 text-uppercase text-black fs-3 fst-normal fw-bold"
							id="titulo_login">Biblioteca Virtual</h1>
						<p class="fs-4 text-black text-center marco-carroz">Marco Antonio Carroz</p>
						<!--FORMULARIO -->
						<form method="POST" action="controller/login.php" id="formLogin" class="mt-0 needs-validation"
							novalidate>
							<div id="mensajeAlerta">
								<?php
								//Validacion para mostrar mensaje de error
								if (isset($_SESSION['msj_error']) && !empty($_SESSION['msj_error'])) {
									// Almacena el mensaje en una variable para mayor claridad
									$mensajeError = $_SESSION['msj_error'];

									// Limpia el mensaje de error en la sesión para que no se muestre nuevamente
									unset($_SESSION['msj_error']);

									// Muestra la alerta de SweetAlert2 con el mensaje de error
									echo "<script>
										Swal.fire({
											icon: 'error',
											title: 'Error',
											text: '{$mensajeError}'
										});
									</script>";
								}

								//Validacion para mostrar mensaje de exito en caso de registrar un usuario correctamenten
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
							</div>
							<div class="has-validation position-relative">
								<div class="form-group pt-3">
									<label for="nombre" class="fw-bold">Nombre de Usuario</label>
									<input type="text" class="form-control py-2 border-ec-2 mt-1" id="nombre"
										name="nombre" placeholder="Ingresa aquí tu nombre de usuario" minlength="4"
										maxlength="15" required pattern="[A-Za-z0-9]+">
										<div class="valid-tooltip bg-transparent text-success">
											¡Excelente!
										</div>
										<div class="invalid-tooltip bg-transparent text-danger">
											Por favor, escribe el nombre de usuario
										</div>

								</div>
							</div>
							<div class="has-validation position-relative">
								<div class="form-group pt-3 mt-3">
									<label for="contrasena" class="fw-bold">Contraseña</label>
									<input type="password" class="form-control py-2 border-ec-2 mt-1" id="contrasena"
									name="contrasena" placeholder="Contraseña" minlength="1" maxlength="15" required
									pattern="[A-Za-z0-9]+">
									<div class="valid-tooltip bg-transparent text-success">
										¡Excelente!
									</div>
									<div class="invalid-tooltip bg-transparent text-danger">
										Por favor, escribe la contraseña
									</div>
								</div>
							</div>
								
							<div class="d-grid gap-2 mt-5">

								<button type="submit" class="btn btn-success" name="ingresar" id="ingresar">
									<p class="pt-0 mb-1 text-uppercase text-white fst-normal fw-bold fuente-telex " id="">Ingresar</p>
								</button>
								<a href="view/registro-usuarios.php" class="btn btn-primary " name="registrarse"
									id="registrarse">
									<p class="pt-0 mb-1 fw-medium text-uppercase text-white fw-bold fst-normal fuente-telex"
										id="txt-btn-registrarse">Registrarse</p>
								</a>
							</div>
						</form>
						<!-- FIN FORMULARIO -->
					</div>

				</div>
			</div>
		</div>
	</div>

	<script src="js/sweetalert2.all.js"></script>



	<?php include("includes/styles.php"); ?>
	<?php include("includes/footer.php"); ?>
</body>
<script>
	//VALIDACION DE FORMUALRIOS CON BOOTSTRAP
	// Example starter JavaScript for disabling form submissions if there are invalid fields
	(() => {
		'use strict'

		// Fetch all the forms we want to apply custom Bootstrap validation styles to
		const forms = document.querySelectorAll('.needs-validation')

		// Loop over them and prevent submission
		Array.from(forms).forEach(form => {
			form.addEventListener('submit', event => {
				if (!form.checkValidity()) {
					event.preventDefault()
					event.stopPropagation()
				}

				form.classList.add('was-validated')
			}, false)
		})
	})()
</script>

</html>