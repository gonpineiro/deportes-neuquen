<body>
    <?php include('../common/navbar.php'); ?>

    <div class="body container" style="margin-bottom: 5em;">

        <?php include('../common/datosPerfil.php') ?>
        <h1 class="titulo mb-5 mt-5">Registro de profesionales y afines a la actividad física </h1>
        <?php

        if (isset($_SESSION['errores']) and !empty($_SESSION['errores'])) {
            echo
            "<div class='alert alert-danger mt-3' role='alert'>
                Error: " . $_SESSION['errores'] . "
                </div>";
        }
        ?>

        <!-- COMIENZO DE TABS/ PESTAÑAS -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link <?php if ($estado_inscripcion == "DatosPersonales") {
                                        echo "active";
                                    } else {
                                        echo "disabled";
                                    } ?>" data-toggle="tab" href="#tabs-1" role="tab">1 - Datos Personales</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($estado_inscripcion == "Titulos") {
                                        echo "active";
                                    } else {
                                        echo "disabled";
                                    } ?>" data-toggle="tab" href="#tabs-2" role="tab">2 - Formación Académica</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($estado_inscripcion == "Trabajos") {
                                        echo "active";
                                    } else {
                                        echo "disabled";
                                    } ?>" data-toggle="tab" href="#tabs-3" role="tab">3 - Lugar Trabajo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($estado_inscripcion == "Actividades") {
                                        echo "active";
                                    } else {
                                        echo "disabled";
                                    } ?>" data-toggle="tab" href="#tabs-4" role="tab">4 - Actividades</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($estado_inscripcion == "Condiciones") {
                                        echo "active";
                                    } else {
                                        echo "disabled";
                                    } ?>" data-toggle="tab" href="#tabs-5" role="tab">5 - Condiciones</a>
            </li>
        </ul><!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane <?php if ($estado_inscripcion == "DatosPersonales") {
                                        echo "active";
                                    } ?>" id="tabs-1" role="tabpanel">
                <?php if ($estado_inscripcion == "DatosPersonales") include('./01_personales.php'); ?>
            </div>
            <div class="tab-pane <?php if ($estado_inscripcion == "Titulos") {
                                        echo "active";
                                    } ?>" id="tabs-2" role="tabpanel">
                <?php if ($estado_inscripcion == "Titulos") include('./02_titulos.php'); ?>
            </div>
            <div class="tab-pane <?php if ($estado_inscripcion == "Trabajos") {
                                        echo "active";
                                    } ?>" id="tabs-3" role="tabpanel">
                <?php if ($estado_inscripcion == "Trabajos") include('./03_trabajos.php'); ?>
            </div>
            <div class="tab-pane <?php if ($estado_inscripcion == "Actividades") {
                                        echo "active";
                                    } ?>" id="tabs-4" role="tabpanel">
                <?php if ($estado_inscripcion == "Actividades") include('./04_actividades.php'); ?>
            </div>
            <div class="tab-pane <?php if ($estado_inscripcion == "Condiciones") {
                                        echo "active";
                                    } ?>" id="tabs-5" role="tabpanel">
                <?php if ($estado_inscripcion == "Condiciones") include('./05_condiciones.php'); ?>
            </div>
        </div>
    </div>


</body>