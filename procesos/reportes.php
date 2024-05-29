<?php

require_once("../config/conexion2.php");

$bdd = new Database();
$conexion = $bdd->conectar();

try {

    $query = $conexion->query("SELECT * FROM publicaciones");
    $query->execute();
    $resultado = $query->fetchAll();

    
} catch (PDOException $e) {
    echo "Error al ejecutar la consulta: " . $e->getMessage();
}
