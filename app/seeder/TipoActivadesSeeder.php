<?php

if (PROD) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
}

$tipoActividadController = new TipoActividadController();

$tipoActividadController->store([
    'id_categoria' => 1,
    'nombre' => 'Individuales con enfrentamiento',
]);

$tipoActividadController->store([
    'id_categoria' => 1,
    'nombre' => 'Individuales sin enfrentamiento',
]);

$tipoActividadController->store([
    'id_categoria' => 2,
    'nombre' => 'Colectivos con enfrentamiento',
]);

$tipoActividadController->store([
    'id_categoria' => 2,
    'nombre' => 'Individuales con enfrentamiento',
]);

$tipoActividadController->store([
    'id_categoria' => 2,
    'nombre' => 'Individuales sin enfrentamiento',
]);

$tipoActividadController->store([
    'id_categoria' => 3,
    'nombre' => 'Individuales de oposición directa e indirecta',
]);
