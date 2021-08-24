<div class="form-horizontal mx-auto">
    <div class="card-body mb-5" style="border-bottom-right-radius: 20px;border-bottom-left-radius:20px;">
        <!-- DATOS PERSONALES -->
        <h3 class="text-white"><?= $solicitud['nombre_te'] ?></h3>
        <h4 class="text-white">Datos personales</h4>
        <hr>
        <div class="form-group row">
            <div class="form-group col-lg-4 col-md-4 col-sd-12 col-xs-12">
                <label for="email">Direcci&oacute;n de email </label>
                <input disabled type="email" id="email" class="form-control" value="<?= $solicitud['email'] ?>">
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sd-12 col-xs-12">
                <label for="telefono">Actualice su n&uacute;mero de tel&eacute;fono </label>
                <input disabled type="number" id="telefono" class="form-control" value="<?= $solicitud['telefono'] ?>">

            </div>
            <div class="form-group col-lg-4 col-md-4 col-sd-12 col-xs-12">
                <label for="nacionalidad">Nacionalidad </label>
                <input disabled id="nacionalidad" class="form-control" value="<?= $solicitud['nacionalidad'] ?>" style="display:block !important;">
            </div>
            <!-- DOMICILIO -->
            <div class="form-group col-lg-4 col-md-4 col-sd-12 col-xs-12">
                <label for="ciudad">Seleccione su ciudad </label>
                <input disabled id="ciudad" class="form-control" value="<?= $solicitud['ciudad'] ?>" title="Seleccionar" name='ciudad' style="display:block !important;" required>
                <div class="invalid-feedback">
                    Por favor indique su ciudad.
                </div>
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sd-12 col-xs-12">
                <label for="barrio-nqn">Seleccione su barrio </label>
                <input disabled id="barrio-nqn" class="form-control" value="<?= $solicitud['barrio'] ?>">
            </div>
        </div>
        <!-- BARRIO -->
        <div class="form-group row">
            <div class="form-group col-lg-4 col-md-4 col-sd-12 col-xs-12 ">
                <label for="direccion-cp">Código Postal </label>
                <input disabled id="direccion-cp" class="form-control" value="<?= $solicitud['cp'] ?>">
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sd-12 col-xs-12 ">
                <label for="direccion-calle">Calle </label>
                <input disabled id="direccion-calle" class="form-control" value="<?= $solicitud['calle'] ?>">
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sd-12 col-xs-12 ">
                <label for="direccion-numero">Número </label>
                <input disabled id="direccion-numero" class="form-control" value="<?= $solicitud['nro_calle'] ?>">
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sd-12 col-xs-12 ">
                <label for="direccion-departamento">Departamento (opcional) </label>
                <input disabled id="direccion-departamento" class="form-control" value="<?= $solicitud['depto'] ?>">

            </div>
            <div class="form-group col-lg-4 col-md-4 col-sd-12 col-xs-12 ">
                <label for="direccion-piso">Piso (opcional) </label>
                <input disabled id="direccion-piso" class="form-control" value="<?= $solicitud['piso'] ?>">

            </div>
        </div>
        <hr>
        <div class="form-group row">
            <div class="form-group col-lg-6 col-md-6 col-sd-12 col-xs-12 ">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#antecedentesModal">Ver Antecedentes</button>
            </div>
        </div>
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

<!-- Modal Atecedentes-->
<div class="modal fade" id="antecedentesModal" tabindex="-1" aria-labelledby="antecedentesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="antecedentesModalLabel">Antecedentes Penales</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if (verFormatoArchivo($solicitud['path_ap']) == 'pdf') { ?>
                    <iframe id="archivo_antecedentes" title="Visor Antecedentes" width="100%" height="400" src="<?= $solicitud['path_ap'] ?>">
                    </iframe>
                <?php } else { ?>
                    <img style="width: 100%" src="<?= $solicitud['path_ap'] ?>" alt="AP">
                <?php } ?>
            </div>
            <div class="modal-footer">
                <a type="button" href="<?= $solicitud['path_ap'] ?>" download="antecedentes_<?= $solicitud['nombre_te'] ?>" target="_blank" class="btn btn-primary">Descargar</a>

                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>