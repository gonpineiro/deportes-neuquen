<?php

include '../../../../app/config/config.php';

verificarUsuario(3);

if (isset($_POST["actividadesUpdateSubmit"])) {
    $id_solicitud = $_POST['id_solicitud'];

    $solicitudActividadController = new SolicitudActividadController();
    $solicitudActividadController->update(['deleted_at' => date('Y-m-d')], $id_solicitud, 'id_solicitud');

    foreach ($_POST['actividades'] as $actividad) {
        $solicitudActividadController->store(
            [
                'id_solicitud' => $id_solicitud,
                'id_actividad' => $actividad,
                'deleted_at' => null,
            ]
        );
    }

    header('Location: ../info_solicitud.php?id=' .  $id_solicitud);
} else {
    //
}
