<?php

require_once ("../config/conexion2.php");

$bdd = new Database();
$conexion = $bdd->conectar();

try {
    $por_pagina = 5;

    if (isset ($_GET['pagina'])) {
        $pagina = $_GET['pagina'];
    } else {
        $pagina = 1;
    }

    $empieza = ($pagina - 1) * $por_pagina;

    //$query = $conexion->query("SELECT id,titulo,autor,contenido,fecha_publicacion FROM publicaciones LIMIT $empieza, $por_pagina");

    $query = $conexion->query("SELECT id,titulo,autor,contenido,fecha_publicacion,archivo FROM publicaciones");
    $query->execute();
    $resultado = $query->fetchAll();

    $resultados_actuales = $query->rowCount();

    $sql_total = $conexion->query("SELECT COUNT(*) FROM publicaciones");

    $total = $sql_total->fetchColumn();

    $total_paginas = ceil($total / $por_pagina);


    
        $id = $_REQUEST['id'];


        $queryById = $conexion->prepare("SELECT * FROM publicaciones WHERE id = :id");
        $queryById->bindParam(":id", $id, PDO::PARAM_INT);
        $queryById->execute();
        while ($sentencia = $queryById->fetch(PDO::FETCH_ASSOC)) {
            $titulo = $sentencia["titulo"];
            $contenido = $sentencia["contenido"];
            $autor = $sentencia["autor"];
            $fecha_publicacion = $sentencia["fecha_publicacion"];
            $nombre_archivo = $sentencia["archivo"];
        }

    


} catch (PDOException $e) {
    echo "Error al ejecutar la consulta: " . $e->getMessage();
}
