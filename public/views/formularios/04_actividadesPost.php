<?php

include '../../../app/config/config.php';

if (!isset($_SESSION['usuario'])) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
    exit();
}
$solicitudController = new SolicitudController();

/* datos de la sesion */
include('session.php');

if (isset($_POST) && !empty($_POST) && isset($_POST['actividadesSubmit'])) {

    $usuarioController = new UsuarioController();
    $userWithSolicitud = $usuarioController->getSolicitud($id_wappersonas);
    $idSolicitud = $userWithSolicitud['id_solicitud'];

    $solicitudController->update(['id_estado' => 4], $idSolicitud);

    header('Location: 05_condiciones.php');
    exit();
} else {
    $_SESSION['errores'] = "Hubo un error al finalizar la inscripción. Intente nuevamente.";
    header('Location: 05_condiciones.php');
    exit();
}
