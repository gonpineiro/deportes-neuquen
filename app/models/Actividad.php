<?php

/**
 * This is the model class for table "Actividades".
 *
 * @property int $id_tipo
 * @property string $nombre
 * 
 */
class Actividad
{
    public $id_tipo;
    public $nombre;

    public function __construct()
    {
        $this->id_tipo = "";
        $this->nombre = "";
    }

    public function set($id_tipo = null, $nombre = null)
    {
        $this->id_tipo = $id_tipo;
        $this->nombre = $nombre;
    }

    public function save()
    {
        $array = json_decode(json_encode($this), true);
        $conn = new BaseDatos();
        $result = $conn->store(ACTIVIDADES, $array);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error al guardar una actividad';
            cargarLog(null, null, $error, get_class(), __FUNCTION__);
        }
        return $result;
    }

    public static function list($param = [], $ops = [])
    {
        $conn = new BaseDatos();
        $result = $conn->search(ACTIVIDADES, $param, $ops);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error al listar las actividades';
            cargarLog(null, null, $error, get_class(), __FUNCTION__);
        }
        return $result;
    }

    public static function get($params)
    {
        $conn = new BaseDatos();
        $result = $conn->search(ACTIVIDADES, $params);
        $actividad = $conn->fetch_assoc($result);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error a obtener la actividad: ' . $params[0];
            cargarLog(null, null, $error, get_class(), __FUNCTION__);
        }
        return $actividad;
    }

    public static function update($res, $id)
    {
        $conn = new BaseDatos();
        $result = $conn->update(ACTIVIDADES, $res, $id);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error a modificar la actividad ' . $id;
            cargarLog(null, null, $error, get_class(), __FUNCTION__);
        }
        return $result;
    }
}
