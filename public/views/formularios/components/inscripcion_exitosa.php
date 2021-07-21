<?php
include_once '../../../app/config/config.php';
if (!isset($_SESSION['usuario'])) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . WEBLOGIN);
    exit();
}
/* datos de la sesion */
include('session.php');
$usuarioController = new UsuarioController();
$userWithSolicitud = $usuarioController->getSolicitud($id_wappersonas);
$idSolicitud = $userWithSolicitud['id_solicitud'];
?>

<body>
    <div class="body container">
        <div class="elementor-divider"> <span class="elementor-divider-separator"></span></div>
        <div class="info row mb-5" id="info">
            <div class="col-12">
                <div class="alert alert-success mt-3 text-center" role="alert" id="msje-exito">
                    ¡Se ha realizado la solicitud con &eacute;xito!
                </div>
                <div class="card-body mb-3">
                    <p class="card-text text-center">Nº de Solicitud: <?= $idSolicitud; ?></p>
                </div>
                <div class="text-center">
                    <a class="btn btn-primary" href=<?= WEBLOGIN ?> id="boton-volver">Volver al Inicio</a>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        let targetEle = $("#msje-exito");
        animateToInput(targetEle);
    });
</script>