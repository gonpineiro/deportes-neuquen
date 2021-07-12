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
        $result = $conn->store(BARRIOS, $array);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error al guardar un barrio';
            $log = new Log();
            $log->set($this->nombre, null, null, $error, get_class(), 'save');
            $log->save();
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
            $log = new Log();
            $log->set(null, null, null, $error, get_class(), 'list');
            $log->save();
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
            $log = new Log();
            $log->set(null, null, null, $error, get_class(), 'get');
            $log->save();
        }
        return $barrio;
    }

    public static function update($res, $id)
    {
        $conn = new BaseDatos();
        $result = $conn->update(BARRIOS, $res, $id);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error a modificar el barrio';
            $log = new Log();
            $log->set(null,  $id, null, $error, get_class(), 'update');
            $log->save();
        }
        return $result;
    }
}
