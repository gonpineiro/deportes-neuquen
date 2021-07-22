<?php
include 'app/config/config.php';
$solicitudController = new SolicitudController();
$solicitud = $solicitudController->getAllData(1);
die();
