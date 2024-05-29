<?php
require_once ("../config/conexion2.php");

try {
	$bdd = new Database();
	$conexion = $bdd->conectar();

	$id = $_REQUEST['id'];

	// Obtener datos del formulario
	if ($_POST && $id) {


		if (isset ($_FILES['archivo'])) {
			extract($_POST);

			// Definir la carpeta de destino
			$carpeta_destino = "../files/";

			// Obtener el nombre y la extensión del archivo
			$nombre_archivo = basename($_FILES["archivo"]["name"]);
			$extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));

			// Validar la extensión del archivo
			if ($extension === "pdf") {

				if (file_exists($carpeta_destino . $nombre_archivo)) {
					$_SESSION['msj'] = "El libro ya existe en la carpeta de archivos";
					$_SESSION["tipo_msj"] = "error";
				} else {

					// Mover el archivo a la carpeta de destino
					if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $carpeta_destino . $nombre_archivo)) {


					}
				}

			}
			$titulo = $_POST["titulo"];
			$contenido = $_POST["contenido"];
			$autor = $_POST["autor"];
			$fecha_publicacion = $_POST["fecha_publicacion"];
			//$nombre_archivo = $_POST["archivo"]; 

			// Definir la consulta SQL para actualizar el registro
			$sql = "UPDATE publicaciones SET titulo=:titulo, contenido=:contenido, autor=:autor, fecha_publicacion=:fecha_publicacion, archivo=:nombre_archivo WHERE id = :id";

			// Preparar la consulta
			$actualizacion = $conexion->prepare($sql);

			// Vincular parámetros
			$actualizacion->bindParam(':titulo', $titulo, PDO::PARAM_STR);
			$actualizacion->bindParam(':contenido', $contenido, PDO::PARAM_STR);
			$actualizacion->bindParam(':autor', $autor, PDO::PARAM_STR);
			$actualizacion->bindParam(':fecha_publicacion', $fecha_publicacion, PDO::PARAM_STR);
			$actualizacion->bindParam(':nombre_archivo', $nombre_archivo, PDO::PARAM_STR);
			$actualizacion->bindParam(':id', $id, PDO::PARAM_INT);

			// Ejecutar la consulta preparada
			if ($actualizacion->execute()) {
				session_start();
				$_SESSION['msj'] = "Se actualizó el registro correctamente";
				$_SESSION["tipo_msj"] = "success";
				header("Location: ../view/lista-libros2.php");

			} else {
				$_SESSION['msj'] = "Hubo un error al actualizar el registro";
				$_SESSION["tipo_msj"] = "error";
			}

			// Redireccionar a la página de edición de libros

		}
	}
} catch (PDOException $e) {
	// Manejar excepciones
	$_SESSION['msj'] = "Error al actualizar: " . $e->getMessage();
	$_SESSION["tipo_msj"] = "error";
	
}

