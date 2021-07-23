<?php
include 'app/config/config.php';
die();
include('./app/seeder/ActivadesSeeder.php');
include('./app/seeder/CategoriaActividadSeeder.php');
die();
$solicitudController = new SolicitudController();
$solicitud = $solicitudController->getAllData(2);
