<?php
include '../../../app/config/config.php';

if (!isset($_SESSION['usuario'])) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
    exit();
}

/* datos de la sesion */
include('../common/session.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $solicitudController = new SolicitudController();
    $solicitud = $solicitudController->getAllData($id);
    $solicitud['telefono'] = is_null($solicitud['telefono']) ? $celular : $solicitud['telefono'];
    $solicitud['email'] = is_null($solicitud['email']) ? $email : $solicitud['email'];
}
?>

<?php include('../common/header.php'); ?>

<div class="body container" style="padding-bottom: 50px;">
    <?php include('../common/navbar.php'); ?>
    <div style="min-height: 50px;">
        <h2 style="padding:30px 0px;color: #076AB3;">INFORMACIÓN SOLICITUD Nº <?= $id ?></h2>
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