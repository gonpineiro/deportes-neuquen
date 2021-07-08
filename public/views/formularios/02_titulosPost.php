<?php

include '../../../app/config/config.php';

if (!isset($_SESSION['usuario'])) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
    exit();
}

if (isset($_POST) && !empty($_POST) && isset($_POST['tituloSubmit'])) {
    $idSolicitud = $_SESSION['idSolicitud'];
    $tituloController = new TituloController();
    foreach ($_FILES['imagenTitulos']['tmp_name'] as $key => $unaImagen) {
        $fileType = $_FILES['imagenTitulos']['type'][$key];
        $pathTítulo = getDireccionesParaAdjunto($fileType, $idSolicitud, $_POST['titulos'][$key], 'titulos', $key);

        /* upload comprobante & certificado */
        if (copy($unaImagen, $pathTítulo)) {
            $solicitudUpdated = $tituloController->store(
                [
                    'id_solicitud' => $idSolicitud,
                    'titulo' => $_POST['titulos'][$key],
                    'path_file' => $pathTítulo,
                    'es_curso' => null
                ],
            );

            $solicitudController = new SolicitudController();

            /* Cambiamos el estado a Trabajos */
            $solicitudController->update(['id_estado' => 2], $idSolicitud);

            if (!$solicitudUpdated) {
                $errores[] = "Solicitud nro $idSolicitud: Falla en update comprobante pago";
                cargarLog($usuario['id'], $idSolicitud, $idCapacitador, "Solicitud nro $idSolicitud: Falla en update comprobante pago");
            }
        } else {            
            $errores[] = "Solicitud nº $idSolicitud: Guardado de adjunto comprobante pago fallida";
            cargarLog($usuario['id'], $idSolicitud, $idCapacitador, "Solicitud nº $idSolicitud: Guardado de adjunto comprobante pago fallida");
        }
    }    
    header('Location: inscripcion.php#paso-2');
    exit();
}
