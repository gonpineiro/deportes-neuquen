<?php
include 'app/config/config.php';

$solicitud = new SolicitudController();
$listado = $solicitud->getSolicitudesWhereEstado('Aprobado');
verEstructura($listado);

die();
include('./app/seeder/BarrioSeeder.php');
include('./app/seeder/CiudadSeeder.php');
include('./app/seeder/EstadoSeeder.php');
include('./app/seeder/SolicitudSeeder.php');
include('./app/seeder/TituloSeeder.php');
include('./app/seeder/TrabajoSeeder.php');
include('./app/seeder/UserSeeder.php'); 

$trabajos = new TrabajoController();
$trabajo = $trabajos->index(['id_solicitud' => 1]);

while ($row = odbc_fetch_array($trabajo)) {
    # code...
    verEstructura($row);
}

die();
header('HTTP/1.1 301 Moved Permanently');
header('Location: ' . WEBLOGIN);
exit();
