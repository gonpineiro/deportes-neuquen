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
    $usuarioController = new UsuarioController();
    $userWithSolicitud = $usuarioController->getSolicitud($id_wappersonas);
    $id_solicitud = $userWithSolicitud['id_solicitud'];
    $id_usuario = $userWithSolicitud['id_usuario'];
    $tituloController = new TituloController();

    if (isset($_POST['titulos-aprobados']) && count($_POST['titulos-aprobados']) > 0) {
        foreach ($_POST['titulos-aprobados'] as $key => $titulo) {
            $path = $_POST["titulos-aprobados-path"][$key];
            $tituloStore = $tituloController->store(
                [
                    'id_solicitud' => $id_solicitud,
                    'id_usuario' => $id_usuario,
                    'titulo' => $titulo,
                    'estado' => 'Nuevo',
                    'path_file' => $_POST["titulos-aprobados-path"][$key],
                    'es_curso' => null,
                    'deleted_at' => null
                ]
            );
        }
    }
    
    if (count($_FILES['imagenTitulos']['size']) >= 1 && $_FILES['imagenTitulos']['size'] != 0) {
        if (checkFile()) {
            $success = true;
            $nroTitulo = 1;
            foreach ($_FILES['imagenTitulos']['tmp_name'] as $key => $unaImagen) {
                $nombreTitulo = "titulo_$nroTitulo";
                $fileType = $_FILES['imagenTitulos']['type'][$key];
                $pathTítulo = getDireccionesParaAdjunto($fileType, $id_solicitud, $nombreTitulo, 'titulos');

                /* upload comprobante & certificado */
                if (copy($unaImagen, $pathTítulo)) {
                    $tituloStore = $tituloController->store(
                        [
                            'id_solicitud' => $id_solicitud,
                            'id_usuario' => $id_usuario,
                            'titulo' => $_POST['titulos'][$key],
                            'estado' => 'Nuevo',
                            'path_file' => $pathTítulo,
                            'es_curso' => null,
                            'deleted_at' => null
                        ]
                    );
                    $nroTitulo++;
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
                $solicitudController->update(['id_estado' => 2], $id_solicitud);
            }

            header('Location: inscripcion.php#paso-2');
            exit();
        } else {
            header("Refresh:0.01; url=inscripcion.php", true, 303);
            exit();
        }
    } else {
        unset($_SESSION['errores']);
        $solicitudController = new SolicitudController();
        $solicitudController->update(['id_estado' => 2], $id_solicitud);
        header("Refresh:0.01; url=inscripcion.php", true, 303);
        exit();
    }
} else {
    $usuarioController = new UsuarioController();
    $usuario = $usuarioController->get(['id_wappersonas' => $id_wappersonas]);
    $userWithSolicitud = $usuarioController->getSolicitud($id_wappersonas);
    $_SESSION['errores'] = mostrarError('postFile');
    cargarLog($usuario['id'], $userWithSolicitud['id_solicitud'], 'No se realizo el POST: posible problema de limite de archivos por PHP', null, '02_titulosPost');
    header("Refresh:0.01; url=inscripcion.php#paso-1", true, 303);
}
