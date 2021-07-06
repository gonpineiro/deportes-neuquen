<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="prueba2.php" method="POST" enctype="multipart/form-data">
        <input id="imagenTitulos" class="custom-file-input" type="file" name="imagenTitulos[]" accept="image/png, image/jpeg">
        <input type="submit">
    </form>

</body>

</html>
<?php

// // Nombre de la imagen
// $path = 'image.png';

// // Extensión de la imagen
// $type = pathinfo($path, PATHINFO_EXTENSION);

// // Cargando la imagen
// $data = file_get_contents($path);

// // Decodificando la imagen en base64
// $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

// // Mostrando la imagen
// echo '<img src="' . $base64 . '"/>';

// // Mostrando el código base64
// echo $base64;

?>