<?php
include '../../../app/config/config.php';

if (isset($_SESSION['userProfiles']) && $_SESSION['userProfiles'] != (3 || 2)) {
    header('Location: ' . WEBLOGIN);
    exit();
}

$nombreapellido = explode(",", $_SESSION['usuario']["razonSocial"]);

$nombre = $nombreapellido[1];
$apellido = $nombreapellido[0];
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../estilos/menu/menu.css">
</head>

<body>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: transparent !important;">
        <div class="container-fluid p-md-5 p-sm-1">
            <a class="navbar-brand" href="#"><img class="municipalidad-logo" src="../../estilos/menu/webLoginLogoReduced.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto d-lg-none d-xl-block">
                    <li class="nav-item contacto-logo">
                        <a class="nav-link" target="_blank" href="mailto:soporte@muninqn.gov.ar">
                            <span class="text-info">contacto: soporte@muninqn.gov.ar</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img style="height: 25px;" src="../../estilos/menu/icono-login.png" alt="">

                            <span style="color: #00B4E6;font-weight:600;"><?php echo "$apellido $nombre"; ?></span>
                        </a>
                        <div class="dropdown-menu" style="background-color: transparent!important;border:none!important" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item whiteButton contacto-menu" target="_blank" href="mailto:soporte@muninqn.gov.ar">Soporte</a>
                            <a class="dropdown-item whiteButton mt-2" href="https://weblogin.muninqn.gov.ar">Regresar</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container pt-5">
        <div class="row pt-5">
            <div class='col-sm d-flex justify-content-center'>

                <div class='opcion' onclick='window.location.href = "../formularios/inscripcion.php"'>
                    <table style='width: 100%;'>
                        <tbody>
                            <tr>
                                <td>
                                    <div class='icono' style='background-image: url(../../estilos/menu/icono-admin.png);'></div>
                                </td>
                            </tr>
                            <tr style='height: 60px;'>
                                <td class='opcion-titulo text-center'>REGISTRO DE PROFESIONALES</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class='opcion' onclick='window.location.href = "../administrar/index.php"'>
                    <table style='width: 100%;'>
                        <tbody>
                            <tr>
                                <td>
                                    <div class='icono' style='background-image: url(../../estilos/menu/icono-admin.png);'></div>
                                </td>
                            </tr>
                            <tr style='height: 60px;'>
                                <td class='opcion-titulo text-center'>PANEL ADMIN</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="../../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>