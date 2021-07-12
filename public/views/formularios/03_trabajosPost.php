<?php

include '../../../app/config/config.php';

if (!isset($_SESSION['usuario'])) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
    exit();
}

/* datos de la sesion */
include('session.php');

if (isset($_POST) && !empty($_POST) && isset($_POST['trabajoSubmit'])) {
    $usuarioController = new UsuarioController();
    $userWithSolicitud = $usuarioController->getSolicitud($id_wappersonas);
    $idSolicitud = $userWithSolicitud['id_solicitud'];

    $trabajoController = new TrabajoController();
    foreach ($_FILES['imagenLugares']['tmp_name'] as $key => $unaImagen) {
        $fileType = $_FILES['imagenLugares']['type'][$key];
        $pathTrabajo = getDireccionesParaAdjunto($fileType, $idSolicitud, $_POST['lugarTrabajo'][$key], 'trabajos', $key);

        /* upload comprobante & certificado */
        if (copy($unaImagen, $pathTrabajo)) {
            $trabajoUpdated = $trabajoController->store(
                [
                    'id_solicitud' => $idSolicitud,
                    'lugar' => $_POST['lugarTrabajo'][$key],
                    'path_file' => $pathTrabajo,
                ],
            );

            $solicitudController = new SolicitudController();

            /* Cambiamos el estado a Trabajos */
            $solicitudController->update(['id_estado' => 3], $idSolicitud);

            if (!$solicitudUpdated) {
                $errores[] = "Solicitud nro $idSolicitud: Falla en update comprobante pago";
                cargarLog($usuario['id'], $idSolicitud, $idCapacitador, "Solicitud nro $idSolicitud: Falla en update comprobante pago");
            }
        } else {            
            $errores[] = "Solicitud nº $idSolicitud: Guardado de adjunto comprobante pago fallida";
            cargarLog($usuario['id'], $idSolicitud, $idCapacitador, "Solicitud nº $idSolicitud: Guardado de adjunto comprobante pago fallida");
        }
    }    
    header('Location: inscripcion.php#paso-3');
    exit();
}
