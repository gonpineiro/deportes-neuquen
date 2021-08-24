<?php
$categoriasActividades = $categoriaActividadController->index();
?>

<form action="04_actividadesPost.php" method="POST" enctype="multipart/form-data" class="form-horizontal mx-auto needs-validation" name="form-4" id="form-4" novalidate>
    <div id="paso-3" class="card-body mb-5" style="border-bottom-right-radius: 20px;border-bottom-left-radius:20px;">
        <h4 class="text-white">Inscripción por Actividades</h4>
        <hr>
        <!-- SELECCIÓN ACTIVIDADES LABORALES -->
        <div class="form-group">

            <?php while ($row = odbc_fetch_array($categoriasActividades)) {
                $actividades = $actividadController->index(['id_categoria' => $row['id']]);
            ?>
                <h5 class="text-white pt-4 pb-2"><?= $row['nombre'] ?></h5>
                <div class="row">
                    <?php

                    while ($row = odbc_fetch_array($actividades)) { ?>
                        <div class="col-lg-3 col-md-6 pb-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input checkboxes" id="checkbox<?= $row['id'] ?>" value="<?= $row['id'] ?>" name="actividades[]
                                " <?PHP
                                    foreach ($sol_actividades as $sol_actividad) {

                                        if ($sol_actividad['nombre'] == $row['nombre']) {
                                            echo "checked";
                                        }
                                    }
                                    ?>>
                                <label class="custom-control-label" for="checkbox<?= $row['id'] ?>"><?= $row['nombre'] ?></label>
                            </div>
                        </div>

                    <?php }
                    ?>
                </div>
            <?php } ?>
        </div>
        <hr>
        <div class="buttonsRow container">
            <div class="row">
                <div class="col-md-12 my-1">
                    <div class="float-md-right float-xs-left">
                        <input class="btn btn-primary submitBtn" type="submit" id="actividadesSubmit" value="Confirmar y Guardar" name="actividadesSubmit" />
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