<body>
    <div class="body container">
        <div class="elementor-divider"> <span class="elementor-divider-separator"></span></div>
        <div class="info row mb-5" id="info">
            <div class="col-12">
                <div class="alert alert-success mt-3 text-center" role="alert" id="msje-exito">
                    ¡Se ha realizado la solicitud con &eacute;xito!
                </div>
                <div class="card-body mb-3">
                    <p class="card-text text-center">Nº de Solicitud: <?= $userWithSolicitud['id_solicitud']; ?></p>
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