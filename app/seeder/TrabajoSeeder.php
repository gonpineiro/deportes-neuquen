<?php

if (PROD) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
}

$trabajoController = new TrabajoController();

$trabajoController->store([
    'id_solicitud' => 1,
    'lugar_de_trabajo' => 'Profesor',
    'foto_certificado_laboral' => 'ESTO ES UNA FOTO BASE64',
]);
$trabajoController->store([
    'id_solicitud' => 2,
    'lugar_de_trabajo' => 'Maestro',
    'foto_certificado_laboral' => 'ESTO ES UNA FOTO BASE64',
]);
$trabajoController->store([
    'id_solicitud' => 3,
    'lugar_de_trabajo' => 'Medico',
    'foto_certificado_laboral' => 'ESTO ES UNA FOTO BASE64',
]);
$trabajoController->store([
    'id_solicitud' => 4,
    'lugar_de_trabajo' => 'Bombero',
    'foto_certificado_laboral' => 'ESTO ES UNA FOTO BASE64',
]);