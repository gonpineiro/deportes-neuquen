<!-- TITULO - PROFESIÓN -->
<div class="card-body mb-5" style="border-bottom-right-radius: 20px;border-bottom-left-radius:20px;">
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
    <input class="btn btn-primary mt-3 mb-3" type="submit" id="submit2" value="Siguiente" />

</div>