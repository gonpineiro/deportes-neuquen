<?php

include '../../../app/config/config.php';

if (!isset($_SESSION['usuario'])) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
    exit();
}

/* datos de la sesion */
include('session.php');

if (isset($_POST) && !empty($_POST) && isset($_POST['trabajoSubmit']) && $_FILES['imagenLugares']['name'] != "" ) {

    if (checkFile()) {
        $usuarioController = new UsuarioController();
        $userWithSolicitud = $usuarioController->getSolicitud($id_wappersonas);
        $idSolicitud = $userWithSolicitud['id_solicitud'];

        $trabajoController = new TrabajoController();
        $success = true;
        foreach ($_FILES['imagenLugares']['tmp_name'] as $key => $unaImagen) {
            $fileType = $_FILES['imagenLugares']['type'][$key];
            $pathTrabajo = getDireccionesParaAdjunto($fileType, $idSolicitud, $key, 'trabajos', $key);

            /* upload comprobante & certificado */
            if (copy($unaImagen, $pathTrabajo)) {
                $trabajoStore = $trabajoController->store(
                    [
                        'id_solicitud' => $idSolicitud,
                        'lugar' => $_POST['lugarTrabajo'][$key],
                        'path_file' => $pathTrabajo,
                    ]
                );

                if (!$trabajoStore) {
                    $_SESSION['errores'] = mostrarError('store');
                    $success = false;
                    break;
                }
            } else {
                $_SESSION['errores'] = mostrarError('file', $_FILES['imagenLugares']['name'][$key]);
                $success = false;
                break;
            }
        }
        /* Si todo salio bien Cambiamos el estado a Actividades */
        if ($success) {
            unset($_SESSION['errores']);
            $solicitudController = new SolicitudController();
            $solicitudController->update(['id_estado' => 3], $idSolicitud);
        }
        header('Location: inscripcion.php#paso-3');
        exit();
    } else {
        header("Refresh:0.01; url=inscripcion.php", true, 303);
        exit();
    }
} 
if (isset($_POST) && !empty($_POST) && isset($_POST['trabajoSubmit']) && !isset($_FILES['imagenLugares']) && empty($_FILES['imagenLugares']['name'] == "")) {

        $usuarioController = new UsuarioController();
        $userWithSolicitud = $usuarioController->getSolicitud($id_wappersonas);
        $idSolicitud = $userWithSolicitud['id_solicitud'];

        $trabajoController = new TrabajoController();
        $success = true;
        $trabajoStore = $trabajoController->store(
            [
                'id_solicitud' => $idSolicitud,
                'lugar' => $_POST['lugarTrabajo'][$key]
            ]
        );

        if (!$trabajoStore) {
            $_SESSION['errores'] = mostrarError('store');
            $success = false;
        }
        /* Si todo salio bien Cambiamos el estado a Actividades */
        if ($success) {
            unset($_SESSION['errores']);
            $solicitudController = new SolicitudController();
            $solicitudController->update(['id_estado' => 3], $idSolicitud);
        }
        header('Location: inscripcion.php#paso-3');
        exit();
}
else {
    $usuarioController = new UsuarioController();
    $usuario = $usuarioController->get(['id_wappersonas' => $id_wappersonas]);
    $userWithSolicitud = $usuarioController->getSolicitud($id_wappersonas);
    $_SESSION['errores'] = mostrarError('store');
    cargarLog($usuario['id'], $userWithSolicitud['id_solicitud'], 'No se realizo el POST: posible problema de limite de archivos por PHP', null, '03_trabajosPost');
    header("Refresh:0.01; url=inscripcion.php#paso-1", true, 303);
}
