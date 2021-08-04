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
$tituloController = new TituloController();
$trabajoController = new TrabajoController();

/* datos de la sesion */
include('session.php');

/* Verificamos si existe el usuario */
$usuario = $usuarioController->get(['id_wappersonas' => $id_wappersonas]);
if ($usuario) {
    if (!isset($_POST['RenovarSolicitud'])) {
        $userWithSolicitud = $usuarioController->getSolicitud($id_wappersonas);
        $alta = $userWithSolicitud['fecha_alta'];
        $vencimiento = $userWithSolicitud['fecha_vencimiento'];
        $fechaEvaluacion = $userWithSolicitud['fecha_evaluacion'];
    } else {
        $estado_nueva_solicitud = 'RenovarSolicitud';
        $userWithSolicitud['id_estado'] = '0';
    }

    switch ($userWithSolicitud['id_estado']) {
        case '0':
            /* Datos Personales */
            $estado_inscripcion = 'DatosPersonales';
            break;
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
                /* Para controlar cuando quizo generar una nueva solicitud pero pero el nro de recibo esta duplicado */
                if (isset($_SESSION['errores'])) {
                    $estado_inscripcion = 'DatosPersonales';
                } else {
                    $estado_inscripcion = 'Opciones Generar';
                }
            } else {
                $estado_inscripcion = 'Aprobado';
            }
            break;

        case '9':
            /* Condiciones */
            $estado_inscripcion = 'Condiciones';
            break;

        case '11':
            /* Cancelado */
            $estado_inscripcion = 'DatosPersonales';
            break;

        case false:
            /* DatosPersonales */
            $estado_inscripcion = 'DatosPersonales';
            break;
    }
} else {
    /* Nunca solicita una libreta */
    $estado_inscripcion = 'DatosPersonales';
    unset($_SESSION['errores']);
}

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

    case 'Opciones Generar':
        include('./components/inscripcion_opciones.php');
        break;
}
include('./components/footer.php');
