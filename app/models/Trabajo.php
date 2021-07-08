<?php
/**
 * This is the model class for table "Trabajo".
 *
 * @property int $id_solicitud
 * @property string $lugar
 * @property string $path_file
 * 
 */
class Trabajo
{
    public $id_solicitud;
    public $lugar;
    public $path_file;

    public function __construct()
    {
        $this->id_solicitud = "";
        $this->lugar = "";
        $this->path_file = "";
    }

    public function set($id_solicitud = null, $lugar = null, $path_file = null)
    {
        $this->id_solicitud = $id_solicitud;
        $this->lugar = $lugar;
        $this->path_file = $path_file;
    }

    public function save()
    {
        $array = json_decode(json_encode($this), true);
        $conn = new BaseDatos();
        $result = $conn->store(TRABAJOS, $array);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error al guardar un trabajo';
            $log = new Log();
            $log->set($this->id_solicitud, null, null, $error, get_class(), 'save');
            $log->save();
        }
        return $result;
    }

    public static function list($param = [], $ops = [])
    {
        $conn = new BaseDatos();
        $trabajo = $conn->search(TRABAJOS, $param, $ops);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error al listar las trabajos';
            $log = new Log();
            $log->set(null, null, null, $error, get_class(), 'list');
            $log->save();
        }
        return $trabajo;
    }

    public static function get($params)
    {
        $conn = new BaseDatos();
        $result = $conn->search(TRABAJOS, $params);
        $trabajo = $conn->fetch_assoc($result);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error a obtener el trabajo: ' . $params[0];
            $log = new Log();
            $log->set(null, null, null, $error, get_class(), 'get');
            $log->save();
        }
        return $trabajo;
    }

    public static function update($res, $id)
    {
        $conn = new BaseDatos();
        $result = $conn->update(TRABAJOS, $res, $id);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error a modificar la solicitud';
            $log = new Log();
            $log->set(null,  $id, null, $error, get_class(), 'update');
            $log->save();
        }
        return $result;
    }
}
