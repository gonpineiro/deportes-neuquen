<?php

$solController = new SolicitudController();

$solController->store([
    'id_usuario' => 1,
    'id_usuario_admin' => NULL,
    'id_estado' => 1,
    'profesion' => 'Escuela Numero 5',
]);

$solController->store([
    'id_usuario' => 2,
    'id_usuario_admin' => NULL,
    'id_estado' => 1,
    'profesion' => 'Escuela Numero 2',
]);

$solController->store([
    'id_usuario' => 3,
    'id_usuario_admin' => NULL,
    'id_estado' => 1,
    'profesion' => 'Escuela Numero 5',
]);