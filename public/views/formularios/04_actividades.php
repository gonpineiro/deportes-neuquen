<form action="04_actividadesPost.php" method="POST" enctype="multipart/form-data" class="form-horizontal mx-auto needs-validation" name="form-4" id="form-4" novalidate>
    <div class="card-body mb-5" style="border-bottom-right-radius: 20px;border-bottom-left-radius:20px;">
        <h4 class="text-white">Experiencia Laboral</h4>
        <hr>
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
        <input class="btn btn-primary mt-3 mb-3" type="submit" id="submit" value="Registrar datos" name="actividadesSubmit" />
    </div>
</form>