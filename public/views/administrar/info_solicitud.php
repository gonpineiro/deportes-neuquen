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

    $personalTab = !isset($_SESSION['tab_active']) ? 'active' : '';
    if (isset($_SESSION['tab_active'])) {
        $actividadTab = $_SESSION['tab_active'] == 'actividad' ? 'active' : '';
        $tituloTab = $_SESSION['tab_active'] == 'titulo' ? 'active' : '';
        $trabajoTab = $_SESSION['tab_active'] == 'trabajo' ? 'active' : '';
    }
    unset($_SESSION['tab_active']);
}
?>

<?php include('../common/header.php'); ?>

<div class="body container" style="padding-bottom: 50px;">
    <?php include('../common/navbar.php'); ?>
    <div style="min-height: 50px;">
        <h2 id="main" style="padding:30px 0px;color: #076AB3;">INFORMACIÓN SOLICITUD Nº <?= $id ?> - <?= $solicitud['nombre_te'] ?></h2>
        <div class="row" >
            <div class="col-12 col-md-3">
                <div class="card-body mb-5" style="border-bottom-right-radius: 20px;border-bottom-left-radius:20px;border-top-left-radius: .25rem;border-top-right-radius: .25rem;">
                    <img src=<?= $solicitud['foto'] ?> class="rounded mx-auto d-block px-2 pb-3" style="width: 100%;" alt="">
                    <h5 class="text-white text-center py-3"><?= $solicitud['nombre_te'] ?></h5>
                    <p><i class="bi bi-envelope-fill"></i> <?= $solicitud['email'] ?></p>
                    <p><i class="bi bi-phone-fill"></i> <?= $solicitud['telefono'] ?></p>
                </div>
            </div>
            <div class="col-12 col-md-9">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link <?= $personalTab ?>" id="datosPersonales-tab" data-toggle="tab" href="#datosPersonales" role="tab" aria-controls="datosPersonales" aria-selected="true">Datos Personales</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link <?= $tituloTab ?>" id="formacionAcademica-tab" data-toggle="tab" href="#formacionAcademica" role="tab" aria-controls="formacionAcademica" aria-selected="false">Formación Académica</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link <?= $trabajoTab ?>" id="lugarTrabajo-tab" data-toggle="tab" href="#lugarTrabajo" role="tab" aria-controls="lugarTrabajo" aria-selected="false">Lugar trabajoTab</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link <?= $actividadTab ?>" id="actividades-tab" data-toggle="tab" href="#actividades" role="tab" aria-controls="actividades" aria-selected="false">Actividades</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="condiciones-tab" data-toggle="tab" href="#condiciones" role="tab" aria-controls="condiciones" aria-selected="false">Condiciones</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade <?= " show " . $personalTab ?>" id="datosPersonales" role="tabpanel" aria-labelledby="datosPersonales-tab">
                        <?php include('./tabs/datosPersonales.php'); ?>
                    </div>
                    <div class="tab-pane fade <?= " show " . $tituloTab ?>" id="formacionAcademica" role="tabpanel" aria-labelledby="formacionAcademica-tab">
                        <?php include('./tabs/formacionAcademica.php'); ?>
                    </div>
                    <div class="tab-pane fade <?= " show " . $trabajoTab ?>" id="lugarTrabajo" role="tabpanel" aria-labelledby="lugarTrabajo-tab">
                        <?php include('./tabs/lugarTrabajo.php'); ?>
                    </div>
                    <div class="tab-pane fade <?= " show " . $actividadTab ?>" id="actividades" role="tabpanel" aria-labelledby="actividades-tab">
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