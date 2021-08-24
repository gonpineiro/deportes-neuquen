<?PHP

if ($_GET['id']) {
    $id_solicitud = $_GET['id'];
}
?>

<?php
include '../../../app/config/config.php';

if (!isset($_SESSION['usuario'])) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
    exit();
}
/* datos de la sesion */
include('../common/session.php');
$categoriaActividadController = new CategoriaActividadController();
$actividadController = new ActividadController();
// datos de la solicitud
$sol_nombre = "Nombre Apellido";
$sol_email = "mail@mail.com";
$sol_celular = 54654654;
$sol_nacionalidad = "Argentina";
$sol_ciudad = "Neuquén";
$sol_barrio = "Barrio X";
$sol_cod_postal = 8300;
$sol_dire_calle = "Evergreen";
$sol_dire_numero = 3500;
$sol_dire_depto = 1015;
$sol_dire_piso = 5;
$sol_antecedentes = "../../BASES_Y_CONDICIONES.pdf";
$sol_titulo = [
    0 => [
        "id" => "1",
        "titulo" => "Licenciado en Educación Física",
        "path_file" => "../../BASES_Y_CONDICIONES.pdf",
    ],
    1 => [
        "id" => "2",
        "titulo" => "Maestro en Judo",
        "path_file" => "../../BASES_Y_CONDICIONES.pdf",
    ],
];
$sol_trabajo = [
    0 => [
        "id" => "1",
        "lugar" => "Ferraciolli",
        "path_file" => "../../BASES_Y_CONDICIONES.pdf",
    ],
    1 => [
        "id" => "2",
        "lugar" => "Ectremo Deborte",
        "path_file" => "../../BASES_Y_CONDICIONES.pdf",
    ],
];
$sol_actividades =
    [
        0 => [
            "nombre" => "Judo",
        ],
        1 => [
            "nombre" => "Balonmano",
        ],
    ];
?>

<?php include('../common/header.php'); ?>

<div class="body container" style="padding-bottom: 50px;">
    <?php include('../common/navbar.php'); ?>
    <div style="min-height: 50px;">
        <h2 style="padding:30px 0px;color: #076AB3;">INFORMACIÓN SOLICITUD Nº <?= $id_solicitud ?> - <?= $sol_nombre ?></h2>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="datosPersonales-tab" data-toggle="tab" href="#datosPersonales" role="tab" aria-controls="datosPersonales" aria-selected="true">Datos Personales</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="formacionAcademica-tab" data-toggle="tab" href="#formacionAcademica" role="tab" aria-controls="formacionAcademica" aria-selected="false">Formación Académica</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="lugarTrabajo-tab" data-toggle="tab" href="#lugarTrabajo" role="tab" aria-controls="lugarTrabajo" aria-selected="false">Lugar Trabajo</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="actividades-tab" data-toggle="tab" href="#actividades" role="tab" aria-controls="actividades" aria-selected="false">Actividades</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="condiciones-tab" data-toggle="tab" href="#condiciones" role="tab" aria-controls="condiciones" aria-selected="false">Condiciones</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="datosPersonales" role="tabpanel" aria-labelledby="datosPersonales-tab">
                <?php include('./tabs/datosPersonales.php'); ?>
            </div>
            <div class="tab-pane fade" id="formacionAcademica" role="tabpanel" aria-labelledby="formacionAcademica-tab">
                <?php include('./tabs/formacionAcademica.php'); ?>
            </div>
            <div class="tab-pane fade" id="lugarTrabajo" role="tabpanel" aria-labelledby="lugarTrabajo-tab">
                <?php include('./tabs/lugarTrabajo.php'); ?>
            </div>
            <div class="tab-pane fade" id="actividades" role="tabpanel" aria-labelledby="actividades-tab">
                <?php include('./tabs/actividades.php'); ?>
            </div>
            <div class="tab-pane fade" id="condiciones" role="tabpanel" aria-labelledby="condiciones-tab">
                <?php include('./tabs/condiciones.php'); ?>
            </div>
        </div>

    </div>
</div>


</div>

<?php include('./components/footer.php'); ?>