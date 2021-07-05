<?php
include '../../../app/config/config.php';

if (!isset($_SESSION['usuario'])) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
    exit();
}
$usuarioController = new UsuarioController();
$solicitudController = new SolicitudController();

/* datos de la sesion */
include('session.php');

/* Verificamos si existe el usuario */
$usuario = $usuarioController->get(['id_wappersonas' => $id_wappersonas]);
if ($usuario) {
    $userWithSolicitud = $usuarioController->getSolicitud($id_wappersonas);
    $id = $userWithSolicitud['id_solicitud'];
    $alta = $userWithSolicitud['fecha_alta'];
    $vencimiento = $userWithSolicitud['fecha_vencimiento'];
    $fechaEvaluacion = $userWithSolicitud['fecha_evaluacion'];

    switch ($userWithSolicitud['estado']) {
        case 'Nuevo':
            $estado_inscripcion = 'Enviado';
            break;

        case 'Rechazado':
            $userNot = "Su última solicitud fue rechazada. Puede generar una nueva solicitud.";
            $estado_inscripcion = 'Nuevo';
            break;

        case 'Aprobado':
            $arrayFechas = compararFechas($vencimiento, 'days');
            if ($arrayFechas['dif'] <= 7 || $arrayFechas['date'] <= $arrayFechas['now']) {
                $userNot = "La fecha de vencimiento de su libreta es : $vencimiento. Puede generar una nueva solicitud.";
                $estado_inscripcion = 'Nuevo';
            } else {
                $estado_inscripcion = 'Aprobado';
            }
            break;
    }
} else {
    /* Nunca solicita una libreta */
    $estado_inscripcion = 'Nuevo';
}
/* Envio POST de la solicitud */
if (isset($_POST) && !empty($_POST)) {
    if (checkFile()) {

        /* Verificamos si el nro_recibo ya se encuentra registrado */
        $nroRecibo = $solicitudController->get(['nro_recibo' => (string) $_POST['nro_recibo']]);
        if (!$nroRecibo) {
            /* Cargamos usuario */
            $id_wappersonas = $_SESSION['usuario']['wapPersonasId'];
            $usuario = $usuarioController->get(['id_wappersonas' => $id_wappersonas]);
            if (!$usuario) {
                $usuarioController->store(['id_wappersonas' => $id_wappersonas]);
            }

            /* buscamos el usuario  */
            $usuario = $usuarioController->get(['id_wappersonas' => $id_wappersonas]);

            /* Verificamos si cambio telefono o celular */
            if ($_POST['telefono'] !== (string)$celular || $_POST['email'] !== (string)$email) {
                $usuarioParams = [
                    'telefono' =>  $_POST['telefono'],
                    'email' => $_POST['email']
                ];
                $usuarioController->update($usuarioParams, $usuario['id']);
            }
            /* Guardamos la solicitud */
            $solicitudParams = [
                'id_usuario' => $usuario['id'],
                'id_usuario_admin' => null,
                'id_estado' => 1,
                'nro_recibo' => ltrim($_POST['nro_recibo'], "0"),
                'path_comprobante_pago' => null,
                'profesion' => $_POST['profesion'],
                'observaciones' => null,
                'modified_at' => null,
                'deleted_at' => null,
                'fecha_vencimiento' => null,
            ];
            $idSolicitud = $solicitudController->store($solicitudParams);

            if (isset($idSolicitud) && $idSolicitud != (false or null)) {
                /* Update solicitudes with paths */
                $pathComprobantePago = getDireccionesParaAdjunto($_FILES['path_comprobante_pago'], $idSolicitud, 'comprobante_pago');
                $solicitudUpdated = $solicitudController->update(
                    ['path_comprobante_pago' => $pathComprobantePago],
                    $idSolicitud
                );
                if (!$solicitudUpdated) {
                    $errores[] = "Solicitud nro $idSolicitud: Falla en update comprobante pago";
                    cargarLog($usuario['id'], $idSolicitud, $idCapacitador, "Solicitud nro $idSolicitud: Falla en update comprobante pago");
                }

                /* upload comprobante & certificado */
                if (!$solicitudUpdated || !copy($_FILES["path_comprobante_pago"]['tmp_name'], $pathComprobantePago)) {
                    $errores[] = "Solicitud nº $idSolicitud: Guardado de adjunto comprobante pago fallida";
                    cargarLog($usuario['id'], $idSolicitud, $idCapacitador, "Solicitud nº $idSolicitud: Guardado de adjunto comprobante pago fallida");
                }
            } else {
                $errores[] = 'Error en alta de solicitud';
                cargarLog($usuario['id'], $idSolicitud, $idCapacitador, 'Error en alta de solicitud');
            }
        } else {
            $errores['duplicado'] = "Nro. de comprobante sellado " . ltrim($_POST['nro_recibo'], "0") . " ya se encuentra registrado";
        }

        if (count($errores) > 0) {
            foreach ($errores as $error) {
                console_log($error);
            }
        } else {
            /* Envio mail */
            $enviarMailResult = enviarMailApi($_POST['email'], [$idSolicitud]);
            console_log('enviar mail: ' . json_encode($enviarMailResult));
            if ($enviarMailResult['error'] != null) {
                $errores[] = 'Error envio de mail:' . $enviarMailResult['error'];
                console_log($enviarMailResult['error']);
                cargarLog($usuario['id'], $idSolicitud, $idCapacitador, $enviarMailResult['error']);
            }
        }
        if (count($errores) == 0) {
            $estado_inscripcion = 'Exitosa';
        }
    } else {
        $errores[] = 'Error adjunto';
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../../estilos/estilo.css">
    <title>Registro de profesionales y afines a la actividad física</title>
</head>

<body>
    <?php
    include('./components/header.php');

    switch ($estado_inscripcion) {
        case 'Nuevo':
            isset($_GET['tipo']) && $_GET['tipo'] == 'e' && $_SESSION['userPerfiles'] == (2 || 3) ? include('inscripcion_empresarial.php') : include('inscripcion_individual.php');
            break;

        case 'Exitosa':
            include('./components/inscripcion_exitosa.php');
            break;

        case 'Enviado':
            include('./components/inscripcion_enviado.php');
            break;

        case 'Aprobado':
            include('./components/inscripcion_aprobado.php');
            break;
    }
    ?>
</body>

<script src="../../../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../../node_modules/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="../../js/formularios/inscripcion.js"></script>


</html>