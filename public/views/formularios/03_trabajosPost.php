<?php

include '../../../app/config/config.php';

if (!isset($_SESSION['usuario'])) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
    exit();
}

/* datos de la sesion */
include('../common/session.php');

if (isset($_POST) && !empty($_POST) && isset($_POST['trabajoSubmit']) && $_FILES['imagenLugares']['name'] != "") {
    $usuarioController = new UsuarioController();
    $userWithSolicitud = $usuarioController->getSolicitud($id_wappersonas);
    $id_solicitud = $userWithSolicitud['id_solicitud'];
    $id_usuario = $userWithSolicitud['id_usuario'];
    $trabajoController = new TrabajoController();

    /* if (isset($_POST['trabajos-aprobados']) && count($_POST['trabajos-aprobados']) > 0) {
        foreach ($_POST['trabajos-aprobados'] as $key => $lugar) {
            $path = $_POST["trabajos-aprobados-path"][$key];
            $tituloStore = $tituloController->store(
                [
                    'id_solicitud' => $id_solicitud,
                    'id_usuario' => $id_usuario,
                    'lugar' => $lugar,
                    'estado' => 'Nuevo',
                    'path_file' => $_POST["trabajos-aprobados-path"][$key],
                    'deleted_at' => null
                ]
            );
        }
    } */

    if (count($_FILES['imagenLugares']['size']) >= 1 && $_FILES['imagenLugares']['size'][0] != 0) {
        if (checkFile()) {
            $success = true;
            foreach ($_FILES['imagenLugares']['tmp_name'] as $key => $unaImagen) {
                $fileType = $_FILES['imagenLugares']['type'][$key];
                $pathTrabajo = getDireccionesParaAdjunto($fileType, $id_solicitud, $key, 'trabajos', $key);

                /* upload comprobante & certificado */
                if (copy($unaImagen, $pathTrabajo)) {
                    $trabajoStore = $trabajoController->store(
                        [
                            'id_solicitud' => $id_solicitud,
                            'id_usuario' => $id_usuario,
                            'lugar' => $_POST['lugarTrabajo'][$key],
                            'estado' => 'Nuevo',
                            'path_file' => $pathTrabajo,
                            'deleted_at' => null,
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
                $solicitudController->update(['id_estado' => 3], $id_solicitud);
            }
            header('Location: inscripcion.php#paso-3');
            exit();
        } else {
            header("Refresh:0.01; url=inscripcion.php", true, 303);
            exit();
        }
    }
    if (isset($_POST) && !empty($_POST) && isset($_POST['trabajoSubmit']) && !isset($_FILES['imagenLugares']) && empty($_FILES['imagenLugares']['name'] == "")) {
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
    } else {
        unset($_SESSION['errores']);
        $solicitudController = new SolicitudController();
        $solicitudController->update(['id_estado' => 3], $id_solicitud);
        header("Refresh:0.01; url=inscripcion.php", true, 303);
        exit();
    }
} else {
    $usuarioController = new UsuarioController();
    $usuario = $usuarioController->get(['id_wappersonas' => $id_wappersonas]);
    $userWithSolicitud = $usuarioController->getSolicitud($id_wappersonas);
    $_SESSION['errores'] = mostrarError('store');
    cargarLog($usuario['id'], $userWithSolicitud['id_solicitud'], 'No se realizo el POST: posible problema de limite de archivos por PHP', null, '03_trabajosPost');
    header("Refresh:0.01; url=inscripcion.php#paso-1", true, 303);
}
