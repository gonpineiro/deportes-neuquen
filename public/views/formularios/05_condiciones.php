    <div class="card-body mb-5" style="border-bottom-right-radius: 20px;border-bottom-left-radius:20px;">
        <form action="05_actualizarPost.php" method="POST" enctype="multipart/form-data" class="form-horizontal mx-auto needs-validation" name="form-5" id="form-5">
            <h4 class="text-white">Resumen</h4>
            <p class="text-white">Controlar datos y editar si es necesario.</p>
            <div class="form-group row">
                <div class="form-group col-lg-4 col-md-4 col-sd-12 col-xs-12">
                    <label for="email" class="required">Compruebe su direcci&oacute;n de email </label>
                    <input type="email" id="email" class="form-control" value="<?= $email; ?>" placeholder="Email" name="email" maxlength="200">
                    <div class="invalid-feedback">
                        <strong>
                            Por favor ingrese el direcci&oacute;n.
                        </strong>
                    </div>
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sd-12 col-xs-12">
                    <label for="telefono" class="required">Actualice su n&uacute;mero de tel&eacute;fono </label>
                    <input type="number" id="telefono" class="form-control" value="<?= $celular; ?>" placeholder="Tel&eacute;fono" name="telefono" min="0" max="9999999999" pattern="^[0-9]">
                    <div class="invalid-feedback">
                        <strong>
                            Por favor ingrese solo números.
                        </strong>
                    </div>
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sd-12 col-xs-12">
                    <label for="nacionalidad" class="required">Nacionalidad </label>
                    <select id="nacionalidad" class="selectpicker form-control" title="Seleccionar" name='nacionalidad'>
                        <option value="1" selected>Argentina</option>
                        <option value="2">Nacionalidad</option>
                    </select>
                    <div class="invalid-feedback">
                        <strong>
                            Por favor ingrese su nacionalidad.
                        </strong>
                    </div>
                </div>
                <!-- DOMICILIO -->
                <div class="form-group col-lg-4 col-md-4 col-sd-12 col-xs-12">
                    <label for="ciudad" class="required">Seleccione su ciudad </label>
                    <select id="ciudad" class="selectpicker form-control" title="Seleccionar" name='ciudad'>
                        <?php while ($row = odbc_fetch_array($ciudades)) { ?>
                            <option value="<?= $row['id'] ?>"><?= utf8_encode($row['nombre']) ?></option>
                        <?php } ?>
                    </select>
                    <div class="invalid-feedback">
                        Por favor indique su ciudad.
                    </div>
                </div>
                <div id="div-barrios" style="display: none;" class="form-group col-lg-4 col-md-4 col-sd-12 col-xs-12">
                    <label for="barrio-nqn" class="required">Seleccione su barrio </label>
                    <select id="barrio-nqn" class="selectpicker form-control" title="Seleccionar" name='barrio-nqn'>
                        <?php while ($row = odbc_fetch_array($barrios)) { ?>
                            <option value="<?= $row['id'] ?>"><?= utf8_encode($row['nombre']) ?></option>
                        <?php } ?>
                        <option value="0">Otro</option>
                    </select>
                    <div class="invalid-feedback">
                        Por favor seleccionar un barrio o ingreselo manualmente en 'otro'.
                    </div>
                </div>
                <div id="div-barrio-nqn-otro" style="display: none;" class="form-group col-lg-4 col-md-4 col-sd-12 col-xs-12">
                    <label for="barrio-nqn-otro" class="required">Escriba su barrio </label>
                    <input type="text" id="barrio-nqn-otro" class="form-control" placeholder="Nombre Barrio" name="barrio-nqn-otro" maxlength="100">

                    <div class="invalid-feedback">
                        Por favor ingrese su barrio.
                    </div>
                </div>
            </div>
            <!-- BARRIO -->
            <div class="form-group row">
                <div class="form-group col-lg-4 col-md-4 col-sd-12 col-xs-12 ">
                    <label for="direccion-cp" class="required">Código Postal </label>
                    <input type="number" id="direccion-cp" class="form-control" placeholder="Código postal" name="direccion-cp" min="0" max="9999" pattern="^[0-9]">

                    <div class="invalid-feedback">
                        Por favor ingrese su código postal. Ejemplo Neuquén: 8300
                    </div>
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sd-12 col-xs-12 ">
                    <label for="direccion-calle" class="required">Calle </label>
                    <input type="text" id="direccion-calle" class="form-control" placeholder="Calle" name="direccion-calle" maxlength="200">

                    <div class="invalid-feedback">
                        Por favor ingrese su domicilio.
                    </div>
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sd-12 col-xs-12 ">
                    <label for="direccion-numero" class="required">Número </label>
                    <input type="number" id="direccion-numero" class="form-control" placeholder="Número" name="direccion-numero" min="0" max="99999" pattern="^[0-9]">

                    <div class="invalid-feedback">
                        Por favor ingrese la númeración de su domicilio.
                    </div>
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sd-12 col-xs-12 ">
                    <label for="direccion-departamento">Departamento (opcional) </label>
                    <input type="text" id="direccion-departamento" class="form-control" placeholder="Departamento" name="direccion-departamento" maxlength="4">

                    <div class="invalid-feedback">
                        Por favor ingrese un número de departamento si vive en uno.
                    </div>
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sd-12 col-xs-12 ">
                    <label for="direccion-piso">Piso (opcional) </label>
                    <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" id="direccion-piso" class="form-control" placeholder="Piso" name="direccion-piso" maxlength="2">

                    <div class="invalid-feedback">
                        Por favor ingrese el piso de departamento si vive en uno.
                    </div>
                </div>
            </div>
            <input class="btn btn-primary mt-3 mb-3" type="submit" id="submit" value="Actualizar" name="personalesSubmit" />

        </form>
        <hr>
        <form action="05_condicionesPost.php" method="POST" enctype="multipart/form-data" class="form-horizontal mx-auto needs-validation" name="form-5" id="form-5">
            <h4 class="text-white">Aceptar Términos</h4>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="terminosycondiciones" id="terminosycondiciones" required>
                    <label class="form-check-label text-white" for="terminosycondiciones">
                        He le&iacute;do y acepto las <a class="ml-1 text-white" href="BASES_Y_CONDICIONES.pdf" target="_blank" style="text-decoration: underline;"> Bases y condiciones </a>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="clausulavalidezddjj" id="clausulavalidezddjj" required>
                    <label class="form-check-label text-white" for="clausulavalidezddjj">
                        He le&iacute;do y acepto la <a class="ml-1 text-white" href="BASES_Y_CONDICIONES.pdf" target="_blank" style="text-decoration: underline;"> Cláusula de Validez de DDJJ</a>
                    </label>
                </div>

                <div class="invalid-feedback" style="color: #dc3545;">
                    <strong>
                        Debe aceptar los t&eacute;rminos.
                    </strong>
                </div>
            </div>
            <div class="form-inline">
                <span>
                    Cualquier duda o consulta pod&eacute;s enviarnos un email a: <a class="text-white" href="mailto:carnetma@muninqn.gob.ar" target="_blank" style="text-decoration: underline;">carnetma@muninqn.gob.ar</a>
                </span>
            </div>
            <input class="btn btn-primary mt-3 mb-3" type="submit" id="submit" value="Registrar datos" />
        </form>
    </div>