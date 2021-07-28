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
$deportesSolicitudesActividadesController = new SolicitudActividadController();    

if (isset($_POST) && !empty($_POST) && isset($_POST['actividadesSubmit'])) {
    $actividades = $_POST['actividades'];
    $usuarioController = new UsuarioController();
    $userWithSolicitud = $usuarioController->getSolicitud($id_wappersonas);
    $id_solicitud = $userWithSolicitud['id_solicitud'];
    foreach($actividades as $actividad){
        $deportesSolicitudesActividadesController->store(
            [
                'id_solicitud' => $id_solicitud,
                'id_actividad' => $actividad,
            ]
            );
    }
    $solicitudController->update(['id_estado' => 4], $id_solicitud);
    header('Location: inscripcion.php#paso-4');
    exit();
} else {
    $_SESSION['errores'] = "Hubo un error al finalizar la inscripción. Intente nuevamente.";
    header('Location: inscripcion.php');
    exit();
}
