<?php

$solController = new SolicitudController();
$sol = [
    'id_usuario' => 1,
    'id_usuario_admin' => 1,
    'id_estado' => 1,
    'profesion' => 'Maestro jardinero',
];
$solController->store($sol);