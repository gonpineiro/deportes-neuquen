<?php
include 'app/config/config.php';

$imagen = "im..sda.gssd.---ssdsen.pdfsdsd";
var_dump(verFormatoArchivo($imagen));
die();

$nac = Nacionalidad::get();

die();

include('./app/seeder/ActivadesSeeder.php');
include('./app/seeder/CategoriaActividadSeeder.php');

$solicitudController = new SolicitudController();
$solicitud = $solicitudController->getAllData(2);
