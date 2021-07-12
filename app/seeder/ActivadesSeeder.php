<?php

if (PROD) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
}

$actividadController = new ActividadController();

$ciudadController->store([
    'id_tipo' => 1,
    'nombre' => 'Individuales con enfrentamiento',
]);

$ciudadController->store([
    'id_tipo' => 1,
    'nombre' => 'Individuales sin enfrentamiento',
]);

$ciudadController->store([
    'id_tipo' => 2,
    'nombre' => 'Colectivos con enfrentamiento',
]);

$ciudadController->store([
    'id_tipo' => 2,
    'nombre' => 'Individuales con enfrentamiento',
]);

$ciudadController->store([
    'id_tipo' => 2,
    'nombre' => 'Individuales sin enfrentamiento',
]);

$ciudadController->store([
    'id_tipo' => 3,
    'nombre' => 'Individuales de oposición directa e indirecta',
]);
