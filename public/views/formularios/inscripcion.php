<?php
include '../../../app/config/config.php';

if (!isset($_SESSION['usuario'])) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
    exit();
}

/* datos de la sesion */
include('session.php');

/* Inicializamos los controladores */
$usuarioController = new UsuarioController();
$solicitudController = new SolicitudController();
$tituloController = new TituloController();
$trabajoController = new TrabajoController();
$barrioController = new BarrioController();

/* Verificamos si existe el usuario */
$usuario = $usuarioController->get(['id_wappersonas' => $id_wappersonas]);
if ($usuario) {
    $userWithSolicitud = $usuarioController->getSolicitud($id_wappersonas);
    $id = $userWithSolicitud['id_solicitud'];
    $alta = $userWithSolicitud['fecha_alta'];
    $vencimiento = $userWithSolicitud['fecha_vencimiento'];
    $fechaEvaluacion = $userWithSolicitud['fecha_evaluacion'];

    switch ($userWithSolicitud['id_estado']) {
        case '1':
            /* Titulos */
            $estado_inscripcion = 'Titulos';
            break;

        case '2':
            /* Trabajos */
            $estado_inscripcion = 'Trabajos';
            break;

        case '3':
            /* Actividades */
            //$userNot = "Su última solicitud fue rechazada. Puede generar una nueva solicitud.";
            $estado_inscripcion = 'Actividades';
            break;

        case '4':
            /* Condiciones */
            $estado_inscripcion = 'Condiciones';
            break;

        case '5':
            /* Resumen */
            $estado_inscripcion = 'Resumen';
            break;

        case '8':
            /* Aprobado */
            $arrayFechas = compararFechas($vencimiento, 'days');
            if ($arrayFechas['dif'] <= 7 || $arrayFechas['date'] <= $arrayFechas['now']) {
                $userNot = "La fecha de vencimiento de su libreta es : $vencimiento. Puede generar una nueva solicitud.";
                $estado_inscripcion = 'Nuevo';
            } else {
                $estado_inscripcion = 'Aprobado';
            }
            break;

        case '9':
            /* Impreso */
            $estado_inscripcion = 'Condiciones';
            break;

        case '11':
            /* Cancelado */
            $estado_inscripcion = 'DatosPersonales';
            break;

        case false:
            /* Impreso */
            $estado_inscripcion = 'DatosPersonales';
            break;
    }
} else {
    /* Nunca solicita una libreta */
    $estado_inscripcion = 'DatosPersonales';
    unset($_SESSION['errores']);
}


/* Envio POST de la solicitud */
if (isset($_POST) && !empty($_POST)) {
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
                    'dni' => null,
                    'genero' => null,
                    'email' => null,
                    'nacionalidad' => $_POST['nacionalidad'],
                    'id_ciudad' => $_POST['ciudad'],
                    'id_barrio' => $_POST['barrio-nqn'],
                    'id_zona' => 3,
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

            $solicitudParams = [
                'id_usuario' => $usuario['id'],
                'id_usuario_admin' => null,
                'id_estado' => 1,
                'nro_recibo' => ltrim($_POST['nro_recibo'], "0"),
                'path_file' => null,
                'observaciones' => null,
                'modified_at' => null,
                'deleted_at' => null,
                'fecha_vencimiento' => null,
                'fecha_evaluacion' => null,

            ];
            $idSolicitud = $solicitudController->store($solicitudParams);

            // Carga de imagenes en titulo
            if (isset($idSolicitud) && $idSolicitud != (false or null)) {

                include('./copyfiles.php');
            } else {
                $errores[] = 'Error en alta de solicitud';
                //cargarLog($usuario['id'], $idSolicitud, $idCapacitador, 'Error en alta de solicitud');
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
    <link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css"> 
    <link rel="stylesheet" href="../../estilos/estilo.css">
    <title>Registro de profesionales y afines a la actividad física</title>
</head>

<body>
    <?php
    include('./components/header.php');

    switch ($estado_inscripcion) {
        case 'DatosPersonales':
            include('inscripcion_individual.php');
            break;

        case 'Titulos':
            include('inscripcion_individual.php');
            break;

        case 'Trabajos':
            include('inscripcion_individual.php');
            break;

        case 'Actividades':
            include('inscripcion_individual.php');
            break;

        case 'Condiciones':
            include('inscripcion_individual.php');
            break;

        case 'Cancelado':
            include('./components/inscripcion_individual.php');
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