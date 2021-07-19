<form action="04_actividadesPost.php" method="POST" enctype="multipart/form-data" class="form-horizontal mx-auto needs-validation" name="form-4" id="form-4" novalidate>
    <div class="card-body mb-5" style="border-bottom-right-radius: 20px;border-bottom-left-radius:20px;">
        <h4 class="text-white">Inscripción por Actividades</h4>
        <hr>
        <!-- SELECCIÓN ACTIVIDADES LABORALES -->
        <div class="form-group">
            <h5 class="text-white pt-3">Deportes de calificación y votación</h5>
            <div class="row" id="actividades-laborales">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" values="1" name="actividades[]">
                        <label class="custom-control-label" for="customCheck1">Boxeo</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" values="2" name="actividades[]">
                        <label class="custom-control-label" for="customCheck2">Lucha Deportiva</label>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" values="3" name="actividades[]">
                        <label class="custom-control-label" for="customCheck3">Lucha Sumo</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" values="4" name="actividades[]">
                        <label class="custom-control-label" for="customCheck4">Lucha Sambo</label>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" values="5" name="actividades[]">
                        <label class="custom-control-label" for="customCheck3">Judo</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" values="6" name="actividades[]">
                        <label class="custom-control-label" for="customCheck4">Karate</label>
                    </div>

                </div>
            </div>
            <h5 class="text-white pt-3">Deportes de anotación</h5>
            <div class="row" id="actividades-laborales">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" values="7" name="actividades[]">
                        <label class="custom-control-label" for="customCheck1">Taekkwondo</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" values="8" name="actividades[]">
                        <label class="custom-control-label" for="customCheck2">Otra actividad</label>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" values="3" name="actividades[]">
                        <label class="custom-control-label" for="customCheck3">Una actividad</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" values="4" name="actividades[]">
                        <label class="custom-control-label" for="customCheck4">Otra actividad</label>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" values="3" name="actividades[]">
                        <label class="custom-control-label" for="customCheck3">Una actividad</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" values="4" name="actividades[]">
                        <label class="custom-control-label" for="customCheck4">Otra actividad</label>
                    </div>
                </div>
            </div>
            <h5 class="text-white pt-3">Deportes de medición</h5>
            <div class="row" id="actividades-laborales">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" values="1" name="actividades[]">
                        <label class="custom-control-label" for="customCheck1">Una actividad</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" values="2" name="actividades[]">
                        <label class="custom-control-label" for="customCheck2">Otra actividad</label>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" values="3" name="actividades[]">
                        <label class="custom-control-label" for="customCheck3">Una actividad</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" values="4" name="actividades[]">
                        <label class="custom-control-label" for="customCheck4">Otra actividad</label>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" values="3" name="actividades[]">
                        <label class="custom-control-label" for="customCheck3">Una actividad</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" values="4" name="actividades[]">
                        <label class="custom-control-label" for="customCheck4">Otra actividad</label>
                    </div>
                </div>
            </div>
        </div>
        <input class="btn btn-primary mt-3 mb-3" type="button" onclick="reiniciarForm()" value="Reiniciar" />
        <input class="btn btn-primary mt-3 mb-3" type="submit" id="submit" value="Registrar datos" name="actividadesSubmit" />
    </div>
</form>