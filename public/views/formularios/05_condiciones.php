<?php
// Busco el id de la solicitud
$userWithSolicitud = $usuarioController->getSolicitud($id_wappersonas);
$idSolicitud = $userWithSolicitud['id_solicitud'];

// Busco los datos de la solicitud
$solicitud = $solicitudController->getAllData($idSolicitud);
?>

<div id="paso-4" class="card-body mb-5" style="border-bottom-right-radius: 20px;border-bottom-left-radius:20px;background-color:#F8FDFF;color:black;">
    <h5>Datos Personales:</h5>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <p>Email: <?= $solicitud['email'] ? $solicitud['email'] : 'No actualizado' ?>
            <p>Ciudad: <?= utf8_encode($solicitud['ciudad']); ?> CP: <?= $solicitud['cp']; ?></span></p>
            <p>Barrio: <span><?= utf8_encode($solicitud['barrio']); ?></span></p>
            <p>Dirección: <span><?= utf8_encode($solicitud['calle']) . " " . $solicitud['nro_calle']; ?></span></p>
            <p>Código Postal: <span><?= $solicitud['cp']; ?></span></p>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <p>Antecedentes Archivo: <span>
                    <?php
                    if ($solicitud['path_ap']) {
                        echo "Cargado <i class='bi bi-check-square-fill text-success'></i>";
                    };
                    ?></span></p>
            <p>Recibo Nº: <span><?= $solicitud['nro_recibo'] . " Cargado <i class='bi bi-check-square-fill text-success'></i>"; ?></span></p>
        </div>
    </div>
    <hr>
    <h5>Educación:</h5>
    <?php foreach ($solicitud['titulo'] as $titulo) { ?>
        <p>Titulo:
            <span>
                <?= $titulo['titulo'] ?> <i class='bi bi-check-square-fill text-success'></i>
            </span>
        </p>
    <?php } ?>

    <hr>
    <h5>Locaciones:</h5>
    <?php foreach ($solicitud['trabajo'] as $trabajo) { ?>
        <p><?= utf8_encode($trabajo['lugar']) . " <i class='bi bi-check-square-fill text-success'></i>" ?></p>
    <?php } ?>
    <hr>
    <h5>Actividades</h5>
    <div class="row">
        <?php foreach ($solicitud['actividades'] as $actividad) { ?>
            <div class="col-lg-2 col-md-12 pb-2">
                <span><?= $actividad['nombre']; ?></span>
            </div>
        <?php } ?>
    </div>
    <hr>
    <form action="05_condicionesPost.php" method="POST" enctype="multipart/form-data" class="form-horizontal mx-auto needs-validation" name="form-52" id="form-52">
        <h4>Aceptar Términos</h4>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="terminosycondiciones" id="terminosycondiciones" required>
                <label class="form-check-label" for="terminosycondiciones">
                    He le&iacute;do y acepto las <a class="ml-1" href="BASES_Y_CONDICIONES.pdf" target="_blank" style="text-decoration: underline;"> Bases y condiciones </a>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="clausulavalidezddjj" id="clausulavalidezddjj" required>
                <label class="form-check-label" for="clausulavalidezddjj">
                    He le&iacute;do y acepto la <a class="ml-1" href="BASES_Y_CONDICIONES.pdf" target="_blank" style="text-decoration: underline;"> Cláusula de Validez de DDJJ</a>
                </label>
            </div>

            <div class="invalid-feedback" style="color: #dc3545;">
                <strong>
                    Debe aceptar los t&eacute;rminos.
                </strong>
            </div>
        </div>
        <div class="form-inline">
            <span>
                Cualquier duda o consulta pod&eacute;s enviarnos un email a: <a href="fiscalizaciondeportiva@muninqn.gov.ar" target="_blank" style="text-decoration: underline;">fiscalizaciondeportiva@muninqn.gov.ar</a>
            </span>
        </div>
        <hr>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <div class="buttonsRow">
                <input class="btn btn-primary mr-3" type="button" onclick="reiniciarForm()" value="Reiniciar" />
                <input class="btn btn-primary submitBtn" type="submit" id="submit5" value="Confirmar y Guardar" onload="terminosycondicionescheck()" name="condicionesSubmit" />
            </div>
            <div class="process" style="display: none;">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </form>
</div>