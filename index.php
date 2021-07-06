<?php
include 'app/config/config.php';

include('./app/seeder/BarrioSeeder.php');
include('./app/seeder/CiudadSeeder.php');
include('./app/seeder/EstadoSeeder.php');
include('./app/seeder/SolicitudSeeder.php');
include('./app/seeder/TituloSeeder.php');
include('./app/seeder/TrabajoSeeder.php');
include('./app/seeder/UserSeeder.php'); 
include('./app/seeder/Profesion.php'); 

$trabajos = new TrabajoController();
$trabajo = $trabajos->index(['id_solicitud' => 1]);
$solicitud = new SolicitudController();
$listado = $solicitud->getSolicitudesWhereEstado('Aprobado');

verEstructura($listado);
while ($row = odbc_fetch_array($trabajo)) {
    # code...
    verEstructura($row);
}

die();
header('HTTP/1.1 301 Moved Permanently');
header('Location: ' . WEBLOGIN);
exit();
