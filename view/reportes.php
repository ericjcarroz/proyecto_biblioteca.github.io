<?php
session_start();



ob_start();

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
    <?php

    require "../config/conexion2.php";
    //require "../procesos/consultar-libros.php";
    
    $bdd = new Database();
    $conexion = $bdd->conectar();

    $query = $conexion->query("SELECT * FROM publicaciones");
    $query->execute();
    $resultado = $query->fetchAll();

    ?>
    <h1 class="text-center" id="titulo_login">Reporte de Libros</h1>
    <table class="table table-bordered border-dark roboto-regular fs-5 " cellspacing="0" width="100%">


        <tr class="table-default">
            <th>#ID</th>
            <th>Título</th>
            <th>Contenido</th>
            <th>Autor</th>
            <th>Fecha de Publicación</th>
        </tr>


        <?php

        if (!empty ($resultado)):
            foreach ($resultado as $datos):
                ?>
                <tbody class="table-group-divider fs-6" id="cuerpo-lista">
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
                    </tr>
                </tbody>
                <?php
            endforeach;
        endif;
        ?>


        </td>
        </tr>

    </table>

</body>

</html>

<?php
$html = ob_get_clean();

//echo $html;
require_once "../reportes/dompdf/autoload.inc.php";

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('letter');
$dompdf->setPaper('A4', 'landscape');

$dompdf->render();

$dompdf->stream("archivo_.pdf", array("Attachment" => false));
?>