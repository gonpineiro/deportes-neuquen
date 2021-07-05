<?php

/**
 * This is the model class for table "Solicitud".
 *
 * @property int $id_usuario
 * @property int $id_usuario_admin
 * @property int $id_estado
 * @property string $profesion
 * @property string $modified_at
 * @property string $deleted_at
 * 
 */
class Solicitud
{
    public $id_usuario;
    public $id_usuario_admin;
    public $id_estado;
    public $profesion;
    public $modified_at;
    public $deleted_at;

    public function __construct()
    {
        $this->id_usuario = "";
        $this->id_usuario_admin = "";
        $this->id_estado = "";
        $this->profesion = "";
        $this->modified_at = "";
        $this->deleted_at = "";
    }

    public function set($id_usuario = null, $id_usuario_admin = null, $id_estado = null, $profesion = null, $modified_at = null, $deleted_at = null)
    {
        $this->id_usuario = $id_usuario;
        $this->id_usuario_admin = $id_usuario_admin;
        $this->id_estado = $id_estado;
        $this->profesion = $profesion;
        $this->modified_at = $modified_at;
        $this->deleted_at = $deleted_at;
    }

    public function save()
    {
        $array = json_decode(json_encode($this), true);
        $conn = new BaseDatos();
        $result = $conn->store(SOLICITUDES, $array);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error al guardar una solicitud';
            $log = new Log();
            $log->set($this->id_usuario, null, null, $error, get_class(), 'save');
            $log->save();
        }
        return $result;
    }

    public static function list($param = [], $ops = [])
    {
        $conn = new BaseDatos();
        $solicitud = $conn->search(SOLICITUDES, $param, $ops);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error al listar las solicitudes';
            $log = new Log();
            $log->set(null, null, null, $error, get_class(), 'list');
            $log->save();
        }
        return $solicitud;
    }

    public static function get($params)
    {
        $conn = new BaseDatos();
        $result = $conn->search(SOLICITUDES, $params);
        $solicitud = $conn->fetch_assoc($result);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error a obtener la solicitud: ' . $params[0];
            $log = new Log();
            $log->set(null, null, null, $error, get_class(), 'get');
            $log->save();
        }
        return $solicitud;
    }

    public static function update($res, $id)
    {
        $conn = new BaseDatos();
        $result = $conn->update(SOLICITUDES, $res, $id);

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
