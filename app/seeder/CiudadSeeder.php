<?php

$ciudadController = new ciudadController();

$ciudadController->store([
    'id_provincia' => 1,
    'nombre' => 'Neuquen',
]);

$ciudadController->store([
    'id_provincia' => 2,
    'nombre' => 'Plottier',
]);

$ciudadController->store([
    'id_provincia' => 3,
    'nombre' => 'Cipolletti',
]);

$ciudadController->store([
    'id_provincia' => 4,
    'nombre' => 'General Rodriguez',
]);