<?php

/**
 * This is the model class for table "Ciudad".
 *
 * @property int $id_provincia
 * @property string $nombre
 * 
 */
class Ciudad
{
    public $nombre;

    public function __construct()
    {
        $this->id_provincia = "";
        $this->nombre = "";
    }

    public function set($id_provincia = null, $nombre = null)
    {
        $this->id_provincia = $id_provincia;
        $this->nombre = $nombre;
    }

    public function save()
    {
        $array = json_decode(json_encode($this), true);
        $conn = new BaseDatos();
        $result = $conn->store(CIUDADES, $array);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error al guardar una ciudad';
            cargarLog(null, null, $error, get_class(), __FUNCTION__);
        }
        return $result;
    }

    public static function list($param = [], $ops = [])
    {
        $conn = new BaseDatos();
        $result = $conn->search(CIUDADES, $param, $ops);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error al listar las ciudades';
            cargarLog(null, null, $error, get_class(), __FUNCTION__);
        }
        return $result;
    }
    public static function listOrderBy($param = [], $ops = [], $orderBy, $order)
    {
        $conn = new BaseDatos();
        $result = $conn->searchOrderBy(CIUDADES, $param, $ops, $orderBy, $order);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error al listar las ciudades';
            cargarLog(null, null, $error, get_class(), __FUNCTION__);
        }
        return $result;
    }
    public static function get($params)
    {
        $conn = new BaseDatos();
        $result = $conn->search(CIUDADES, $params);
        $ciudad = $conn->fetch_assoc($result);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error a obtener la ciudad: ' . $params[0];
            cargarLog(null, null, $error, get_class(), __FUNCTION__);
        }
        return $ciudad;
    }

    public static function update($res, $id)
    {
        $conn = new BaseDatos();
        $result = $conn->update(CIUDADES, $res, $id);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error a modificar la ciudad ' . $id;
            cargarLog(null, null, $error, get_class(), __FUNCTION__);
        }
        return $result;
    }
}
