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

$solController = new SolicitudController();
$sol = [
    'id_usuario' => 1,
    'id_usuario_admin' => 2,
    'id_estado' => 1,
    'profesion' => 'Maestro jardinero',
];
$solController->store($sol);

$trabajoController = new TrabajoController();
$tra = [
    'id_solicitud' => 1,
    'lugar_de_trabajo' => 'Algun lugar horrible',
    'foto_certificado_laboral' => 'EESTO ES UNA FOTO SUPER BASE 64',
];
$trabajoController->store($tra);

$tituloController = new TituloController();
$titu = [
    'id_solicitud' => 1,
    'titulo' => 'Esto es un titulo No universitario',
    'foto_titulo' => 'EESTO ES UNA FOTO SUPER BASE 64',
];
$tituloController->store($titu);


die();
header('HTTP/1.1 301 Moved Permanently');
header('Location: ' . WEBLOGIN);
exit();