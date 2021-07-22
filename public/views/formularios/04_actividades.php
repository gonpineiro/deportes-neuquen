<?PHP
$categoriaController = new CategoriaActividadController();
$actividadController = new ActividadController();

$categorias = $categoriaController->index();
?>

<form action="04_actividadesPost.php" method="POST" enctype="multipart/form-data" class="form-horizontal mx-auto needs-validation" name="form-4" id="form-4" novalidate>
    <div id="paso-3" class="card-body mb-5" style="border-bottom-right-radius: 20px;border-bottom-left-radius:20px;">
        <h4 class="text-white">Inscripción por Actividades</h4>
        <hr>
        <!-- SELECCIÓN ACTIVIDADES LABORALES -->
        <div class="form-group">

            <?php while ($row = odbc_fetch_array($categorias)) {
                $actividades = $actividadController->index(['id_categoria' => $row['id']]);
            ?>
                <h5 class="text-white pt-4 pb-2"><?= $row['nombre'] ?></h5>
                <div class="row">
                    <?php

                    while ($row = odbc_fetch_array($actividades)) { ?>
                        <div class="col-lg-3 col-md-12 pb-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox<?= $row['id'] ?>" value="<?= $row['id'] ?>" name="actividades[]">
                                <label class="custom-control-label" for="checkbox<?= $row['id'] ?>"><?= $row['nombre'] ?></label>
                            </div>
                        </div>

                    <?php }
                    ?>
                </div>
            <?php } ?>
            <hr>
        </div>
        <input class="btn btn-primary mt-3 mb-3" type="button" onclick="reiniciarForm()" value="Reiniciar" />
        <input class="btn btn-primary mt-3 mb-3" type="submit" id="submit" value="Confirmar y Guardar" name="actividadesSubmit" />
    </div>
</form>