<form action="03_trabajosPost.php" method="POST" enctype="multipart/form-data" class="form-horizontal mx-auto needs-validation" name="form" id="form" novalidate>
    <div id="paso-2" class="card-body mb-5" style="border-bottom-right-radius: 20px;border-bottom-left-radius:20px;">
        <h4 class="text-white">Lugar de Trabajo</h4>
        <hr>
        <div id="inputs-lugar-trabajo" class="form-group row">
            <!-- LUGAR Y CERTIFICACIÓN DE TRABAJO -->
            <div class="form-group col-lg-6 col-md-6 col-sd-12 col-xs-12 ">
                <label for="lugarTrabajo">Ingresar lugar de trabajo </label>
                <input type="text" id="lugarTrabajo" class="form-control" placeholder="Lugar de trabajo" name="lugarTrabajo[]" required>
                <div class="invalid-feedback">
                    Por favor ingrese un lugar de trabajo.
                </div>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sd-12 col-xs-12">
                <label for="div-certificacion-lugar-0"> Archivo Cetificación Laboral (Formatos: .jpg - .jpeg - .png - .pdf) Opcional </label>
                <div class="custom-file" id="div-certificacion-lugar-0">
                    <input id="imagen-certificacion-lugar-0" class="custom-file-input pointer" type="file" name="imagenLugares[]" accept="image/png, image/jpeg" required>
                    <label for="imagen-certificacion-lugar-0" class="custom-file-label" id="label-imagen-certificacion-lugar"><span style="font-size: 1rem;">Cetificación Laboral (imagen o pdf)</span></label>
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
        <hr>


        <div class="buttonsRow container">
            <div class="row">
                <div class="custom-control custom-checkbox col-md-6 col-xs-12 my-2">
                    <input type="checkbox" class="custom-control-input" id="checkPaso3" value="" name="checkboxx">
                    <label class="custom-control-label" for="checkPaso3">Confirmo los datos ingresados para continuar.</label>
                </div>
                <div class="col-md-6 col-xs-12 my-1">
                    <div class="float-md-right float-xs-left">
                        <input class="btn btn-primary mr-3" type="button" onclick="reiniciarForm()" value="Reiniciar" />
                        <input class="btn btn-primary" type="submit" id="submitBtn3" disabled value="Confirmar y Guardar" name="trabajoSubmit" />
                    </div>
                </div>
            </div>
        </div>
        <div class="process" style="display: none;">
            <div class="spinner-border text-light" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
</form>