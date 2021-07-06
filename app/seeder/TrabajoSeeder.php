<?php

if (PROD) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
}

$trabajoController = new TrabajoController();

$trabajoController->store([
    'id_solicitud' => 1,
    'lugar_de_trabajo' => 'Profesor',
    'img_64' => 'ESTO ES UNA FOTO BASE64',
]);
$trabajoController->store([
    'id_solicitud' => 2,
    'lugar_de_trabajo' => 'Maestro',
    'img_64' => 'ESTO ES UNA FOTO BASE64',
]);
$trabajoController->store([
    'id_solicitud' => 3,
    'lugar_de_trabajo' => 'Medico',
    'img_64' => 'ESTO ES UNA FOTO BASE64',
]);
$trabajoController->store([
    'id_solicitud' => 4,
    'lugar_de_trabajo' => 'Bombero',
    'img_64' => 'ESTO ES UNA FOTO BASE64',
]);