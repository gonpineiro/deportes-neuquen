<?php

include '../../../app/config/config.php';
/* datos de la sesion */
include('session.php');
if (!isset($_SESSION['usuario'])) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
    exit();
}

/* datos de la sesion */
include('session.php');

$solicitudController = new SolicitudController();

if (isset($_POST) && !empty($_POST) && isset($_POST['condicionesSubmit'])) {
    $usuarioController = new UsuarioController();
    $userWithSolicitud = $usuarioController->getSolicitud($id_wappersonas);
    $id_solicitud = $userWithSolicitud['id_solicitud'];

    $solicitudController->update(['id_estado' => 6], $id_solicitud);
    $address = $userWithSolicitud['usuario_email'] != '' ? $userWithSolicitud['usuario_email'] : $email;
    $enviarMailResult = enviarMailApi('$address', $id_solicitud);
    if ($enviarMailResult['error'] == (null || '')) {
        $id_usuario = $userWithSolicitud['id_usuario'];
        $error = $enviarMailResult['error'] . ' | ' . $address;
        cargarLog($id_usuario, $id_solicitud, $error, '05_condicionesPost.php', 'enviarMailApi');
    }
    header('Location: inscripcion.php');
    exit();
} else {
    $_SESSION['errores'] = "Hubo un error al finalizar la inscripción. Intente nuevamente.";
    header('Location: 05_condiciones.php#form-52');
    exit();
}
