<?php 

require_once ("../config/conexion2.php");



try {
	$bdd = new Database();
	$conexion = $bdd->conectar();

	$id = $_REQUEST['id'];

if ($_POST && $id) {
	$sql = "DELETE FROM publicaciones WHERE id = $id;";

	$eliminacion = $conexion->prepare($sql);

	if ($eliminacion->execute()) {
		session_start();
		$_SESSION['msj'] = "Se eliminó el registro correctamente";
		$_SESSION["tipo_msj"] = "success";
		header("Location: ../view/lista-libros2.php");

	} else {
		$_SESSION['msj'] = "Hubo un error al eliminar el registro";
		$_SESSION["tipo_msj"] = "error";
	}
 }
} catch (PDOException $e) {
	// Manejar excepciones
	$_SESSION['msj'] = "Error al eliminar: " . $e->getMessage();
	$_SESSION["tipo_msj"] = "error";
	
}

/*
if(!empty($_POST))
{
	
	$id_publicacion = $_POST['id_publicacion'];

	$query_delete = mysqli_query($conection,"DELETE FROM publicaciones WHERE id = $id_publicacion;");
	mysqli_close($conection);
	$result_delete = mysqli_num_rows($query_delete);
	if($result_delete > 0 && !empty($query_delete)){

	header("location: ../view/dashboard.php");	
		echo "Registro eliminado con exito";
	}else{
		echo "Error al eliminar";
	}

}*/




/*
$id = $_REQUEST['id'];
if(!empty($_POST))
{
	

	$query_delete = $conexion->query("DELETE FROM publicaciones WHERE id = $id");
	
	if(!empty($query_delete->execute())){
		//echo "Registro eliminado con exito";
		header("location: ../view/lista-libros2.php");	
	}else{
		echo "Error al eliminar";
	}


}






if(empty($_REQUEST['id']))
{
	header("location: ../view/lista-libros2.php");

}else{

	$id = $_REQUEST['id'];

	$query = $conexion->query("SELECT * FROM publicaciones p WHERE id = $id");
	$query->execute();


	$result = $query->rowCount();

	if($result > 0){
		while ($datos = $query->fetch()) {
				# code...
			$id = $datos['id'];
			$titulo = $datos['titulo'];

		}
	}else{
		header("location: ../view/lista-libros2.php");
	}


}*/
?>
