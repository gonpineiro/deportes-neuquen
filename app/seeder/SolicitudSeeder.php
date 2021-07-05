<?php

if (PROD) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
}

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
    'id_usuario_admin' => 6,
    'id_estado' => 2,
    'profesion' => 'Escuela Numero 7',
]);

$solController->store([
    'id_usuario' => 4,
    'id_usuario_admin' => 6,
    'id_estado' => 2,
    'profesion' => 'Escuela Numero 7',
]);

$solController->store([
    'id_usuario' => 5,
    'id_usuario_admin' => 6,
    'id_estado' => 3,
    'profesion' => 'Escuela Numero 7',
]);