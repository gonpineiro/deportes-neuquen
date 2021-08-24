<?php
include 'app/config/config.php';

$nac = Nacionalidad::get();

die();

include('./app/seeder/ActivadesSeeder.php');
include('./app/seeder/CategoriaActividadSeeder.php');

$solicitudController = new SolicitudController();
$solicitud = $solicitudController->getAllData(2);
