<?php

if (PROD) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
}

$profesionController = new ProfesionController();

$profesionController->store([
    'id_solicitud' => 1,
    'nombre' => 'Profesor',
]);

$profesionController->store([
    'id_solicitud' => 2,
    'nombre' => 'Maestro',
]);

$profesionController->store([
    'id_solicitud' => 3,
    'nombre' => 'Medico',
]);

$profesionController->store([
    'id_solicitud' => 4,
    'nombre' => 'Bombero',
]);
