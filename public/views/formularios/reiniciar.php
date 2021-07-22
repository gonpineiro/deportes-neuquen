<?php

include '../../../app/config/config.php';

if (!isset($_SESSION['usuario'])) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
    exit();
}
/* datos de la sesion */
include('session.php');

$solicitudController = new SolicitudController();

if (isset($_POST)) {
    $usuarioController = new UsuarioController();
    $userWithSolicitud = $usuarioController->getSolicitud($id_wappersonas);
    $idSolicitud = $userWithSolicitud['id_solicitud'];
    $solicitudController->update(['id_estado' => 11], $idSolicitud);
    exit();
} else {
    $_SESSION['errores'] = "Hubo un error al reiniciar la inscripción. Intente nuevamente.";
    exit();
}
