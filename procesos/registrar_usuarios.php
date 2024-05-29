<?php

require_once('../config/conexion2.php');

class registrarUsuarios
{
    public function registro($nombre, $correo, $contrasena)
    {
        try {
            $bdd = new Database();
            $conexion = $bdd->conectar();

            // Sentencia SQL con marcadores de posición
            $sql = "INSERT INTO usuarios(nombre, correo, contrasena)
                    VALUES(:nombre, :correo, :contrasena)";

            // Preparación de la sentencia
            $consulta = $conexion->prepare($sql);

            // Vinculación de los valores a los marcadores de posición
            $consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $consulta->bindParam(':correo', $correo, PDO::PARAM_STR);
            $consulta->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);

            if ($consulta->execute()) {
                session_start();
                $_SESSION['msj'] = "Se añadió el registro correctamente";
                //echo 'Inserción exitosa.';
                header('location: ../index.php');

            }
        } catch (PDOException $e) {
            echo 'Error al insertar: ' . $e->getMessage();
            session_start();
            $_SESSION['msj'] = "No se añadió el registro. Hubo un error";

            header('location: ../index.php');
        }
    }
}

// Ejemplo de uso
$registrarUsuarios = new registrarUsuarios();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    

    $registrarUsuarios->registro($nombre, $correo, $contrasena);

    if ($registrarUsuarios) {
        $_SESSION['msj'] = 'Usuario creado exitosamente';
    }
}