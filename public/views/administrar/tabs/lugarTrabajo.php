<div class="form-horizontal mx-auto">
    <div class="card-body mb-5" style="border-bottom-right-radius: 20px;border-bottom-left-radius:20px;">
        <!-- DATOS PERSONALES -->
        <h4 class="text-white">Lugar de Trabajo</h4>
        <hr>
        <?PHP
        foreach ($trabajos as $trabajo) {
        ?>
            <div class="row">
                <div class="input-group col-md-8 col-12 pb-2">
                    <input type="text" class="form-control" style="border-radius: 0px;;" value="<?= $trabajo['lugar'] ?>" disabled>
                    <span class="input-group-text" style="border-radius: 0px;"><?= $trabajo['estado'] ?> </span>
                    <button type="button" class="input-group-text tooltip-test" title="Tooltip" style="border-radius: 0px;" data-toggle="modal" data-target="#ModalLugar<?= $trabajo['id'] ?>"><i class="bi bi-download"></i></button>
                </div>
                <div class="col pb-2 text-center">
                    <button class="btn btn-primary bg-danger" id="verBtn">Rechazar</button>
                </div>
                <div class="col pb-2 text-center">
                    <button class="btn btn-primary bg-success" id="verBtn">Aprobar</button>
                </div>

            </div>
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
        <!-- POR SI LO USAMOS. BORRAR SI NO SE USA :D-->
        <div class="process" style="display: none;">
            <div class="spinner-border text-light" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
</div>

<!-- Modal Formación Académica -->
<?PHP
foreach ($trabajos as $trabajo) { ?>
    <div class="modal fade" id="ModalLugar<?= $trabajo['id'] ?>" tabindex="-1" aria-labelledby="ModalLugar<?= $trabajo['id'] ?>ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLugar<?= $trabajo['id'] ?>ModalLabel"><?= $trabajo['lugar'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Verificamos si es PDF/imagen -->
                    <?php if (verFormatoArchivo($titulo['path_file']) == 'pdf') { ?>
                        <iframe id="archivo_lugar_<?= $trabajo['id'] ?>" title="Visor Titulo" width="100%" height="400" src="<?= $trabajo['path_file'] ?>">
                        </iframe>
                    <?php } else { ?>
                        <img style="width: 100%" src="<?= $trabajo['path_file'] ?>" alt="<?= $trabajo['lugar'] ?>">
                    <?php } ?>
                </div>
                <div class="modal-footer">
                    <a type="button" href="<?= $trabajo['path_file'] ?>" download="titulo_<?= $trabajo['id'] . "_" . $solicitud['nombre_te'] ?>" target="_blank" class="btn btn-primary">Descargar</a>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<?PHP } ?>