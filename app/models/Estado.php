<?php
/**
 * This is the model class for table "Estados".
 *
 * @property string $nombre
 * 
 */
class Estado
{
    public $nombre;

    public function __construct()
    {
        $this->nombre = "";
    }

    public function set($nombre = null)
    {
        $this->nombre = $nombre;
    }

    public function save()
    {
        $array = json_decode(json_encode($this), true);
        $conn = new BaseDatos();
        $result = $conn->store(ESTADOS, $array);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error al guardar un estado';
            $log = new Log();
            $log->set($this->nombre, null, null, $error, get_class(), 'save');
            $log->save();
        }
        return $result;
    }

    public static function list($param = [], $ops = [])
    {
        $conn = new BaseDatos();
        $result = $conn->search(ESTADOS, $param, $ops);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error al listar los estados';
            $log = new Log();
            $log->set(null, null, null, $error, get_class(), 'list');
            $log->save();
        }
        return $result;
    }

    public static function get($params)
    {
        $conn = new BaseDatos();
        $result = $conn->search(ESTADOS, $params);
        $estado = $conn->fetch_assoc($result);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error a obtener el estado: ' . $params[0];
            $log = new Log();
            $log->set(null, null, null, $error, get_class(), 'get');
            $log->save();
        }
        return $estado;
    }

    public static function update($res, $id)
    {
        $conn = new BaseDatos();
        $result = $conn->update(ESTADOS, $res, $id);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error a modificar el estado';
            $log = new Log();
            $log->set(null,  $id, null, $error, get_class(), 'update');
            $log->save();
        }
        return $result;
    }
}
