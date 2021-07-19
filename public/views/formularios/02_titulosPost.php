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
        $success = true;
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
                    ]
                );

                if (!$tituloStore) {
                    $_SESSION['errores'] = mostrarError('store');
                    $success = false;
                    break;
                }
            } else {
                $_SESSION['errores'] = mostrarError('file', $_FILES['imagenTitulos']['name'][$key]);
                $success = false;
                break;
            }
        }

        /* Si todo salio bien Cambiamos el estado a Trabajos*/
        if ($success) {
            unset($_SESSION['errores']);
            $solicitudController = new SolicitudController();
            $solicitudController->update(['id_estado' => 2], $idSolicitud);
        }

        header('Location: inscripcion.php#paso-2');
        exit();
    } else {
        header("Refresh:0.01; url=inscripcion.php", true, 303);
        exit();
    }
}
if(isset($_POST['reiniciarFormulario'])) {
    header('https://google.com.ar');
    exit();
}
else {
    $usuarioController = new UsuarioController();
    $usuario = $usuarioController->get(['id_wappersonas' => $id_wappersonas]);
    $userWithSolicitud = $usuarioController->getSolicitud($id_wappersonas);
    $_SESSION['errores'] = mostrarError('postFile');
    cargarLog($usuario['id'], $userWithSolicitud['id_solicitud'], 'No se realizo el POST: posible problema de limite de archivos por PHP', null, '02_titulosPost');
    header("Refresh:0.01; url=inscripcion.php#paso-1", true, 303);
}
