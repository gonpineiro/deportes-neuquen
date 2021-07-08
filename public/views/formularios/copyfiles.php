<?php

$solicitudController = new SolicitudController();

/* Cargar de antecedentes penales */
$pathAp = getDireccionesParaAdjunto($_FILES['antecedentes']['type'], $idSolicitud, 'antecedentes', null);

$solicitudUpdated = $solicitudController->update(['path_ap' => $pathAp], $idSolicitud);

if (!copy($_FILES['antecedentes']['tmp_name'], $pathAp)) {
    $errores[] = "Solicitud nº $idSolicitud: Guardado de adjunto comprobante pago fallida";
    cargarLog($usuario['id'], $idSolicitud, $idCapacitador, "Solicitud nº $idSolicitud: Guardado de adjunto comprobante pago fallida");
}

/* Cargar del recibo */
$pathRecibo = getDireccionesParaAdjunto($_FILES['recibo']['type'], $idSolicitud, 'recibo', null);

$solicitudUpdated = $solicitudController->update(['path_recibo' => $pathRecibo], $idSolicitud);

if (!copy($_FILES['recibo']['tmp_name'], $pathRecibo)) {
    $errores[] = "Solicitud nº $idSolicitud: Guardado de adjunto comprobante pago fallida";
    cargarLog($usuario['id'], $idSolicitud, $idCapacitador, "Solicitud nº $idSolicitud: Guardado de adjunto comprobante pago fallida");
}

/* Carga de los titulos */
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

/* Carga de los trabajos */
$trabajoController = new TrabajoController();
foreach ($_FILES['imagenLugares']['tmp_name'] as $key => $unaImagen) {
    $fileType = $_FILES['imagenLugares']['type'][$key];
    $pathTrabajo = getDireccionesParaAdjunto($fileType, $idSolicitud, $_POST['lugarTrabajo'][$key], 'trabajos', $key);

    $trabajoUpdated = $trabajoController->store(
        [
            'id_solicitud' => $idSolicitud,
            'lugar' => $_POST['lugarTrabajo'][$key],
            'path_file' => $pathTrabajo,
        ],
        $idSolicitud
    );

    if (!$solicitudUpdated) {
        $errores[] = "Solicitud nro $idSolicitud: Falla en update comprobante pago";
        cargarLog($usuario['id'], $idSolicitud, $idCapacitador, "Solicitud nro $idSolicitud: Falla en update comprobante pago");
    }

    /* upload comprobante & certificado */
    if (!copy($unaImagen, $pathTrabajo)) {
        $errores[] = "Solicitud nº $idSolicitud: Guardado de adjunto comprobante pago fallida";
        cargarLog($usuario['id'], $idSolicitud, $idCapacitador, "Solicitud nº $idSolicitud: Guardado de adjunto comprobante pago fallida");
    }
}