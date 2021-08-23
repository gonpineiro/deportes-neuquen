<div style="min-height: 50px;">
    <h2 style="padding:30px 0px;color: #076AB3;">SOLICITUDES NUEVAS</h2>
</div>
<div class="table-responsive">
    <table id="tabla_nuevas_solicitudes" class="table tablas_solicitudes_nuevas">
        <thead class="thead-dark">
            <tr>
                <th scope="col">N°</th>
                <th scope="col">DNI</th>
                <th scope="col">Apellido</th>
                <th scope="col">Nombre</th>
                <th scope="col">Fecha Solicitud</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($solicitudesNuevas as $solicitud) { ?>
                <tr id=<?= $solicitud['id'] ?>>
                    <th scope="row"><?= $solicitud['id'] ?></th>
                    <td><?= $solicitud['dni'] ?></td>
                    <td><?= $solicitud['apellido'] ?></td>
                    <td><?= $solicitud['nombre'] ?></td>
                    <td><?= $solicitud['fecha_alta'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>