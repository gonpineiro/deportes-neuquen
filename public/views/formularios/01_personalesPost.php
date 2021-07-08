<?php

include '../../../app/config/config.php';

if (!isset($_SESSION['usuario'])) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
    exit();
}

$usuarioController = new UsuarioController();
$solicitudController = new SolicitudController();

if (isset($_POST) && !empty($_POST) && isset($_POST['personalesSubmit'])) {
    if (true) {
        /* Verificamos si el nro_recibo ya se encuentra registrado */
        $nroRecibo = $solicitudController->get(['nro_recibo' => (string) $_POST['nro_recibo']]);
        if (!$nroRecibo) {
            /* Cargamos usuario */
            $id_wappersonas = $_SESSION['usuario']['wapPersonasId'];
            $usuario = $usuarioController->get(['id_wappersonas' => $id_wappersonas]);
            if (!$usuario) {
                $usuarioController->store([
                    'id_wappersonas' => $id_wappersonas,
                    'nombre' => null,
                    'apellido' => null,
                    'telefono' => null,
                    'email' => null,
                    'nacionalidad' => $_POST['nacionalidad'],
                    'id_ciudad' => $_POST['ciudad'],
                    'id_barrio' => $_POST['barrio-nqn'],
                    'direccion_calle' => $_POST['direccion-calle'],
                    'direccion_nro' => $_POST['direccion-numero'],
                    'direccion_depto' => $_POST['direccion-departamento'],
                    'direccion_piso' => $_POST['direccion-piso'],
                    'direccion_cp' => $_POST['direccion-cp'],
                ]);
            }
            $usuario = $usuarioController->get(['id_wappersonas' => $id_wappersonas]);

            /* Verificamos si cambio telefono o celular */
            if ($_POST['telefono'] !== (string)$celular || $_POST['email'] !== (string)$email) {
                $usuarioParams = [
                    'telefono' =>  $_POST['telefono'],
                    'email' => $_POST['email']
                ];
                $usuarioController->update($usuarioParams, $usuario['id']);
            }

            $solicitudParams = [
                'id_usuario' => $usuario['id'],
                'id_usuario_admin' => null,
                'id_estado' => 1,
                'nro_recibo' => ltrim($_POST['nro_recibo'], "0"),
                'path_ap' => null,
                'path_recibo' => null,
                'observaciones' => null,
                'modified_at' => null,
                'deleted_at' => null,
                'fecha_vencimiento' => null,
                'fecha_evaluacion' => null,

            ];
            $idSolicitud = $solicitudController->store($solicitudParams);
            $_SESSION['idSolicitud'] = $idSolicitud;

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
        } else {
            $errores['duplicado'] = "Nro. de comprobante sellado " . ltrim($_POST['nro_recibo'], "0") . " ya se encuentra registrado";
        }
    } else {
        $errores[] = 'Error adjunto';
    }
    header('Location: inscripcion.php');
    exit();
}
