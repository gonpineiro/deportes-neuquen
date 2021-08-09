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