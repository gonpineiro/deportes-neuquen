<?php
/**
 * This is the model class for table "tipo_actividades".
 *
 * @property int $id_categoria
 * @property string $nombre
 * 
 */
class TipoActividad
{
    public $id_categoria;
    public $nombre;

    public function __construct()
    {
        $this->id_categoria = "";
        $this->nombre = "";
    }

    public function set($id_categoria = null, $nombre = null)
    {
        $this->id_categoria = $id_categoria;
        $this->nombre = $nombre;
    }

    public function save()
    {
        $array = json_decode(json_encode($this), true);
        $conn = new BaseDatos();
        $result = $conn->store(TIPO_ACTIVIDADES, $array);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error al guardar el tipo de actividad';
            $log = new Log();
            $log->set($this->nombre, null, null, $error, get_class(), 'save');
            $log->save();
        }
        return $result;
    }

    public static function list($param = [], $ops = [])
    {
        $conn = new BaseDatos();
        $result = $conn->search(TIPO_ACTIVIDADES, $param, $ops);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error al listar el tipo de actividads';
            $log = new Log();
            $log->set(null, null, null, $error, get_class(), 'list');
            $log->save();
        }
        return $result;
    }

    public static function get($params)
    {
        $conn = new BaseDatos();
        $result = $conn->search(TIPO_ACTIVIDADES, $params);
        $tipo_actividad = $conn->fetch_assoc($result);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error a obtener el tipo de actividad: ' . $params[0];
            $log = new Log();
            $log->set(null, null, null, $error, get_class(), 'get');
            $log->save();
        }
        return $tipo_actividad;
    }

    public static function update($res, $id)
    {
        $conn = new BaseDatos();
        $result = $conn->update(TIPO_ACTIVIDADES, $res, $id);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error a modificar el tipo de actividad';
            $log = new Log();
            $log->set(null,  $id, null, $error, get_class(), 'update');
            $log->save();
        }
        return $result;
    }
}
