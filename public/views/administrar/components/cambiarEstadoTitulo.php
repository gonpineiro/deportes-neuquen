<?php

include '../../../../app/config/config.php';

if (!isset($_SESSION['usuario'])) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
    exit();
}

$tituloController = new TituloController();

if (isset($_POST) && !empty($_POST)) {
    $id_titulo = $_POST['id_titulo'];
    $id_solicitud = $_POST['id_solicitud'];

    if (isset($_POST['rechazarBtn'])) $estado = "Rechazado";
    if (isset($_POST['aprobarBtn'])) $estado = "Aprobado";

    $tituloController->update(['estado' => $estado], $id_titulo);

    $_SESSION['tab_active'] = 'titulo';
    header('Location: ../info_solicitud.php?id=' .  $id_solicitud . '#main');
    exit();
} else {
    exit();
}
