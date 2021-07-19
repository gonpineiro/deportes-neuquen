<?php
$ciudadController = new CiudadController();
$ciudades = $ciudadController->index();

$barrioController = new BarrioController();
$barrios = $barrioController->index();
// Busco el id de la solicitud
$usuario = new UsuarioController();
$userWithSolicitud = $usuarioController->getSolicitud($id_wappersonas);

// Busco datos del usuario en nuestra BD
$datosUsuario = $usuario->get(['id_wappersonas' => $id_wappersonas,]);
$idSolicitud = $userWithSolicitud['id_solicitud'];

// Busco los datos de la solicitud
$solicitud = new SolicitudController();
$solicitudParams = [
    'id' => $idSolicitud
];
$solicitudParamsH = [
    'id_solicitud' => $idSolicitud,
];
// Busco la ciudad

// Busco el barrio
$barrioController = new BarrioController();
$barrio = $barrioController->get(['id' => $datosUsuario['id_barrio'],]);

$datosSolicitud = $solicitud->get($solicitudParams);
// Busco datos de los trabajos
$trabajos = new TrabajoController();
$datosTrabajo = $trabajos->index($solicitudParamsH);
// Busco los datos de los titulos
$titulos = new TituloController();
$datosTitulos = $titulos->index($solicitudParamsH);
// Busco los datos de las actividades laborales
// $actividades = new ActividadController();
// $datosActividades = $actividades->index($solicitudParamsH);
// ASIGNO TODOS LOS DATOS EN VARIABLES
$barrio = $barrio['nombre'];
$direccion_calle = $datosUsuario['direccion_calle'];
$direccion_nro = $datosUsuario['direccion_nro'];
$direccion_cp = $datosUsuario['direccion_cp'];
$antecedentes = explode("/", $datosSolicitud['path_ap']);
$antecedentes = $antecedentes[6];
$nro_recibo =  $datosSolicitud['nro_recibo'];
$recibo_archivo = explode("/", $datosSolicitud['path_recibo']);
$recibo_archivo = $recibo_archivo[6];
//print_r($datosSolicitud);

?>

<div class="card-body mb-5" style="border-bottom-right-radius: 20px;border-bottom-left-radius:20px;">
    <h5 class="text-white">Datos Personales:</h5>
    <p>Ciudad: <span><?PHP echo $email; ?></span></p>
    <p>Barrio: <span><?PHP echo $barrio; ?></span></p>
    <p>Dirección: <span><?PHP echo $direccion_calle . " " . $direccion_nro; ?></span></p>
    <p>Código Postal: <span><?PHP echo $direccion_cp; ?></span></p>
    <hr>
    <p>Antecedentes Archivo: <span><?PHP echo $antecedentes; ?></span></p>
    <p>Recibo Nº: <span><?PHP echo $nro_recibo; ?></span></p>
    <p>Recibo Archivo: <span><?PHP echo $recibo_archivo; ?></span></p>
    <hr>
    <?php while ($row = odbc_fetch_array($datosTitulos)) { ?>
        <p class="text-white">Titulo: <span><?PHP 
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
            ?></span></p>
        <p>Titulo Archivo: <span><?PHP $archivo = explode("/", utf8_encode($row['path_file'])); echo $archivo[6]. $archivo[7]; ?></span></p>
    <?php } ?>

    <hr>
    <?php while ($row = odbc_fetch_array($datosTitulos)) { ?>
        <p class="text-white"><?= utf8_encode($row['titulo']) ?></p>
    <?php } ?>
    <p>Trabajo: <span><?PHP echo $email; ?></span></p>
    <p>Trabajo Archivo: <span><?PHP echo $email; ?></span></p>
    <hr>
    <p>Actividad: <span><?PHP echo $email; ?></span></p>

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