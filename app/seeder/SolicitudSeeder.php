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
    'nro_recibo' => 89654,
    'path_file' => '/ubicacion/algun/ubicacion/',
    'observaciones' => null,
    'modified_at' => null,
    'deleted_at' => null,
    'fecha_vencimiento' => null,
    'fecha_evaluacion' => null,
]);

$solController->store([
    'id_usuario' => 2,
    'id_usuario_admin' => NULL,
    'id_estado' => 1,
    'nro_recibo' => 125689,
    'path_file' => '/ubicacion/algun/ubicacion/',
    'observaciones' => null,
    'modified_at' => null,
    'deleted_at' => null,
    'fecha_vencimiento' => null,
    'fecha_evaluacion' => null,
]);

$solController->store([
    'id_usuario' => 3,
    'id_usuario_admin' => 6,
    'id_estado' => 2,
    'nro_recibo' => 458958,
    'path_file' => '/ubicacion/algun/ubicacion/',
    'observaciones' => 'Rechazado por algun motivo',
    'modified_at' => null,
    'deleted_at' => null,
    'fecha_vencimiento' => null,
    'fecha_evaluacion' => '2021-07-01',
]);

$solController->store([
    'id_usuario' => 4,
    'id_usuario_admin' => 6,
    'id_estado' => 2,
    'nro_recibo' => 169874,
    'path_file' => '/ubicacion/algun/ubicacion/',
    'observaciones' => 'Rechazado por algun motivo',
    'modified_at' => null,
    'deleted_at' => null,
    'fecha_vencimiento' => null,
    'fecha_evaluacion' => '2021-06-01',
]);

$solController->store([
    'id_usuario' => 5,
    'id_usuario_admin' => 6,
    'id_estado' => 3,
    'nro_recibo' => 856932,
    'path_file' => '/ubicacion/algun/ubicacion/',
    'observaciones' => 'Aprobado por algun motivo',
    'modified_at' => null,
    'deleted_at' => null,
    'fecha_vencimiento' => null,
    'fecha_evaluacion' => '2021-06-01',
]);