<?php

session_start();

if (empty ($_SESSION['id_usuario'])) {
    session_destroy();
    header('location: ../');
}




require "../config/conexion2.php";
require_once "../procesos/consultar-usuarios.php";
require_once "../procesos/consultar-libros.php";

$id = $_SESSION['id_usuario'];


$bdd = new Database();
$conexion = $bdd->conectar();

$consulta = $conexion->query("SELECT id, nombre FROM usuarios WHERE id = $id");

$consulta->execute();
$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=500, initial-scale=1" />
    <title>Dashboard | Biblioteca Popular</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body id="top" class="">
    <?php include ("../includes/menu-navegacion.php"); ?>
    <div class="fixed-bottom footer-biblioteca">
        <?php include ("../includes/footer.php"); ?>
    </div>
    <?php include ("../includes/menu-lateral.php"); ?>
    <div class="" id="">
        <div class="row" id="body-row">
            <div class="main-content mt-6 ">

                <!-- Principal -->
                <div class="col-12 bg-white px-3 py-3 " id="estadisticas_sistema">


                    <?php
                    foreach ($resultado as $registro) {
                        ?>
                        <h1 class="display-4 text-center">¡Te damos la bienvenida al sistema,
                            <?php echo ucfirst($registro['nombre']) ?>!
                        </h1>
                        <?php
                    }
                    ?>
                    <h3></h3>
                    <div class="">
                        <div class="row mt-5">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title fs-3 fw-medium">Número Total de Publicaciones</h5>
                                        <p class="card-text fs-2 text-center"><?php echo $total ?></p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title fs-3 fw-medium">Número de Usuarios Registrados</h5>
                                        <p class="card-text text-center fs-2"><?php echo $totalUsuarios ?></p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>










</body>


</html>