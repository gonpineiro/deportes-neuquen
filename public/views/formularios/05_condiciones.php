<?php
$ciudadController = new CiudadController();
$ciudades = $ciudadController->index();

$barrioController = new BarrioController();
$barrio = $barrioController->get(['id' => $usuario['id_barrio']]);

// Busco el id de la solicitud
$usuarioController = new UsuarioController();
$userWithSolicitud = $usuarioController->getSolicitud($id_wappersonas);
$idSolicitud = $userWithSolicitud['id_solicitud'];

// Busco datos del usuario en nuestra BD
$usuario = $usuarioController->get(['id_wappersonas' => $id_wappersonas]);

// Busco los datos de la solicitud
$solicitudController = new SolicitudController();

$solicitud = $solicitudController->get(['id' => $idSolicitud]);
$trabajos = new TrabajoController();
$datosTrabajo = $trabajos->index(['id_solicitud' => $idSolicitud]);

// Busco los datos de los titulos
$titulos = new TituloController();
$datosTitulos = $titulos->index(['id_solicitud' => $idSolicitud]);

// ASIGNO TODOS LOS DATOS EN VARIABLES
$barrio = $barrio['nombre'];
$direccion_calle = $usuario['direccion_calle'];
$direccion_nro = $usuario['direccion_nro'];
$direccion_cp = $usuario['direccion_cp'];
$antecedentes = explode("/", $solicitud['path_ap'])[6];
$nro_recibo =  $solicitud['nro_recibo'];
$recibo_archivo = explode("/", $solicitud['path_recibo'])[6];

?>

<div class="card-body mb-5" style="border-bottom-right-radius: 20px;border-bottom-left-radius:20px;">
    <h5 class="text-white">Datos Personales:</h5>
    <p>Ciudad: <span><?= $email; ?></span></p>
    <p>Barrio: <span><?= utf8_encode($barrio); ?></span></p>
    <p>Dirección: <span><?= $direccion_calle . " " . $direccion_nro; ?></span></p>
    <p>Código Postal: <span><?= $direccion_cp; ?></span></p>
    <hr>
    <p>Antecedentes Archivo: <span><?= $antecedentes; ?></span></p>
    <p>Recibo Nº: <span><?= $nro_recibo; ?></span></p>
    <p>Recibo Archivo: <span><?= $recibo_archivo; ?></span></p>
    <hr>
    <?php while ($row = odbc_fetch_array($datosTitulos)) { ?>
        <p class="text-white">Titulo:
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
                echo $titulo;
                ?>
            </span>
        </p>
        <p>Titulo Archivo: 
            <span>
                <?php 
                    $archivo = explode("/", utf8_encode($row['path_file']));
                    echo $archivo[6] . $archivo[7]; 
                ?>
            </span>
        </p>
    <?php } ?>

    <hr>
    <?php while ($row = odbc_fetch_array($datosTitulos)) { ?>
        <p class="text-white"><?= utf8_encode($row['titulo']) ?></p>
    <?php } ?>
    <p>Trabajo: <span><?= $email; ?></span></p>
    <p>Trabajo Archivo: <span><?= $email; ?></span></p>
    <hr>
    <p>Actividad: <span><?= $email; ?></span></p>

    <?php while ($row = odbc_fetch_array($datosTitulos)) { ?>
        <p class=" text-white"><?= utf8_encode($row['titulo']) ?></p>
    <?php } ?>
    <hr>
    <form action=" 05_condicionesPost.php" method="POST" enctype="multipart/form-data" class="form-horizontal mx-auto needs-validation" name="form-52" id="form-52">
        <h4 class="text-white">Aceptar Términos</h4>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="terminosycondiciones" id="terminosycondiciones" required>
                <label class="form-check-label text-white" for="terminosycondiciones">
                    He le&iacute;do y acepto las <a class="ml-1 text-white" href="BASES_Y_CONDICIONES.pdf" target="_blank" style="text-decoration: underline;"> Bases y condiciones </a>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="clausulavalidezddjj" id="clausulavalidezddjj" required>
                <label class="form-check-label text-white" for="clausulavalidezddjj">
                    He le&iacute;do y acepto la <a class="ml-1 text-white" href="BASES_Y_CONDICIONES.pdf" target="_blank" style="text-decoration: underline;"> Cláusula de Validez de DDJJ</a>
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
                Cualquier duda o consulta pod&eacute;s enviarnos un email a: <a class="text-white" href="mailto:carnetma@muninqn.gob.ar" target="_blank" style="text-decoration: underline;">carnetma@muninqn.gob.ar</a>
            </span>
        </div>
        <input class="btn btn-primary mt-3 mb-3" type="submit" id="submit" value="Registrar datos" name="condicionesSubmit" />
    </form>
</div>