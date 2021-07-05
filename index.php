<?php
include 'app/config/config.php';




$solController = new SolicitudController();
$sol = [
    'id_usuario' => 1,
    'id_usuario_admin' => 1,
    'id_estado' => 5,
    'profesion' => 'Maestro jardinero',
];
$solController->store($sol);

$trabajoController = new TrabajoController();
$tra = [
    'id_solicitud' => 1,
    'lugar_de_trabajo' => 'Algun lugar horrible',
    'foto_certificado_laboral' => 'EESTO ES UNA FOTO SUPER BASE 64',
];
$trabajoController->store($tra);

$tituloController = new TituloController();
$titu = [
    'id_solicitud' => 1,
    'titulo' => 'Esto es un titulo No universitario',
    'foto_titulo' => 'EESTO ES UNA FOTO SUPER BASE 64',
    'es_curso' => 1,
];
$tituloController->store($titu);

$estadoController = new EstadoController();
$est = [
    'nombre' => 'Estro es un estado magico',
];
$estadoController->store($est);

$ciudadController = new ciudadController();
$ciu = [
    'id_provincia' => 52,
    'nombre' => 'Ciudad magica de BsAs',
];
$ciudadController->store($ciu);

$barrioController = new BarrioController();
$bar = [
    'id_ciudad' => 52,
    'nombre' => 'Barrio magica de BsAs',
];
$barrioController->store($bar);

$solicitud = new SolicitudController();
$listado = $solicitud->getSolicitudesWhereEstado('Estro es un estado magico');

$trabajos = new TrabajoController();
$trabajo = $trabajos->index(['id_solicitud' => 1]);

while ($row = odbc_fetch_array($trabajo)) {
    # code...
    verEstructura($row);
}
verEstructura($listado);

die();
header('HTTP/1.1 301 Moved Permanently');
header('Location: ' . WEBLOGIN);
exit();
