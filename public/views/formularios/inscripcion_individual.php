<?php

if ($errores) {
    echo "<script>window.addEventListener('load', function () {mostrarErrorEnAlta();});</script>";
}

?>

<body>
    <div class="body container" style="margin-bottom: 5em;">
        <div class="datos-perfil">
            <div class="card text-center rounded mb-3" style="background-color:white; margin-top: 1.5em;">
                <div id="contenedorImagen">
                    <img src='../../estilos/libreta/icono-persona.png' name="fotografia" class="fotografia card-img-top img-fluid" id="fotografia" style="margin: 20px auto; height:200px; width: 200px;">
                </div>
                <div class="card-body" style="background-color: white; color: #315891 !important;">
                    <p>
                    <h4 id="cardNombre" class="card-title mt-2"><?= "$nombre $apellido" ?></h4>
                    </p>
                    <p id="cardDni"><small><i class="fa fa-envelope ml-0"></i>
                            <bold>Dni: </bold><?= $dni ?>
                        </small></p>
                    <p id="cardTelefono"><small>
                            <bold>Tel:</bold> <?= $celular; ?>
                        </small></p>
                    <p id="cardEmail"><small><i class="fa fa-envelope ml-0"></i>
                            <bold>Email: </bold><?= $email ?>
                        </small></p>
                    <p id="cardFechanacimiento"><small><i class="fa fa-envelope ml-0"></i>
                            <bold>Fecha de Nacimiento: </bold><?= $fechanacimiento ?>
                        </small></p>
                    <p id="cardGenero"><small><i class="fa fa-envelope ml-0"></i>
                            <bold>G&eacute;nero:</bold> <?= $genero ?>
                        </small></p>
                </div>
            </div>
        </div>
        <h1 class="titulo mb-5 mt-5">Registro de profesionales y afines a la actividad física </h1>
        <?PHP

        if(isset($_SESSION['errores']) AND !empty($_SESSION['errores'])){
            echo
                "<div class='alert alert-danger mt-3' role='alert'>
                Error: " . $error . "
                </div>";
        }
        ?>

        <!-- COMIENZO DE TABS/ PESTAÑAS -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link <?PHP if ($estado_inscripcion == "DatosPersonales") {echo "active";} else {echo "disabled";} ?>" data-toggle="tab" href="#tabs-1" role="tab">1 - Datos Personales</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?PHP if ($estado_inscripcion == "Titulos") {echo "active";} else {echo "disabled";   } ?>" data-toggle="tab" href="#tabs-2" role="tab">2 - Títulos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?PHP if ($estado_inscripcion == "Trabajos") {echo "active";} else {echo "disabled";  } ?>" data-toggle="tab" href="#tabs-3" role="tab">3 - Lugar Trabajo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?PHP if ($estado_inscripcion == "Actividades") {echo "active";} else {echo "disabled";} ?>" data-toggle="tab" href="#tabs-4" role="tab">4 - Actividades</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?PHP if ($estado_inscripcion == "Condiciones") {echo "active";} else {echo "disabled";} ?>" data-toggle="tab" href="#tabs-5" role="tab">5 - Condiciones</a>
            </li>
        </ul><!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane <?PHP if ($estado_inscripcion == "DatosPersonales") {echo "active"; } ?>" id="tabs-1" role="tabpanel">
                <?PHP include('./01_personales.php'); ?>
            </div>
            <div class="tab-pane <?PHP if ($estado_inscripcion == "Titulos") {echo "active";} ?>" id="tabs-2" role="tabpanel">
                <?PHP include('./02_titulos.php'); ?>
            </div>
            <div class="tab-pane <?PHP if ($estado_inscripcion == "Trabajos") {echo "active";} ?>" id="tabs-3" role="tabpanel">
                <?PHP include('./03_trabajos.php'); ?>
            </div>
            <div class="tab-pane <?PHP if ($estado_inscripcion == "Actividades") {echo "active";} ?>" id="tabs-4" role="tabpanel">
                <?PHP include('./04_actividades.php'); ?>
            </div>
            <div class="tab-pane <?PHP if ($estado_inscripcion == "Condiciones") {echo "active"; } ?>" id="tabs-5" role="tabpanel">
                <?PHP include('./05_condiciones.php'); ?>
            </div>
        </div>
    </div>


</body>