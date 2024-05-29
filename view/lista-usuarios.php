<?php
session_start();

require "../config/conexion2.php";
require "../procesos/consultar-usuarios.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body id="top" class="body-bg-2">
    <?php include("../includes/menu-navegacion.php"); ?>
    <?php include("../includes/menu-lateral.php"); ?>
    <div class="fixed-bottom">
        <?php include("../includes/footer.php"); ?>
    </div>

    <div class="row" id="body-row">
        <div class="main-content" id="lista-general-usuarios">
            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">



                <div class="p-1 m-md-auto pt-2">
                    <div class="col-md-12">
                        <div class="card text-dark bg-white mb-3 py-1 px-2 ml-7 border border-ec-5 rounded-top">
                            <div class="card-header">
                                <h3 class="text-center text-black fst-normal fw-bold mt-4" id="">Listado de Datos </h3>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">


                                    <table class="table table-bordered border-dark roboto-regular fs-5 " cellspacing="0"
                                        width="100%">
                                        <caption>Lista de Usuarios registrados en el sistema</caption>

                                        <tr class="table-default">
                                            <th># Usuario</th>
                                            <th>Nombre de Usuario</th>
                                            <th>Contraseña</th>
                                            <th>Email</th>
                                        </tr>


                                        <?php

                                        if (!empty($resultado)):

                                            foreach ($resultado as $dato):

                                                ?>

                                                <tr>

                                                    <td width="10">
                                                        <?php echo $dato["id"]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $dato["nombre"]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $dato["contrasena"]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $dato["correo"]; ?>
                                                    </td>

                                                </tr>


                                                </td>
                                                </tr>
                                                <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

</body>

</html>