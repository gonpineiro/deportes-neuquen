<?php

include '../../../app/config/config.php';

if (!isset($_SESSION['usuario'])) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
    exit();
}

$usuarioController = new UsuarioController();
$solicitudController = new SolicitudController();
$_SESSION['erroresSolicitud']['titulos'] = null;

if (isset($_POST) && !empty($_POST) && isset($_POST['personalesSubmit'])) {
    if (true) {
        /* Verificamos si el nro_recibo ya se encuentra registrado */
        $nroRecibo = $solicitudController->get(['nro_recibo' => (string) $_POST['nro_recibo']]);
        if (!$nroRecibo) {
            /* Cargamos usuario */
            $id_wappersonas = $_SESSION['usuario']['wapPersonasId'];
            $usuario = $usuarioController->get(['id_wappersonas' => $id_wappersonas]);
            if (!$usuario) {
                $direccionDepto = $_POST['direccion-departamento'] = '' ? null : $_POST['direccion-departamento'];
                $direccionPiso = $_POST['direccion-piso'] = '' ? null : $_POST['direccion-piso'];
                $otroBarrio = $_POST['barrio-nqn-otro'] = '' ? null : $_POST['barrio-nqn-otro'];
                $usuarioController->store([
                    'id_wappersonas' => $id_wappersonas,
                    'nombre' => null,
                    'apellido' => null,
                    'telefono' => null,
                    'email' => null,
                    'nacionalidad' => $_POST['nacionalidad'],
                    'id_ciudad' => $_POST['ciudad'],
                    'id_barrio' => $_POST['barrio-nqn'],
                    'otro_barrio' => $otroBarrio,
                    'direccion_calle' => $_POST['direccion-calle'],
                    'direccion_nro' => $_POST['direccion-numero'],
                    'direccion_depto' => $direccionDepto,
                    'direccion_piso' => $direccionPiso,
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

            /* Cargar de antecedentes penales */
            $pathAp = getDireccionesParaAdjunto($_FILES['antecedentes']['type'], $idSolicitud, 'antecedentes', null);
            if (copy($_FILES['antecedentes']['tmp_name'], $pathAp)) {

                /* Cargar del recibo */
                $pathRecibo = getDireccionesParaAdjunto($_FILES['recibo']['type'], $idSolicitud, 'recibo', null);
                if (copy($_FILES['recibo']['tmp_name'], $pathRecibo)) {
                    $solicitudParams = [
                        'id_usuario' => $usuario['id'],
                        'id_usuario_admin' => null,
                        'id_estado' => 1,
                        'nro_recibo' => ltrim($_POST['nro_recibo'], "0"),
                        'path_ap' => $pathAp,
                        'path_recibo' => $pathRecibo,
                        'observaciones' => null,
                        'modified_at' => null,
                        'deleted_at' => null,
                        'fecha_vencimiento' => null,
                        'fecha_evaluacion' => null,

                    ];
                    $idSolicitud = $solicitudController->store($solicitudParams);
                } else {
                    $_SESSION['errores'] = "Guardado de adjunto comprobante de pago fallida";
                }
            } else {
                $_SESSION['errores'] = "Guardado de adjunto antecendetes penales fallido";
            }
        } else {
            $_SESSION['errores'] = "Nro. de comprobante sellado " . ltrim($_POST['nro_recibo'], "0") . " ya se encuentra registrado";
        }
        header('Location: inscripcion.php#paso-1');
        exit();
    } else {
        $errores[] = 'Error adjunto';
        header("Refresh:0.01; url=inscripcion.php", true, 303);
        exit();
    }
}
