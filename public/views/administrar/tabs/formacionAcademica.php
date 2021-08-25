<div class="form-horizontal mx-auto">
    <div class="card-body mb-5" style="border-bottom-right-radius: 20px;border-bottom-left-radius:20px;">
        <!-- DATOS PERSONALES -->
        <h4 class="text-white">Formación Académica</h4>
        <hr>
        <?php foreach ($titulos as $titulo) { ?>
            <form class="row" action="./components/cambiarEstadoTitulo.php" method="POST">
                <div class="form-inline col-md-8 col-12 pb-2">
                    <div class="input-group" style="width: 100%;">
                        <input type="text" hidden value="<?= $titulo['id'] ?>" name="id_titulo">
                        <input type="text" hidden value="<?= $titulo['id_solicitud'] ?>" name="id_solicitud">
                        <input type="text" class="form-control" style="border-radius: 0px;" value="<?= $titulo['titulo'] ?>" disabled>
                        <span class="input-group-text" style="border-radius: 0px;"><?= $titulo['estado'] ?> </span>
                        <button type="button" class="input-group-text tooltip-test" title="Tooltip" style="border-radius: 0px" data-toggle="modal" data-target="#ModalTitulo<?= $titulo['id'] ?>"><i class="bi bi-download"></i></button>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="row">
                        <div class="col pb-2 text-center">
                            <button class="btn btn-primary bg-danger" style="width: 100%;border:0px!important" type="submit" name="rechazarBtn" id="rechazarBtn">Rechazar</button>
                        </div>
                        <div class="col pb-2 text-center">
                            <button class="btn btn-primary bg-success" style="width: 100%;border:0px!important" type="submit" name="aprobarBtn" id="aprobarBtn">Aprobar</button>
                        </div>
                    </div>
                </div>
            </form>
            <br>
        <?php } ?>

        <hr>

        <div class="buttonsRow container">
            <div class="row">
                <div class="col-md-12 my-1">
                    <div class="float-md-right float-xs-left">
                        <input class="btn btn-primary" type="submit" disabled id="submitBtn1" value="Confirmar y Guardar" name="personalesSubmit" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Formación Académica -->
<?php
foreach ($titulos as $titulo) { ?>
    <div class="modal fade" id="ModalTitulo<?= $titulo['id'] ?>" tabindex="-1" aria-labelledby="ModalTitulo<?= $titulo['id'] ?>ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalTitulo<?= $titulo['id'] ?>ModalLabel"><?= $titulo['titulo'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Verificamos si es PDF/imagen -->
                    <?php if (verFormatoArchivo($titulo['path_file']) == 'pdf') { ?>
                        <iframe id="archivo_titulo_<?= $titulo['id'] ?>" title="Visor Titulo" width="100%" height="400" src="<?= $titulo['path_file'] ?>">
                        </iframe>
                    <?php } else { ?>
                        <img style="width: 100%" src="<?= $titulo['path_file'] ?>" alt="<?= $titulo['titulo'] ?>">
                    <?php } ?>
                </div>
                <div class="modal-footer">
                    <a type="button" href="<?= $titulo['path_file'] ?>" download="titulo_<?= $titulo['id'] . "_" . $solicitud['nombre_te'] ?>" target="_blank" class="btn btn-primary">Descargar</a>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>