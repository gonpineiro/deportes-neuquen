<?php
include 'app/config/config.php';














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
