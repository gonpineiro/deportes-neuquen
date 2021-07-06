<?PHP

convertirABase64($_FILES['imagenTitulos']['tmp_name']);
function convertirABase64($rutaImagen)
{
    $contenidoBinario = file_get_contents($rutaImagen);
    $imagenComoBase64 = base64_encode($contenidoBinario);
    echo $imagenComoBase64;
    die();
}
