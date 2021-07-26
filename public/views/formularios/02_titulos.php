<?php
$ultimaSolicitudAprobada = $usuarioController->getLastSolicitudAprobada($id_wappersonas);
$titulosAprobados = $tituloController->index([
    'id_solicitud' => $ultimaSolicitudAprobada['id_solicitud'],
]);

$titulos = [];
while ($row = odbc_fetch_array($titulosAprobados)) array_push($titulos, $row);

?>
<!-- TITULO - PROFESIÓN -->
<form action="02_titulosPost.php" method="POST" enctype="multipart/form-data" class="form-horizontal mx-auto needs-validation" name="form-2" id="form-2" novalidate>
    <div id="paso-1" class="card-body mb-5" style="border-bottom-right-radius: 20px;border-bottom-left-radius:20px;">
        <h4 class="text-white">Datos de Títulos y/o Cursos</h4>
        <hr>
        <div id="inputs-titulos" class="form-group row">
            <div class="form-group col-lg-6 col-md-6 col-sd-12 col-xs-12 ">
                <label for="tipo-titulo" class="required">Elegir título y/o curso </label>
                <select id="tipo-titulo" class="selectpicker form-control" title="Seleccionar" name='titulos[]' required>
                    <option value="Lic. Educación Física (Título Terciario)">Lic. Educación Física (Título Terciario)</option>
                    <option value="Master Educación Física (Título Terciario)">Master Educación Física (Título Terciario)</option>
                    <option value="Profesorado Educación Física (Título Terciario)">Profesorado Educación Física (Título Terciario)</option>
                    <option value="Técnico Nacional (Título Federación u organismo estatal o privado reconocido por el Ministerio de Educación de Nación)">Técnico Nacional (Título Federación u organismo estatal o privado reconocido por el Ministerio de Educación de Nación)</option>
                    <option value="Técnico Provincial (Título Federación u organismo estatal con reconocimiento de C.P.E.)">Técnico Provincial (Título Federación u organismo estatal con reconocimiento de C.P.E.)</option>
                    <option value="Instructor Nacional (Título Federación Nacional o Institución privada con reconocimiento Nacional)">Instructor Nacional (Título Federación Nacional o Institución privada con reconocimiento Nacional)</option>
                    <option value="Instructor Deportivo (habilitación nacional-provincial o de federación u organismo municipal)">Instructor Deportivo (habilitación nacional-provincial o de federación u organismo municipal)</option>
                    <option value="Instructor de Artes Marciales (habilitación Federación c/cinturón acorde)">Instructor de Artes Marciales (habilitación Federación c/cinturón acorde)</option>
                    <option value="Instructor Aerobic y/o aparatos y/o musculación (con habilitación oficial)">Instructor Aerobic y/o aparatos y/o musculación (con habilitación oficial)</option>
                    <option value="Instructor/profesor de prácticas introyectivas">Instructor/profesor de prácticas introyectivas</option>
                    <option value="Instructor/profesor de prácticas acrobáticas">Instructor/profesor de prácticas acrobáticas</option>
                </select>
                <div class="invalid-feedback">
                    Por favor seleccionar un título/ curso.
                </div>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sd-12 col-xs-12">
                <label for="div-adjunto-titulo" class="required">Título o certificado (Formatos: .jpg - .jpeg - .png) </label>
                <div class="custom-file" id="div-adjunto-titulo">
                    <input id="imagen-titulo" class="custom-file-input imagen" type="file" name="imagenTitulos[]" accept="image/png, image/jpeg, application/pdf" required>
                    <label for="imagen-titulo" class="custom-file-label" id="label-imagen-titulo"><span style="font-size: 1rem;">Título o certificado (imagen o pdf)</span></label>
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
        <hr>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <div class="buttonsRow">
                <input class="btn btn-primary mr-3" type="button" onclick="reiniciarForm()" value="Reiniciar" />
                <input class="btn btn-primary submitBtn" type="submit" id="submit2" value="Confirmar y Guardar" name="tituloSubmit" data-toggle="tooltip" data-placement="top" title="Tooltip on top" />
            </div>
            <div class="process" style="display: none;">
                <div class="spinner-border text-light" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</form>