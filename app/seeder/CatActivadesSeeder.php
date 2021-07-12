<?php

if (PROD) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
}

$catActividadController = new CatActividadController();

$ciudadController->store([
    'nombre' => 'Clasificación y votación',
]);

$ciudadController->store([
    'nombre' => 'Anotación',
]);

$ciudadController->store([
    'id_provincia' => 3,
    'nombre' => 'Medición',
]);
