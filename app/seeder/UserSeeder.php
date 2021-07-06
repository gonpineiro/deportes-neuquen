<?php

if (PROD) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
}

$userController = new UsuarioController();

$userController->store([
    'id_wappersonas' =>  1,
    'nombre' => 'Estefi',
    'apellido' => 'Fernandez',
    'telefono' => '299569874',
    'dni' => 36256251,
    'genero' => 'H',
    'email' => 'Estefio@gmail.com',
    'nacionalidad' => 'Argentino',
    'id_ciudad' => NULL,
    'id_barrio' => 1,
    'id_zona' => 3,
    'direccion_calle' => 'Lugar',
    'direccion_nro' => '748',
    'direccion_depto' => 'SI',
    'direccion_piso' => '8300',
    'direccion_cp' => '8300',
]);

$userController->store([
    'id_wappersonas' =>  2,
    'nombre' => 'Juan',
    'apellido' => 'Gabriel',
    'telefono' => '299569874',
    'dni' => 36256251,
    'genero' => 'H',
    'email' => 'Juan@gmail.com',
    'nacionalidad' => 'Argentino',
    'id_ciudad' => 2,
    'id_barrio' => NULL,
    'id_zona' => 3,
    'direccion_calle' => 'Lugar',
    'direccion_nro' => '748',
    'direccion_depto' => 'SI',
    'direccion_piso' => '8300',
    'direccion_cp' => '8300',
]);

$userController->store([
    'id_wappersonas' =>  3,
    'nombre' => 'Kiol',
    'apellido' => 'Pedro',
    'telefono' => '299569874',
    'email' => 'Kiol@gmail.com',
    'nacionalidad' => 'Argentino',
    'id_ciudad' => 3,
    'id_barrio' => NULL,
    'direccion_calle' => 'Lugar',
    'direccion_nro' => '748',
    'direccion_depto' => 'SI',
    'direccion_piso' => '8300',
    'direccion_cp' => '8300',
]);

$userController->store([
    'id_wappersonas' => 26662,
    'nombre' => 'Lop',
    'apellido' => 'Pedro',
    'telefono' => '299569874',
    'email' => 'Kiol@gmail.com',
    'nacionalidad' => 'Argentino',
    'id_ciudad' => NULL,
    'id_barrio' => 8,
    'direccion_calle' => 'Lugar',
    'direccion_nro' => '748',
    'direccion_depto' => 'SI',
    'direccion_piso' => '8300',
    'direccion_cp' => '8300',
]);

$userController->store([
    'id_wappersonas' =>  5,
    'nombre' => 'Rop',
    'apellido' => 'Pedro',
    'telefono' => '299569874',
    'email' => 'Kiol@gmail.com',
    'nacionalidad' => 'Argentino',
    'id_ciudad' => 3,
    'id_barrio' => NULL,
    'direccion_calle' => 'Lugar',
    'direccion_nro' => '748',
    'direccion_depto' => 'SI',
    'direccion_piso' => '8300',
    'direccion_cp' => '8300',
]);

$userController->store([
    'id_wappersonas' => 6,
    'nombre' => 'ADMIN',
    'apellido' => 'ADMIN',
    'telefono' => '299569874',
    'email' => 'ADMIN@ADMIN.com',
    'nacionalidad' => 'Argentino',
    'id_ciudad' => NULL,
    'id_barrio' => NULL,
    'direccion_calle' => 'Lugar',
    'direccion_nro' => '748',
    'direccion_depto' => 'SI',
    'direccion_piso' => '8300',
    'direccion_cp' => '8300',
]);
