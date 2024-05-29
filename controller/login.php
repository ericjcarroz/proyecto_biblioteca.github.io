<?php

session_start();

require("../config/conexion2.php");



$bdd = new Database;

$_SESSION['msj'] = "";

if ($_POST) {
	if (!empty($_POST['nombre']) && !empty($_POST['contrasena'])) {
		$nombre = $_POST['nombre'];
		$contrasena = $_POST['contrasena'];

		$conexion = $bdd->conectar();

		$sentencia = $conexion->prepare("SELECT * FROM usuarios WHERE nombre = :nombre");
		$sentencia->execute(array(':nombre' => $nombre));
		$resultado = $sentencia->fetch(PDO::FETCH_ASSOC);

		if (!empty($resultado)) {
			if (($contrasena === $resultado['contrasena']) && $nombre === $resultado['nombre']) {
				$_SESSION['active'] = true;
				$_SESSION['id_usuario'] = $resultado['id'];
				$_SESSION['nombre'] = $resultado['nombre'];

				// Redirigir al Dashboard
				header('location: ../view/dashboard.php');
				exit(); // Detener el script después de la redirección
			} else {
				// Las credenciales no son correctas

				$_SESSION['msj_error'] = 'Credenciales Incorrectas';

				header('location: ../index.php');



			}
		} else {
			$_SESSION['msj_error'] = 'El usuario no existe en la base de datos.';

			header('location: ../index.php');

		}
	} else {
		$_SESSION['msj_error'] = 'Por favor, complete todos los campos.';

		header('location: ../index.php');

	}
}
