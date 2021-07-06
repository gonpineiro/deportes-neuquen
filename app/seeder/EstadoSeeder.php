<?php

if (PROD) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
}

$estadoController = new EstadoController();

$estadoController->store(['nombre' => 'Nuevo']);
$estadoController->store(['nombre' => 'Rechazado']);
$estadoController->store(['nombre' => 'Aprobado']);
$estadoController->store(['nombre' => 'Impreso']);
$estadoController->store(['nombre' => 'Retirado']);
