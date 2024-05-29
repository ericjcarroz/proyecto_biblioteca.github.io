<?php

require_once ("../config/conexion2.php");

class RegistrarLibros
{

    public function insertar($titulo, $autor, $contenido, $fecha_publicacion, $archivo)
    {
        try {
            $bdd = new Database();
            $conexion = $bdd->conectar();




            // Comprobar si se ha cargado un archivo
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
                            // Insertar la información del archivo en la base de datos
                            // Sentencia SQL con marcadores de posición
                            $sql = "INSERT INTO publicaciones(titulo, autor, contenido, fecha_publicacion, archivo)
                    VALUES(:titulo, :autor, :contenido, :fecha_publicacion, :nombre_archivo)";


                            // Preparación de la sentencia
                            $insercion = $conexion->prepare($sql);

                            // Vinculación de los valores a los marcadores de posición
                            $insercion->bindParam(':titulo', $titulo, PDO::PARAM_STR);
                            $insercion->bindParam(':autor', $autor, PDO::PARAM_STR);
                            $insercion->bindParam(':contenido', $contenido, PDO::PARAM_STR);
                            $insercion->bindParam(':fecha_publicacion', $fecha_publicacion, PDO::PARAM_STR);
                            $insercion->bindParam(':nombre_archivo', $nombre_archivo, PDO::PARAM_STR);


                            // Ejecución de la consulta preparada
                            if ($insercion->execute()) {
                                session_start();
                                $_SESSION['msj'] = "Se añadió el registro correctamente";
                                $_SESSION["tipo_msj"] = "success";
                                //echo 'Inserción exitosa.';

                            } else {
                                $_SESSION['msj'] = "Hubo un error al añadir el registro";
                                $_SESSION["tipo_msj"] = "error";
                            }
                        }
                    }
                }
            }



        } catch (PDOException $e) {
            echo 'Error al insertar: ' . $e->getMessage();
            session_start();
            $_SESSION['msj'] = "No se añadió el registro. Hubo un error";
        }
    }
}

// Ejemplo de uso
$registrarLibros = new RegistrarLibros();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    $autor = $_POST['autor'];
    $fecha_publicacion = date('Y-m-d'); // Obtener la fecha actual en formato Y-m-d
    $archivo = $_POST['archivo'];

    $registrarLibros->insertar($titulo, $autor, $contenido, $fecha_publicacion, $archivo);


}
