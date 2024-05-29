<?php

require_once("../config/conexion2.php");

$bdd = new Database();
$conexion = $bdd->conectar();

try {

    $query = $conexion->query("SELECT id,nombre,correo,contrasena FROM usuarios");
    $query->execute();
    $resultado = $query->fetchAll();

    $totalQuery = $conexion->query("SELECT COUNT(*) FROM usuarios");
    $totalQuery->execute();
    $totalUsuarios = $totalQuery->fetchColumn();
    
} catch (PDOException $e) {
    echo "Error al ejecutar la consulta: " . $e->getMessage();
}
