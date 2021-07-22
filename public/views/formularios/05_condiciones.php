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
                <?php
                switch ($titulo['titulo']) {
                    case '1':
                        $value = 'Lic. Educación Física (Título Terciario)';
                        break;
                    case '2':
                        $value = 'Master Educación Física (Título Terciario)';
                        break;
                    case '3':
                        $value = 'Profesorado Educación Física (Título Terciario)';
                        break;
                    case '4':
                        $value = 'Técnico Nacional (Título Federación u organismo estatal o privado reconocido por el Ministerio de Educación de Nación';
                        break;
                    case '5':
                        $value = 'Técnico Provincial (Título Federación u organismo estatal con reconocimiento de C.P.E.)';
                        break;
                    case '6':
                        $value = 'Instructor Nacional (Título Federación Nacional o Institución privada con reconocimiento Nacional)';
                        break;
                    case '7':
                        $value = 'Instructor Deportivo (habilitación nacional-provincial o de federación u organismo municipal)';
                        break;
                    case '8':
                        $value = 'Instructor de Artes Marciales (habilitación Federación c/cinturón acorde)';
                        break;
                    case '9':
                        $value = 'Instructor Aerobic y/o aparatos y/o musculación (con habilitación oficial)';
                        break;
                    case '10':
                        $value = 'Instructor/profesor de prácticas introyectivas';
                        break;
                    case '11':
                        $value = 'Instructor/profesor de prácticas acrobáticas';
                        break;
                }
                echo $value . " <i class='bi bi-check-square-fill text-success'></i>";
                ?>
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
    <?php foreach ($solicitud['actividades'] as $actividad) { ?>
        <p><?= $actividad['nombre']; ?></p>
    <?php } ?>

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
                Cualquier duda o consulta pod&eacute;s enviarnos un email a: <a href="mailto:carnetma@muninqn.gob.ar" target="_blank" style="text-decoration: underline;">carnetma@muninqn.gob.ar</a>
            </span>
        </div>
        <hr>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <input class="btn btn-primary mr-3" type="button" onclick="reiniciarForm()" value="Reiniciar" />
            <input class="btn btn-primary" type="submit" id="submit" value="Confirmar y Guardar" onload="terminosycondicionescheck()" name="condicionesSubmit" />
        </div>
    </form>
</div>