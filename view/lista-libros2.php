<?php session_start(); ?>


<?php require "../config/conexion2.php" ?>
<?php require "../procesos/consultar-libros.php" ?>
<?php require "../procesos/editar-libros.php" ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicaciones</title>
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">
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
                            <?php

                            if (isset ($_SESSION['msj']) && !empty ($_SESSION['msj'])) {
                                // Almacena el mensaje en una variable para mayor claridad
                                $mensaje = $_SESSION['msj'];
                                $tipo_mensaje = $_SESSION['tipo_msj'];

                                // Limpia el mensaje de  en la sesión para que no se muestre nuevamente
                                unset($_SESSION['msj']);
                                unset($_SESSION['tipo_msj']);

                                // Muestra la alerta de SweetAlert2 con el mensaje de error
                                if ($actualizacion) {
                                    # code...
                                    echo "<script>
                                Swal.fire({
                                icon: '{$tipo_mensaje}',
                                title: '¡Excelente!',
                                text: '{$mensaje}'
                                });
                                </script>";
                                        } else {
                                            echo "<script>
                                Swal.fire({
                                icon: '{$tipo_mensaje}',
                                title: 'Error',
                                text: '{$mensaje}'
                                });
                                </script>";
                                        }
                                    }
                            ?>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table
                                        class="table table-hover table-bordered border-dark fila-listado fs-5 fw-bold px-4"
                                        id="tabla">
                                        <caption class="fst-italic fw-bold fs-6">Lista de publicaciones registradas en
                                            el
                                            sistema.</caption>
                                        <thead class="fw-medium text-uppercase" id="titulo_lista_libros">

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

                                                <th scope="row" width="" class="text-md-center">Nombre Archivo

                                                </th>

                                                <th scope="row" width="" class="text-md-center">Acciones

                                                </th>
                                            </tr>
                                        </thead>

                                        <!-- ========== Start Section ========== -->
                                        <tbody class="table-group-divider fs-6 roboto-regular" id="cuerpo">
                                            <?php
                                            if ($resultados_actuales > 0):
                                                foreach ($resultado as $datos):
                                                    ?>
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
                                                        <td colspan="0" class="text-md-center">
                                                            <?php echo $datos["archivo"]; ?>
                                                        </td>
                                                        <td class="text-md-center">
                                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                               <button type="button" class="btn btn-outline-warning">
                                                                    <a class="text-decoration-none text-dark"
                                                                        href="edicion-libros.php?id=<?php echo $datos['id']; ?>">Editar</a>
                                                                </button>
                                                                <!-- <button type="button" class="btn btn-outline-warning">
                                                                    <a class="text-decoration-none text-dark"
                                                                        href="../procesos/editar-libros.php?id=<?php echo $datos['id']; ?>">Editar</a>
                                                                </button>-->
                                                                <button type="button" class="btn btn-outline-danger">
                                                                    <a class="text-decoration-none text-dark"
                                                                        href="eliminacion-libros.php?id=<?php echo $datos['id']; ?>">Eliminar</a>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                endforeach;
                                            endif;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Eliminado código comentado -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>

    <script>
        // Inicializar DataTable
        var tabla = $('#tabla').DataTable({
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },

        });

    </script>
</body>

</html>