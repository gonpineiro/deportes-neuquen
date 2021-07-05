<?php
include 'app/config/config.php';






$tituloController = new TituloController();
$titu = [
    'id_solicitud' => 1,
    'titulo' => 'Esto es un titulo No universitario',
    'foto_titulo' => 'EESTO ES UNA FOTO SUPER BASE 64',
    'es_curso' => 1,
];
$tituloController->store($titu);







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
