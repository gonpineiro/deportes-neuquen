<div class="card-body mb-5" style="border-bottom-right-radius: 20px;border-bottom-left-radius:20px;">
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
    <input class="btn btn-primary mt-3 mb-3" type="submit" id="submit3" value="Siguiente" />

</div>