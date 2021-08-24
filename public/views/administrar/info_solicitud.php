<?php
include '../../../app/config/config.php';

verificarUsuario(3);

/* datos de la sesion */
include('../common/session.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $actividadController = new ActividadController();
    $solicitudController = new SolicitudController();

    $solicitud = $solicitudController->getAllData($id);
    $solicitud['telefono'] = is_null($solicitud['telefono']) ? $celular : $solicitud['telefono'];
    $solicitud['email'] = is_null($solicitud['email']) ? $email : $solicitud['email'];
    $titulos = $solicitud['titulo'];
    $trabajos = $solicitud['trabajo'];

    $categoriaActividadController = new CategoriaActividadController();
    $categoriasActividades = $categoriaActividadController->index();

    $actividades = $solicitud['actividades'];
}
?>

<?php include('../common/header.php'); ?>

<div class="body container" style="padding-bottom: 50px;">
    <?php include('../common/navbar.php'); ?>
    <div style="min-height: 50px;">
        <h2 style="padding:30px 0px;color: #076AB3;">INFORMACIÓN SOLICITUD Nº <?= $id ?> - <?= $solicitud['nombre_te'] ?></h2>
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="card-body mb-5" style="border-bottom-right-radius: 20px;border-bottom-left-radius:20px;border-top-left-radius: .25rem;border-top-right-radius: .25rem;">
                    <img src=<?= $solicitud['foto'] ?> class="rounded mx-auto d-block px-2" style="width: 100%;" alt="">
                    <h5 class="text-white text-center pt-4"><?= $solicitud['nombre_te'] ?></h5>
                    <p><i class="bi bi-envelope-fill"></i> <?= $solicitud['email'] ?></p>
                    <p><i class="bi bi-phone-fill"></i> <?= $solicitud['telefono'] ?></p>
                </div>
            </div>
            <div class="col-12 col-md-9">
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
</div>

<?php include('./components/footer.php'); ?>