<?php

include '../../../app/config/config.php';

if (!isset($_SESSION['usuario'])) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
    exit();
}

/* datos de la sesion */
include('session.php');

if (isset($_POST) && !empty($_POST) && isset($_POST['tituloSubmit'])) {
    if (checkFile()) {
        $usuarioController = new UsuarioController();
        $userWithSolicitud = $usuarioController->getSolicitud($id_wappersonas);
        $idSolicitud = $userWithSolicitud['id_solicitud'];

        $tituloController = new TituloController();
        foreach ($_FILES['imagenTitulos']['tmp_name'] as $key => $unaImagen) {
            $fileType = $_FILES['imagenTitulos']['type'][$key];
            $pathTítulo = getDireccionesParaAdjunto($fileType, $idSolicitud, $_POST['titulos'][$key], 'titulos', $key);

            /* upload comprobante & certificado */
            if (copy($unaImagen, $pathTítulo)) {
                $tituloStore = $tituloController->store(
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

                if (!$tituloStore) {
                    $errores[] = "Solicitud nro $idSolicitud: Falla en update comprobante pago";
                }                
                unset($_SESSION['errores']);
            } else {
                $_SESSION['errores'] = "Guardado del archivo " . $_FILES['imagenTitulos']['name'][$key] . " fallido, hubo un error con el servidor.";
            }
        }
        header('Location: inscripcion.php#paso-2');
        exit();
    } else {
        header("Refresh:0.01; url=inscripcion.php", true, 303);
        exit();
    }
}
