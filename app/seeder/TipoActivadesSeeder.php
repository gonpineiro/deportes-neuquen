<?php

if (PROD) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
}

$tipoActividadController = new TipoActividadController();

$ciudadController->store([
    'id_categoria' => 1,
    'nombre' => 'Individuales con enfrentamiento',
]);

$ciudadController->store([
    'id_categoria' => 1,
    'nombre' => 'Individuales sin enfrentamiento',
]);

$ciudadController->store([
    'id_categoria' => 2,
    'nombre' => 'Colectivos con enfrentamiento',
]);

$ciudadController->store([
    'id_categoria' => 2,
    'nombre' => 'Individuales con enfrentamiento',
]);

$ciudadController->store([
    'id_categoria' => 2,
    'nombre' => 'Individuales sin enfrentamiento',
]);

$ciudadController->store([
    'id_categoria' => 3,
    'nombre' => 'Individuales de oposición directa e indirecta',
]);
