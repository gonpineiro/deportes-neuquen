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
            $trabajoStore = $trabajoController->store(
                [
                    'id_solicitud' => $idSolicitud,
                    'lugar' => $_POST['lugarTrabajo'][$key],
                    'path_file' => $pathTrabajo,
                ],
            );

            $solicitudController = new SolicitudController();

            /* Cambiamos el estado a Trabajos */
            $solicitudController->update(['id_estado' => 3], $idSolicitud);

            if (!$trabajoStore) {
                $_SESSION['errores'] = mostrarError('store');
            }            
            unset($_SESSION['errores']);
        } else {            
            $_SESSION['errores'] = mostrarError('file', $_FILES['imagenLugares']['name'][$key]);
        }
    }    
    header('Location: inscripcion.php#paso-3');
    exit();
}
