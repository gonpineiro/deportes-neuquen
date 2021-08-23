<?php
include '../../../app/config/config.php';

if (!isset($_SESSION['usuario'])) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
    exit();
}
/* datos de la sesion */
include('../common/session.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../../estilos/estilo.css">
    <link rel="stylesheet" href="../../estilos/menu/menu.css">
    <link rel="stylesheet" type="text/css" href="../../../node_modules/datatables.net-dt/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css">


    <title>Panel Admin - Registro Profesionales Deporte</title>
</head>

<body>
    <?php include('../common/header.php'); ?>


    <div class="body container" style="padding-bottom: 50px;">
        <?php include('../common/navbar.php'); ?>
        <div style="min-height: 50px;">
            <h2 style="padding:30px 0px;color: #076AB3;">SOLICITUDES NUEVAS</h2>
        </div>
        <div class="table-responsive">
            <table id="tabla_solicitudes_nuevas" class="table tablas_solicitudes">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">N°</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Apellido y Nombre</th>
                        <th scope="col">Fecha Evaluación</th>
                        <th scope="col">Retiro</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="elementor-divider"> <span class="elementor-divider-separator"></span></div>

        <div style="min-height: 50px;">
            <h2 style="padding:30px 0px;color: #076AB3;">SOLICITUDES APROBADAS</h2>
        </div>
        <div class="table-responsive">
            <table id="tabla_solicitudes_aprobadas" class="table tablas_solicitudes">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">N°</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Apellido y Nombre</th>
                        <th scope="col">Fecha Evaluación</th>
                        <th scope="col">Retiro</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</body>

<script src="../../../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../../node_modules/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="../../../node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>

<script src="../../js/administrar/nuevas_solicitudes.js"></script>

</html>