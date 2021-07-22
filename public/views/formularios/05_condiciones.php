<?php
// Busco el id de la solicitud
$userWithSolicitud = $usuarioController->getSolicitud($id_wappersonas);
$idSolicitud = $userWithSolicitud['id_solicitud'];

// Busco datos del usuario en nuestra BD
/* $usuario = $usuarioController->get(['id_wappersonas' => $id_wappersonas]); */

$solicitud = $solicitudController->getSolicitudesWhereID($idSolicitud);
// Busco el o los lugares de trabajo que el usuario ingresó
$datosTrabajo = $trabajoController->index(['id_solicitud' => $idSolicitud]);

// Busco los datos de los titulos
$datosTitulos = $tituloController->index(['id_solicitud' => $idSolicitud]);

// Busco la ciudad con el id de ciudad que trae el usuario
$barrio = $barrioController->index(['id' => $usuario['id_barrio']]);
$ciudad = $ciudadController->index(['id' => $usuario['id_ciudad']]);

// ASIGNO TODOS LOS DATOS EN VARIABLES
$ciudad = $ciudad['nombre'];
$barrio = $barrio['nombre'];
$direccion_calle = $usuario['direccion_calle'];
$direccion_nro = $usuario['direccion_nro'];
$direccion_cp = $usuario['direccion_cp'];
$antecedentes = explode("/", $solicitud['path_ap'])[6];
$nro_recibo =  $solicitud['nro_recibo'];
$recibo_archivo = explode("/", $solicitud['path_recibo'])[6];

?>

<div class="card-body mb-5" style="border-bottom-right-radius: 20px;border-bottom-left-radius:20px;background-color:#F8FDFF;color:black;">
    <h5>Datos Personales:</h5>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <p>Ciudad: <?= utf8_encode($ciudad); ?> CP: <?= $direccion_cp; ?></span></p>
            <p>Barrio: <span><?= utf8_encode($barrio); ?></span></p>
            <p>Dirección: <span><?= utf8_encode($direccion_calle) . " " . $direccion_nro; ?></span></p>
            <p>Código Postal: <span><?= $direccion_cp; ?></span></p>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <p>Antecedentes Archivo:
                <span>
                    <?php
                    if ($antecedentes) {
                        echo "Cargado <i class='bi bi-check-square-fill text-success'></i>";
                    };
                    ?>
                </span>
            </p>
            <p>Recibo Nº: <span><?= $nro_recibo . " Cargado <i class='bi bi-check-square-fill text-success'></i>"; ?></span></p>
        </div>
    </div>
    <hr>
    <h5>Educación:</h5>
    <?php
    while ($row = odbc_fetch_array($datosTitulos)) { ?>
        <p>Titulo:
            <span>
                <?php
                $titulo = utf8_encode($row['titulo']);
                switch ($titulo) {
                    case '1':
                        $titulo = 'Lic. Educación Física (Título Terciario)';
                        break;
                    case '2':
                        $titulo = 'Master Educación Física (Título Terciario)';
                        break;
                    case '3':
                        $titulo = 'Profesorado Educación Física (Título Terciario)';
                        break;
                }
                echo $titulo . " <i class='bi bi-check-square-fill text-success'></i>";
                ?>
            </span>
        </p>
    <?php } ?>

    <hr>
    <h5>Locaciones:</h5>
    <?php

    while ($row = odbc_fetch_array($datosTrabajo)) { ?>
        <p><?= utf8_encode($row['lugar']) . " <i class='bi bi-check-square-fill text-success'></i>" ?></p>
    <?php } ?>
    <hr>
    <form action=" 05_condicionesPost.php" method="POST" enctype="multipart/form-data" class="form-horizontal mx-auto needs-validation" name="form-52" id="form-52">
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
        <input class="btn btn-primary mt-3 mb-3" style="background-color: white; border-color:white;color:black;" type="button" onclick="reiniciarForm()" value="Reiniciar" />
        <input class="btn btn-primary mt-3 mb-3" type="submit" id="submit" value="Registrar datos" name="condicionesSubmit" />
    </form>
</div>