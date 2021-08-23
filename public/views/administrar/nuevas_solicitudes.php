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

<?php include('../common/header.php'); ?>

<div class="body container" style="padding-bottom: 50px;">
    <?php include('../common/navbar.php'); ?>

    <?php include('./components/solicitudes_nuevas.php') ?>

    <div class="elementor-divider"> <span class="elementor-divider-separator"></span></div>

    <?php include('./components/solicitudes_aprobadas.php') ?>

</div>

<?php include('./components/footer.php'); ?>