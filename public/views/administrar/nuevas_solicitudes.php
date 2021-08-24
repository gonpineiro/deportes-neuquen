<?php
include '../../../app/config/config.php';

verificarUsuario(3);

/* datos de la sesion */
include('../common/session.php');

$solicitudController = new SolicitudController();
$solicitudesNuevas = $solicitudController->getSolicitudesWhereEstado('Nuevo');
$solicitudesAprobadas = $solicitudController->getSolicitudesWhereEstado('Aprobado');
?>

<?php include('../common/header.php'); ?>

<div class="body container" style="padding-bottom: 50px;">
    <?php include('../common/navbar.php'); ?>

    <?php include('./components/solicitudes_nuevas.php') ?>

    <div class="elementor-divider"> <span class="elementor-divider-separator"></span></div>

    <?php include('./components/solicitudes_aprobadas.php') ?>

</div>

<?php include('./components/footer.php'); ?>