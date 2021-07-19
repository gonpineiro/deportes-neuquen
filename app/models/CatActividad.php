<?php
/**
 * This is the model class for table "CATEGORIAS_ACTIVIDADES".
 *
 * @property string $nombre
 * 
 */
class CatActividad
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
        $result = $conn->store(CATEGORIAS_ACTIVIDADES, $array);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error al guardar una categoria de actividad';
            $log = new Log();
            $log->set($this->nombre, null, null, $error, get_class(), 'save');
            $log->save();
        }
        return $result;
    }

    public static function list($param = [], $ops = [])
    {
        $conn = new BaseDatos();
        $result = $conn->search(CATEGORIAS_ACTIVIDADES, $param, $ops);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error al listar las categorias de actividades';
            $log = new Log();
            $log->set(null, null, null, $error, get_class(), 'list');
            $log->save();
        }
        return $result;
    }

    public static function get($params)
    {
        $conn = new BaseDatos();
        $result = $conn->search(CATEGORIAS_ACTIVIDADES, $params);
        $actividad = $conn->fetch_assoc($result);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error a obtener la categoria de actividad: ' . $params[0];
            $log = new Log();
            $log->set(null, null, null, $error, get_class(), 'get');
            $log->save();
        }
        return $actividad;
    }

    public static function update($res, $id)
    {
        $conn = new BaseDatos();
        $result = $conn->update(CATEGORIAS_ACTIVIDADES, $res, $id);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error a modificar la categoria de actividad';
            $log = new Log();
            $log->set(null,  $id, null, $error, get_class(), 'update');
            $log->save();
        }
        return $result;
    }
}
