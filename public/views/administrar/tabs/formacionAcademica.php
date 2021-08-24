<div class="form-horizontal mx-auto">
    <div class="card-body mb-5" style="border-bottom-right-radius: 20px;border-bottom-left-radius:20px;">
        <!-- DATOS PERSONALES -->
        <h4 class="text-white">Formación Académica</h4>
        <hr>
        <?PHP
        foreach ($sol_titulo as $titulo) {
        ?>
            <div class="d-flex justify-content-between">
                <div class="col-6">
                    <input type="text" class="form-control" value="<?= $titulo['titulo'] ?>" disabled>
                </div>
                <div class="col-2">
                    <input type="text" class="form-control" value="<?= $titulo['titulo'] ?>" disabled>
                </div>
                <div class="col-auto">
                    <a class="btn btn-primary bg-info" href="<?= $titulo['path_file'] ?>" download="<?= $titulo['titulo'] . "-" . $sol_nombre ?>" target="_blank">Descargar</a>
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary bg-danger" id="verBtn">Rechazar</button>
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary bg-success" id="verBtn">Aprobar</button>
                </div>

            </div>
            <br>
        <?PHP          }
        ?>

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