<?php

/**
 * This is the model class for table "Trabajo".
 *
 * @property int $id_solicitud
 * @property int $id_usuario
 * @property string $lugar
 * @property string $estado
 * @property string $path_file
 * @property string $deleted_at
 * 
 */
class Trabajo
{
    public $id_solicitud;
    public $id_usuario;
    public $lugar;
    public $estado;
    public $path_file;
    public $deleted_at;

    public function __construct()
    {
        $this->id_solicitud = "";
        $this->id_usuario = "";
        $this->lugar = "";
        $this->estado = "";
        $this->path_file = "";
        $this->deleted_at = "";
    }

    public function set($id_solicitud = null, $id_usuario = null, $lugar = null, $estado = null, $path_file = null, $deleted_at = null)
    {
        $this->id_solicitud = $id_solicitud;
        $this->id_usuario = $id_usuario;
        $this->lugar = $lugar;
        $this->estado = $estado;
        $this->path_file = $path_file;
        $this->deleted_at = $deleted_at;
    }

    public function save()
    {
        $array = json_decode(json_encode($this), true);
        $conn = new BaseDatos();
        $result = $conn->store(TRABAJOS, $array);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error al guardar un trabajo';
            cargarLog($this->id_usuario, $this->id_solicitud, $error, get_class(), __FUNCTION__);
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
            cargarLog(null, null, $error, get_class(), __FUNCTION__);
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
            cargarLog(null, null, $error, get_class(), __FUNCTION__);
        }
        return $trabajo;
    }

    public static function update($res, $id)
    {
        $conn = new BaseDatos();
        $result = $conn->update(TRABAJOS, $res, $id);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error a modificar el trabajo ' . $id;
            cargarLog(null, null, $error, get_class(), __FUNCTION__);
        }
        return $result;
    }
}
