<div style="min-height: 50px;">
    <h2 style="padding:30px 0px;color: #076AB3;">SOLICITUDES APROBADAS</h2>
</div>
<div class="table-responsive">
    <table id="tabla_solicitudes_aprobadas" class="table tablas_solicitudes_aprobadas">
        <thead class="thead-dark">
            <tr>
                <th scope="col">N°</th>
                <th scope="col">DNI</th>
                <th scope="col">Apellido</th>
                <th scope="col">Nombre</th>
                <th scope="col">Retiro</th>
                <th scope="col">Fecha Aprobación</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($solicitudesAprobadas as $solicitud) { ?>
                <tr>
                    <th scope="row"><?= $solicitud['id'] ?></th>
                    <td><?= $solicitud['dni'] ?></td>
                    <td><?= $solicitud['apellido'] ?></td>
                    <td><?= $solicitud['nombre'] ?></td>
                    <td><?= 'retiro' ?></td>
                    <td><?= $solicitud['fecha_evaluacion'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>