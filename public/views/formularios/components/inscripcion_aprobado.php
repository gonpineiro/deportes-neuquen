<body>
    <div class="body container">
        <div class="elementor-divider"> <span class="elementor-divider-separator"></span></div>
        <div class="info row mb-5" id="info">
            <div class="col">
                <div class="card-body mb-3">
                    <p class="text-center">
                        Su SOLICITUD se encuentra vigente con vencimiento: <?= $userWithSolicitud['fecha_vencimiento']; ?>, ante cualquier duda, contactarse al email: fiscalizaciondeportiva@muninqn.gov.ar
                    </p>
                </div>

            </div>
        </div>

        <div class="text-center mb-5">
            <a class="btn btn-primary" href=<?= WEBLOGIN ?> id="boton-volver">Volver al Inicio</a>
        </div>
    </div>
</body>