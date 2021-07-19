<?php

include '../../../app/config/config.php';

if (!isset($_SESSION['usuario'])) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
    exit();
}
$solicitudController = new SolicitudController();

if (isset($_POST) && !empty($_POST) && isset($_POST['actividadesSubmit'])) {

    $usuarioController = new UsuarioController();
    $userWithSolicitud = $usuarioController->getSolicitud($id_wappersonas);
    $idSolicitud = $userWithSolicitud['id_solicitud'];

    $solicitudParams = [
        'id_estado' => 4,
    ];
    $solicitudController->update($solicitudParams, $idSolicitud);

    header('Location: ./components/inscripcion_exitosa.php');
    exit();
} else {
    $_SESSION['errores'] = "Hubo un error al finalizar la inscripción. Intente nuevamente.";
    header('Location: 05_condiciones.php#form-52');
    exit();
}
