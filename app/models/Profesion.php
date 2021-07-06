<?php
/**
 * This is the model class for table "Profesion".
 *
 * @property int $id_solicitud
 * @property string $nombre
 * 
 */
class Profesion
{
    public $id_solicitud;
    public $nombre;

    public function __construct()
    {
        $this->id_solicitud = "";
        $this->nombre = "";
    }

    public function set($id_solicitud = null, $nombre = null)
    {
        $this->id_solicitud = $id_solicitud;
        $this->nombre = $nombre;
    }

    public function save()
    {
        $array = json_decode(json_encode($this), true);
        $conn = new BaseDatos();
        $result = $conn->store(PROFESIONES, $array);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error al guardar un titulo';
            $log = new Log();
            $log->set($this->id_solicitud, null, null, $error, get_class(), 'save');
            $log->save();
        }
        return $result;
    }

    public static function list($param = [], $ops = [])
    {
        $conn = new BaseDatos();
        $result = $conn->search(PROFESIONES, $param, $ops);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error al listar las titulos';
            $log = new Log();
            $log->set(null, null, null, $error, get_class(), 'list');
            $log->save();
        }
        return $result;
    }

    public static function get($params)
    {
        $conn = new BaseDatos();
        $result = $conn->search(PROFESIONES, $params);
        $titulo = $conn->fetch_assoc($result);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error a obtener el titulo: ' . $params[0];
            $log = new Log();
            $log->set(null, null, null, $error, get_class(), 'get');
            $log->save();
        }
        return $titulo;
    }

    public static function update($res, $id)
    {
        $conn = new BaseDatos();
        $result = $conn->update(PROFESIONES, $res, $id);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error a modificar el titulo';
            $log = new Log();
            $log->set(null,  $id, null, $error, get_class(), 'update');
            $log->save();
        }
        return $result;
    }
}
