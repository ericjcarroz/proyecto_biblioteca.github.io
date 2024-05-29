<?php session_start(); ?>


<?php require "../config/conexion2.php" ?>

<?php require "../procesos/consultar-libros.php" ?>



<!DOCTYPE html>
<html lang="ES">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicaciones</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body id="top" class="">
    <?php include ("../includes/menu-navegacion.php"); ?>
    <?php include ("../includes/menu-lateral.php"); ?>


    <div class="row" id="body-row">
        <div class="main-content mr-0 pr-0" id="lista-general-publicaciones">
            <div class="">
                <div class="">
                    <div class="col col-md-10 col-lg-10 col-xl-10 col-xxl-10 mx-auto">
                        <div class="card text-dark bg-white border border-ec-5 rounded-top"
                            style="width: 1400px!important;">
                            <div class="card-header bg-transparent">
                                <h3 class="text-center text-black fst-normal text-uppercase fw-bold mt-4 roboto-bold"
                                    id="">
                                    Listado
                                    de
                                    Publicaciones
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table
                                        class="table table-hover table-bordered  border-dark fila-listado fs-5 fw-bold px-4"
                                        id="tabla">
                                        <caption class="fst-italic fw-bold fs-6">Lista de publicaciones registradas en
                                            el
                                            sistema.</caption>
                                        <thead class="fw-medium text-uppercase" id="titulo_lista_libros">
                                            <form action="" method="GET">
                                                <div class="col-4 mx-auto">
                                                    <div class="">
                                                        <div class="input-group mt-5">
                                                            <input class="form-control mr-sm-2" type="search"
                                                                placeholder="Buscar" name="busqueda"
                                                                aria-label="Buscar">
                                                            <input class="btn btn-outline-success my-2 my-sm-0"
                                                                type="submit" name="buscar" value="Buscar"></input>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                            <?php


                                            ?>
                                            <tr class="">
                                                <th scope="row" width=""># ID
                                                </th>
                                                <th scope="row" width="">Título

                                                </th>
                                                <th scope="row" width="" class="text-md-center">Contenido

                                                </th>

                                                <th scope="row" class="text-md-center">Autor

                                                </th>
                                                <th scope="row" width="" class="text-md-center">Fecha de Publicación

                                                </th>
                                                <th scope="row" width="" class="text-md-center">Acciones

                                                </th>
                                            </tr>
                                        </thead>

                                        <!-- ========== Start Section ========== -->


                                        <?php
                                        if (!empty ($resultado)):
                                            foreach ($resultado as $datos):
                                                ?>
                                                <tbody class="table-group-divider fs-6 roboto-regular" id="cuerpo">
                                                    <tr class="">
                                                        <td colspan="0">
                                                            <?php echo $datos["id"]; ?>
                                                        </td>
                                                        <td colspan="0">
                                                            <?php echo ucwords($datos["titulo"]); ?>
                                                        </td>
                                                        <td colspan="0" width="" class="fw-medium">
                                                            <?php echo $datos["contenido"]; ?>
                                                        </td>
                                                        <td colspan="0">
                                                            <?php echo $datos["autor"]; ?>
                                                        </td>
                                                        <td colspan="0" class="text-md-center">
                                                            <?php echo $datos["fecha_publicacion"]; ?>
                                                        </td>

                                                        <div class="btn-group" role="group">
                                                            <td class="text-md-center">
                                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                                    <button type="button" class="btn btn-warning">
                                                                        <a class="text-decoration-none text-light"
                                                                            href="../procesos/editar-libros.php?id=<?php echo $datos['id']; ?>">Editar</a>
                                                                    </button>
                                                                    <button type="button" class="btn btn-danger">
                                                                        <a class="text-decoration-none text-light"
                                                                            href="../procesos/eliminar-libros.php?id=<?php echo $datos['id']; ?>">Eliminar</a>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </div>
                                                    </tr>
                                                </tbody>
                                                <?php
                                            endforeach;
                                        endif;
                                        ?>

                                    </table>
                                </div>
                            </div>

                            <?php
                            ?>

                            <div id="paginacion-lista-libros " class="d-flex justify-content-end align-items-center">
                                <nav aria-label="" class="">
                                    <ul class="pagination pagination-sm">
                                        <?php
                                        echo "<li class='page-item border border-ec-4'><a class='page-link text-black fs-4' href='lista-libros.php?pagina=1'>" . ' <span class="fa-solid fa-angle-left"></span> ' . "</a>";

                                        for ($i = 1; $i <= $total_paginas; $i++) {

                                            echo "<li class='page-item border border-ec-4'><a class='page-link text-dark fs-4 fst-bold' href='lista-libros.php?pagina=" . $i . "'>" . $i . "</a></li>";
                                        }

                                        echo "<li class='page-item border border-ec-4'><a class='page-link text-black fs-4' href='lista-libros.php?pagina=$total_paginas'>" . ' <span class="fa-solid fa-angle-right"></span> ' . "</a></li>";
                                        ?>
                                    </ul>
                                    <p>Mostrando
                                        <?php echo $resultados_actuales ?>resultados de
                                        <?php echo $total ?> totales
                                    </p>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>