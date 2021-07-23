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
                        <div class="col-lg-3 col-md-12 pb-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input checkboxes" id="checkbox<?= $row['id'] ?>" value="<?= $row['id'] ?>" name="actividades[]">
                                <label class="custom-control-label" for="checkbox<?= $row['id'] ?>"><?= $row['nombre'] ?></label>
                            </div>
                        </div>

                    <?php }
                    ?>
                </div>
            <?php } ?>
        </div>
        <hr>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <div class="buttonsRow">
                <input class="btn btn-primary mr-3" type="button" onclick="reiniciarForm()" value="Reiniciar" />
                <input class="btn btn-primary submitBtn" type="submit" id="actividadesSubmit" value="Confirmar y Guardar" name="actividadesSubmit" />
            </div>
            <p class="process" style="display: none;">Procesando...</p>
        </div>
    </div>
</form>