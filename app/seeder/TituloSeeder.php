<?php

if (PROD) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
}

$tituloController = new TituloController();

$tituloController->store([
    'id_solicitud' => 1,
    'titulo' => 'Esto es un titulo 1 Solicitud 1',
    'path_file' => 'EESTO ES UNA FOTO SUPER BASE 64',
    'es_curso' => 1,
]);

$tituloController->store([
    'id_solicitud' => 1,
    'titulo' => 'Esto es un titulo 2 Solicitud 1',
    'path_file' => 'EESTO ES UNA FOTO SUPER BASE 64',
    'es_curso' => 1,
]);

$tituloController->store([
    'id_solicitud' => 1,
    'titulo' => 'Esto es un titulo 3 Solicitud 1',
    'path_file' => 'EESTO ES UNA FOTO SUPER BASE 64',
    'es_curso' => 1,
]);

$tituloController->store([
    'id_solicitud' => 2,
    'titulo' => 'Esto es un titulo 1 Solicitud 2',
    'path_file' => 'EESTO ES UNA FOTO SUPER BASE 64',
    'es_curso' => 1,
]);

$tituloController->store([
    'id_solicitud' => 2,
    'titulo' => 'Esto es un titulo 2 Solicitud 2',
    'path_file' => 'EESTO ES UNA FOTO SUPER BASE 64',
    'es_curso' => 1,
]);

$tituloController->store([
    'id_solicitud' => 3,
    'titulo' => 'Esto es un titulo 1 Solicitud 3',
    'path_file' => 'EESTO ES UNA FOTO SUPER BASE 64',
    'es_curso' => 1,
]);

$tituloController->store([
    'id_solicitud' => 3,
    'titulo' => 'Esto es un titulo 2 Solicitud 3',
    'path_file' => 'EESTO ES UNA FOTO SUPER BASE 64',
    'es_curso' => 1,
]);

$tituloController->store([
    'id_solicitud' => 4,
    'titulo' => 'Esto es un titulo 1 Solicitud 4',
    'path_file' => 'EESTO ES UNA FOTO SUPER BASE 64',
    'es_curso' => 1,
]);

$tituloController->store([
    'id_solicitud' => 4,
    'titulo' => 'Esto es un titulo 2 Solicitud 4',
    'path_file' => 'EESTO ES UNA FOTO SUPER BASE 64',
    'es_curso' => 1,
]);

$tituloController->store([
    'id_solicitud' => 5,
    'titulo' => 'Esto es un titulo 1 Solicitud 5',
    'path_file' => 'EESTO ES UNA FOTO SUPER BASE 64',
    'es_curso' => 1,
]);

$tituloController->store([
    'id_solicitud' => 5,
    'titulo' => 'Esto es un titulo 2 Solicitud 5',
    'path_file' => 'EESTO ES UNA FOTO SUPER BASE 64',
    'es_curso' => 1,
]);
