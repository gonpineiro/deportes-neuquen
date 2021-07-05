<?php

$estadoController = new EstadoController();
$estadoController->store([
    'nombre' => 'Nuevo',
]);
$estadoController->store([
    'nombre' => 'Rechazado',
]);
$estadoController->store([
    'nombre' => 'Aprobado',
]);
$estadoController->store([
    'nombre' => 'Impreso',
]);
$estadoController->store([
    'nombre' => 'Retirado',
]);