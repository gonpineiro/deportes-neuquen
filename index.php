<?php
include 'app/config/config.php';
include('./app/seeder/ActivadesSeeder.php');
include('./app/seeder/CategoriaActividadSeeder.php');
die();
$solicitudController = new SolicitudController();
$solicitud = $solicitudController->getAllData(2);
