<?php

if (PROD) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
}

$catActividadController = new CatActividadController();

$catActividadController->store([
    'nombre' => 'Clasificación y votación',
]);

$catActividadController->store([
    'nombre' => 'Anotación',
]);

$catActividadController->store([
    'nombre' => 'Medición',
]);
