<?php

if (PROD) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
}

$barrioController = new BarrioController();

$barrioController->store([
    'id_ciudad' => 1,
    'nombre' => 'Barrio Uno',
]);

$barrioController->store([
    'id_ciudad' => 1,
    'nombre' => 'Barrio Dos',
]);

$barrioController->store([
    'id_ciudad' => 2,
    'nombre' => 'Barrio Tres',
]);

$barrioController->store([
    'id_ciudad' => 2,
    'nombre' => 'Barrio Cuatro',
]);

$barrioController->store([
    'id_ciudad' => 3,
    'nombre' => 'Barrio Cinco',
]);

$barrioController->store([
    'id_ciudad' => 3,
    'nombre' => 'Barrio Seis',
]);

$barrioController->store([
    'id_ciudad' => 4,
    'nombre' => 'Barrio Siete',
]);

$barrioController->store([
    'id_ciudad' => 4,
    'nombre' => 'Barrio Ocho',
]);
