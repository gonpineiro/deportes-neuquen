<?php
/* Update solicitudes with paths */
$tituloController = new TituloController();
foreach ($_FILES['imagenTitulos']['tmp_name'] as $key => $unaImagen) {
    $fileType = $_FILES['imagenTitulos']['type'][$key];
    $pathTítulo = getDireccionesParaAdjunto($fileType, $idSolicitud, $_POST['titulos'][$key], 'titulos', $key);
    $solicitudUpdated = $tituloController->store(
        [
            'id_solicitud' => $idSolicitud,
            'titulo' => $_POST['titulos'][$key],
            'path_file' => $pathTítulo,
            'es_curso' => null
        ],
        $idSolicitud
    );
    if (!$solicitudUpdated) {
        $errores[] = "Solicitud nro $idSolicitud: Falla en update comprobante pago";
        cargarLog($usuario['id'], $idSolicitud, $idCapacitador, "Solicitud nro $idSolicitud: Falla en update comprobante pago");
    }

    /* upload comprobante & certificado */
    if (!copy($unaImagen, $pathTítulo)) {
        $errores[] = "Solicitud nº $idSolicitud: Guardado de adjunto comprobante pago fallida";
        cargarLog($usuario['id'], $idSolicitud, $idCapacitador, "Solicitud nº $idSolicitud: Guardado de adjunto comprobante pago fallida");
    }
}