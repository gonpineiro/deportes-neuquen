<?php
/**
 * This is the model class for table "Titulo".
 *
 * @property int $id_solicitud
 * @property string $titulo
 * @property string $foto_titulo
 * 
 */
class Titulo
{
    public $id_solicitud;
    public $titulo;
    public $foto_titulo;

    public function __construct()
    {
        $this->id_solicitud = "";
        $this->titulo = "";
        $this->foto_titulo = "";
    }

    public function set($id_solicitud = null, $titulo = null, $foto_titulo = null)
    {
        $this->id_solicitud = $id_solicitud;
        $this->titulo = $titulo;
        $this->foto_titulo = $foto_titulo;
    }

    public function save()
    {
        $array = json_decode(json_encode($this), true);
        $conn = new BaseDatos();
        $result = $conn->store(TITULOS, $array);

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
        $result = $conn->search(TITULOS, $param, $ops);

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
        $result = $conn->search(TITULOS, $params);
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
        $result = $conn->update(TITULOS, $res, $id);

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
