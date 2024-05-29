<?php
require_once ("../config/conexion2.php");

$bdd = new Database();
$conexion = $bdd->conectar();

$columnas = [
    'id',
    'titulo',
    'contenido',
    'autor',
    'fecha_publicacion'
];

$tabla = "publicaciones";

$campo = isset($_POST['campo']);

$sql = $conexion->prepare("SELECT " . implode(", ", $columnas) . " FROM $tabla");
$sql->execute();

$resultado = $sql->fetchAll(PDO::FETCH_ASSOC); // Usar fetchAll() en lugar de fetch()

$num_rows = $sql->rowCount();

$html = '';

if ($num_rows > 0) {
    foreach ($resultado as $row) { // Cambiar el while por un foreach
        $html .= '<tr>';
        $html .= '<td>' . $row['id'] . '</td>';
        $html .= '<td>' . $row['titulo'] . '</td>';
        $html .= '<td>' . $row['contenido'] . '</td>';
        $html .= '<td>' . $row['autor'] . '</td>';
        $html .= '<td>' . $row['fecha_publicacion'] . '</td>';
        $html .= '<td><a href="">Editar</a></td>';
        $html .= '<td><a href="">Eliminar</a></td>';
        $html .= '</tr>';
    }
} else {
    $html .= '<tr>';
    $html .= '<td colspan="7">Sin resultados</td>';
    $html .= '</tr>';
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);

