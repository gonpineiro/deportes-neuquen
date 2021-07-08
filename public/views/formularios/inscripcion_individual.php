<?php

if ($errores) {
    echo "<script>window.addEventListener('load', function () {mostrarErrorEnAlta();});</script>";
}

?>

<body>
    <div class="body container" style="margin-bottom: 5em;">
        <div class="datos-perfil">
            <div class="card text-center rounded mb-3" style="background-color:white; margin-top: 1.5em;">
                <div id="contenedorImagen">
                    <img src='../../estilos/libreta/icono-persona.png' name="fotografia" class="fotografia card-img-top img-fluid" id="fotografia" style="margin: 20px auto; height:200px; width: 200px;">
                </div>
                <div class="card-body" style="background-color: white; color: #315891 !important;">
                    <p>
                    <h4 id="cardNombre" class="card-title mt-2"><?= "$nombre $apellido" ?></h4>
                    </p>
                    <p id="cardDni"><small><i class="fa fa-envelope ml-0"></i>
                            <bold>Dni: </bold><?= $dni ?>
                        </small></p>
                    <p id="cardTelefono"><small>
                            <bold>Tel:</bold> <?= $celular; ?>
                        </small></p>
                    <p id="cardEmail"><small><i class="fa fa-envelope ml-0"></i>
                            <bold>Email: </bold><?= $email ?>
                        </small></p>
                    <p id="cardFechanacimiento"><small><i class="fa fa-envelope ml-0"></i>
                            <bold>Fecha de Nacimiento: </bold><?= $fechanacimiento ?>
                        </small></p>
                    <p id="cardGenero"><small><i class="fa fa-envelope ml-0"></i>
                            <bold>G&eacute;nero:</bold> <?= $genero ?>
                        </small></p>
                </div>
            </div>
        </div>
        <div class="">
            <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal mx-auto needs-validation" name="form" id="form" novalidate>
                <div class="row form">
                    <div class="col-12 elementor-divider"> <span class="elementor-divider-separator"></span></div>
                </div>
                <div class="row form">
                    <div class="col-12">
                        <?php include('./components/user-msg.php') ?>
                        <h1 class="titulo float-left mb-5">Registro de profesionales y afines a la actividad física </h1>
                    </div>
                </div>

                <div class="row form" hidden>
                    <label id="lblDNI"><?= $dni; ?></label>
                    <label id="lblDireccionRenaper"><?= $direccionRenaper; ?></label>
                    <label id="lblNroTramite"><?= $nroTramite; ?></label>
                    <label id="lblEmail"><?= $email; ?></label>
                    <label id="lblCelular"><?= $celular; ?></label>
                    <label id="lblFechaNac"><?= $celular; ?></label>
                    <label id="lblGenero"><?= $genero; ?></label>
                    <label id="lblRazonSocial"><?= $razonSocial; ?></label>
                    <label id="lblApellido"><?= $apellido; ?></label>
                    <label id="lblNombre"><?= $nombre; ?></label>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="">
                            <div class="">
                                <div class="card-body mb-5" style="border-radius: 20px;">
                                    <!-- DATOS PERSONALES -->
                                    <h4 class="text-white">Datos personales</h4>
                                    <hr>
                                    <div class="form-group row">
                                        <div class="form-group col-lg-4 col-md-4 col-sd-12 col-xs-12">
                                            <label for="email" class="required">Compruebe su direcci&oacute;n de email </label>
                                            <input type="email" id="email" class="form-control" value="<?= $email; ?>" placeholder="Email" name="email" maxlength="200" >
                                            <div class="invalid-feedback">
                                                <strong>
                                                    Por favor ingrese el direcci&oacute;n.
                                                </strong>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-4 col-md-4 col-sd-12 col-xs-12">
                                            <label for="telefono" class="required">Actualice su n&uacute;mero de tel&eacute;fono </label>
                                            <input type="number" id="telefono" class="form-control" value="<?= $celular; ?>" placeholder="Tel&eacute;fono" name="telefono" min="0" max="9999999999" pattern="^[0-9]" >
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
                                                <option value="0">Neuquén</option>
                                                <option value="1">Cipolletti</option>
                                                <option value="2">Allen</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Por favor indique su ciudad.
                                            </div>
                                        </div>
                                        <div id="div-barrios" style="display: none;" class="form-group col-lg-4 col-md-4 col-sd-12 col-xs-12">
                                            <label for="barrio-nqn" class="required">Seleccione su barrio </label>
                                            <select id="barrio-nqn" class="selectpicker form-control" title="Seleccionar" name='barrio-nqn'>
                                                <option value="1">Barrio 1</option>
                                                <option value="2">Barrio 2</option>
                                                <option value="3">Barrio 3</option>
                                                <option value="0">Otro</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Por favor seleccionar un barrio o ingreselo manualmente en 'otro'.
                                            </div>
                                        </div>
                                        <div id="div-barrio-nqn-otro" style="display: none;" class="form-group col-lg-4 col-md-4 col-sd-12 col-xs-12">
                                            <label for="barrio-nqn-otro" class="required">Escriba su barrio </label>
                                            <input type="text" id="barrio-nqn-otro" class="form-control" placeholder="Nombre Barrio" name="barrio-nqn-otro" maxlength="100" >

                                            <div class="invalid-feedback">
                                                Por favor ingrese su barrio.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- BARRIO -->
                                    <div class="form-group row">
                                        <div class="form-group col-lg-4 col-md-4 col-sd-12 col-xs-12 ">
                                            <label for="direccion-cp" class="required">Código Postal </label>
                                            <input type="number" id="direccion-cp" class="form-control" placeholder="Código postal" name="direccion-cp" min="0" max="9999" pattern="^[0-9]" >

                                            <div class="invalid-feedback">
                                                Por favor ingrese su código postal. Ejemplo Neuquén: 8300
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-4 col-md-4 col-sd-12 col-xs-12 ">
                                            <label for="direccion-calle" class="required">Calle </label>
                                            <input type="text" id="direccion-calle" class="form-control" placeholder="Calle" name="direccion-calle" maxlength="200" >

                                            <div class="invalid-feedback">
                                                Por favor ingrese su domicilio.
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-4 col-md-4 col-sd-12 col-xs-12 ">
                                            <label for="direccion-numero" class="required">Número </label>
                                            <input type="number" id="direccion-numero" class="form-control" placeholder="Número" name="direccion-numero" min="0" max="99999" pattern="^[0-9]" >

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
                                    <hr>
                                    <div class="form-group row">
                                        <div class="form-group col-lg-6 col-md-6 col-sd-12 col-xs-12 ">
                                            <label for="adjunto-antecedentes" class="required">Adjuntar certificado de antecedentes penales (.jpg - .jpeg - .png - .pdf)</label>
                                            <div class="custom-file" id="adjunto-antecedentes">
                                                <input id="antecedentes" class="custom-file-input" type="file" name="antecedentes">
                                                <label for="antecedentes" class="custom-file-label required" id="label-antecedentes"><span style="font-size: 1rem;">Adjuntar Archivo (imagen o pdf)</span></label>
                                            </div>
                                            <div class="invalid-feedback">
                                                Por favor cargue o compruebe que se cargo el adjunto correctamente.
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- TITULO - PROFESIÓN -->
                                <div class="card-body mb-5" style="border-radius: 20px;">
                                    <h4 class="text-white">Datos Profesionales</h4>
                                    <hr>
                                    <div id="inputs-titulos" class="form-group row">
                                        <div class="form-group col-lg-6 col-md-6 col-sd-12 col-xs-12 ">
                                            <label for="tipo-titulo" class="required">Elegir título y/o curso </label>
                                            <select id="tipo-titulo" class="selectpicker form-control" title="Seleccionar" name='titulos[]' required>
                                                <option value="1">Lic. Educación Física (Título Terciario).</option>
                                                <option value="2">Master Educación Física (Título Terciario)</option>
                                                <option value="0">Profesorado Educación Física (Título Terciario)</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Por favor seleccionar un título/ ocupación.
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sd-12 col-xs-12">
                                            <label for="div-adjunto-titulo" class="required">Título o certificado (Formatos: .jpg - .jpeg - .png) </label>
                                            <div class="custom-file" id="div-adjunto-titulo">
                                                <input id="imagen-titulo" class="custom-file-input imagen" type="file" name="imagenTitulos[]" accept="image/png, image/jpeg">
                                                <label for="imagen-titulo" class="custom-file-label" id="label-imagen-titulo"><span style="font-size: 1rem;">Adjuntar imagen formato JPEG/PNG</span></label>
                                            </div>
                                            <div class="invalid-feedback">
                                                Por favor cargue la imagen correctamente.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <a onclick="otroTitulo()" class="btn btn-light boton-agregar-titulo">Agregar Título</a>
                                        <a onclick="sacarOtroTitulo()" class="btn btn-light boton-quitar-titulo">Quitar Título</a>
                                    </div>
                                </div>
                                <!-- DATOS LABORALES -->
                                <div class="card-body mb-5" style="border-radius: 20px;">
                                    <h4 class="text-white">Experiencia Laboral</h4>
                                    <hr>
                                    <div id="inputs-lugar-trabajo" class="form-group row">
                                        <!-- LUGAR Y CERTIFICACIÓN DE TRABAJO -->
                                        <div class="form-group col-lg-6 col-md-6 col-sd-12 col-xs-12 ">
                                            <label for="lugarTrabajo" class="required">Ingresar lugar de trabajo </label>
                                            <input type="text" id="lugarTrabajo" class="form-control" placeholder="Dirección local de trabajo" name="lugarTrabajo[]">
                                            <div class="invalid-feedback">
                                                Por favor ingrese un domicilio de trabajo.
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sd-12 col-xs-12">
                                            <label for="div-certificacion-lugar-0" class="required">Imagen (Formatos: .jpg - .jpeg - .png) </label>
                                            <div class="custom-file" id="div-certificacion-lugar-0">
                                                <input id="imagen-certificacion-lugar-0" class="custom-file-input" type="file" name="imagenLugares[]" accept="image/png, image/jpeg">
                                                <label for="imagen-certificacion-lugar-0" class="custom-file-label" id="label-imagen-certificacion-lugar"><span style="font-size: 1rem;">Adjuntar imagen formato JPEG/PNG</span></label>
                                            </div>
                                            <div class="invalid-feedback">
                                                Por favor cargue la imagen correctamente.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <a onclick="otroLugarTrabajo()" class="btn btn-light boton-agregar-titulo">Agregar Lugar</a>
                                        <a onclick="sacarOtroLugarTrabajo()" class="btn btn-light boton-quitar-titulo">Quitar Lugar</a>
                                    </div>
                                    <div class="form-group row">
                                        <!-- SELECCIÓN ACTIVIDADES LABORALES -->
                                        <div class="form-group col-lg-6 col-md-6 col-sd-12 col-xs-12 ">
                                            <label for="actividades-laborales" class="required">Seleccionar actividad laboral (una o varias) </label>
                                            <div id="actividades-laborales">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" values="1" name="actividades[]">
                                                    <label class="custom-control-label" for="customCheck1">Una actividad</label>
                                                </div>

                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" values="2" name="actividades[]">
                                                    <label class="custom-control-label" for="customCheck2">Otra actividad</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" values="3" name="actividades[]">
                                                    <label class="custom-control-label" for="customCheck3">Una actividad</label>
                                                </div>

                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" values="4" name="actividades[]">
                                                    <label class="custom-control-label" for="customCheck4">Otra actividad</label>
                                                </div>
                                            </div>
                                            <div class="invalid-feedback">
                                                Por favor ingrese las actividades.
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-body mb-5" style="border-radius: 20px;">
                                    <h4 class="text-white">Pago de Recibo</h4>
                                    <hr>
                                    <div class="form-group row">
                                        <div class="form-group col-lg-6 col-md-6 col-sd-12 col-xs-12 ">
                                            <label for="nro_recibo">Nro. de recibo Cannon (solo números)</label>
                                            <input type="number" id="nro_recibo" min="0" max="9999999999" pattern="^[0-9]" class="form-control" placeholder="Ej: 257972906" name="nro_recibo" >
                                            <div class="invalid-feedback">
                                                Por favor ingrese un n&uacute;mero como el Ej: 257972906
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sd-12 col-xs-12 ">
                                            <label for="div-imagen" class="required">Imagen (Formatos: .jpg - .jpeg - .png) </label>
                                            <div class="custom-file" id="div-imagen">
                                                <input id="recibo" class="custom-file-input" type="file" name="recibo" accept="image/png, image/jpeg">
                                                <label for="recibo" class="custom-file-label" id="label-recibo"><span style="font-size: 1rem;">Adjuntar imagen formato JPEG/PNG</span></label>
                                            </div>
                                            <div class="invalid-feedback">
                                                Por favor cargue la imagen correctamente.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- SEPARADOR -->
                        <div class="elementor-divider"> <span class="elementor-divider-separator"></span></div>

                    </div>
                </div>
        </div>
        <div class="row mt-3 mb-3">
            <div class="col-12">
                <div class="form">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="terminosycondiciones" id="terminosycondiciones" onchange="terminosycondicionescheck();" required>
                        <label class="form-check-label" for="terminosycondiciones">
                            He le&iacute;do y acepto las <a class="ml-1" href="BASES_Y_CONDICIONES.pdf" target="_blank"> Bases y condiciones </a>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="clausulavalidezddjj" id="clausulavalidezddjj" onchange="terminosycondicionescheck();" required>
                        <label class="form-check-label" for="clausulavalidezddjj">
                            He le&iacute;do y acepto la <a class="ml-1" href="BASES_Y_CONDICIONES.pdf" target="_blank"> Cláusula de Validez de DDJJ</a>
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
                        Cualquier duda o consulta pod&eacute;s enviarnos un email a: <a href="mailto:carnetma@muninqn.gob.ar" target="_blank">carnetma@muninqn.gob.ar</a>
                    </span>
                </div>
                <div id="enviando" class="spinner-border text-primary hideDiv" role="status">
                    <span class="sr-only">Enviando...</span>
                </div>
                <input class="btn btn-primary mt-3 mb-3" type="submit" id="submit" value="Registrar datos" />
            </div>
        </div>
        </form>

    </div>
    </div>


</body>