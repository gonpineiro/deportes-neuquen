<?php
include '../../../app/config/config.php';

if (!isset($_SESSION['usuario'])) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
    exit();
}

$usuarioController = new UsuarioController();
$solicitudController = new SolicitudController();
$ciudadController = new CiudadController();
$barrioController = new BarrioController();
$categoriaActividadController = new CategoriaActividadController();
$actividadController = new ActividadController();

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
        case '6':
            /* Resumen */
            $estado_inscripcion = 'Exitosa';
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
            include('../components/inscripcion_individual.php');
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