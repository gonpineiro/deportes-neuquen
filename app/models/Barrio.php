<?php

/**
 * This is the model class for table "Barrios".
 *
 * @property int $id_ciudad
 * @property string $nombre
 * 
 */
class Barrio
{
    public $id_ciudad;
    public $nombre;

    public function __construct()
    {
        $this->id_ciudad = "";
        $this->nombre = "";
    }

    public function set($id_ciudad = null, $nombre = null)
    {
        $this->id_ciudad = $id_ciudad;
        $this->nombre = $nombre;
    }

    public function save()
    {
        $array = json_decode(json_encode($this), true);
        $conn = new BaseDatos();
        $result = $conn->store(BARRIOS, $array);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error al guardar un barrio';
            cargarLog(null, null, $error, get_class(), __FUNCTION__);
        }
        return $result;
    }

    public static function list($param = [], $ops = [])
    {
        $conn = new BaseDatos();
        $result = $conn->search(BARRIOS, $param, $ops);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error al listar los barrios';
            cargarLog(null, null, $error, get_class(), __FUNCTION__);
        }
        return $result;
    }
    public static function listOrderBy($param = [], $ops = [], $orderBy, $order)
    {
        $conn = new BaseDatos();
        $result = $conn->searchOrderBy(BARRIOS, $param, $ops, $orderBy, $order);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error al listar los barrios';
            cargarLog(null, null, $error, get_class(), __FUNCTION__);
        }
        return $result;
    }
    public static function get($params)
    {
        $conn = new BaseDatos();
        $result = $conn->search(BARRIOS, $params);
        $barrio = $conn->fetch_assoc($result);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error a obtener el barrio: ' . $params[0];
            cargarLog(null, null, $error, get_class(), __FUNCTION__);
        }
        return $barrio;
    }

    public static function update($res, $id)
    {
        $conn = new BaseDatos();
        $result = $conn->update(BARRIOS, $res, $id);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error a modificar el barrio ' . $id;
            cargarLog(null, null, $error, get_class(), __FUNCTION__);
        }
        return $result;
    }
}
