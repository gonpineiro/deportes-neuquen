<?php
include 'app/config/config.php';

$userController = new UsuarioController();

$user = [
    'id_wappersonas' =>  1,
    'nombre' => 'Gonzalo',
    'apellido' => 'Gonzalo',
    'telefono' => '1126410253',
    'dni' => 31960202,
    'genero' => 'H',
    'email' => 'gon.pineiro@gmail.com',
    'nacionalidad' => 'Argentino',
    'id_ciudad' => 1,
    'id_barrio' => 2,
    'id_zona' => 3,
    'direccion_calle' => 'Pinar',
    'direccion_nro' => '572',
    'direccion_depto' => 'SI',
    'direccion_piso' => '8300',
    'direccion_cp' => '8300',
];

$userController->store($user);

die();
header('HTTP/1.1 301 Moved Permanently');
header('Location: ' . WEBLOGIN);
exit();