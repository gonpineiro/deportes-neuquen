<?php

include '../../../../app/config/config.php';

if (!isset($_SESSION['usuario'])) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
    exit();
}

$trabajoController = new TrabajoController();

if (isset($_POST) && !empty($_POST)) {
    $id_trabajo = $_POST['id_titulo'];
    $id_solicitud = $_POST['id_solicitud'];

    if (isset($_POST['rechazarBtn'])) $estado = "Rechazado";
    if (isset($_POST['aprobarBtn'])) $estado = "Aprobado";

    $trabajoController->update(['estado' => $estado], $id_trabajo);

    $_SESSION['tab_active'] = 'trabajo';
    header('Location: ../info_solicitud.php?id=' .  $id_solicitud . '#main');
    exit();
} else {
    exit();
}
