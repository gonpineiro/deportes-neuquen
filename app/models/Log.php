<?php

/**
 * This is the model class for table "Logs".
 *
 * @property int $id_usuario
 * @property int $id_solicitud
 * @property int $error
 * @property int $class
 * @property int $metodo
 *
 */
class Log
{
    public $id_usuario;
    public $id_solicitud;
    public $error;
    public $class;
    public $metodo;

    public function __construct()
    {
        $this->id_usuario = "";
        $this->id_solicitud = "";
        $this->error = "";
        $this->class = "";
        $this->metodo = "";
    }

    public function set($id_usuario = null, $id_solicitud = null, $error = null, $class = null, $metodo = null)
    {
        $this->id_usuario = $id_usuario;
        $this->id_solicitud = $id_solicitud;
        $this->error = $error;
        $this->class = $class;
        $this->metodo = $metodo;
    }

    public function save()
    {
        $array = json_decode(json_encode($this), true);
        $conn = new BaseDatos();
        $conn->store(LOG, $array);
    }

    public static function list($param = [], $ops = [])
    {
        $conn = new BaseDatos();
        $logs = $conn->search(LOG, $param, $ops);
        return $logs;
    }

    public static function get($params)
    {
        $conn = new BaseDatos();
        $result = $conn->search(LOG, $params);
        $log = $conn->fetch_assoc($result);
        return $log;
    }
}
