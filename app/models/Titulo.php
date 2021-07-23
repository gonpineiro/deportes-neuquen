<?php

/**
 * This is the model class for table "Titulo".
 *
 * @property int $id_solicitud
 * @property int $id_usuario
 * @property string $titulo
 * @property string $estado
 * @property string $path_file
 * @property boolean $es_curso
 * @property string $deleted_at
 * 
 */
class Titulo
{
    public $id_solicitud;
    public $id_usuario;
    public $titulo;
    public $estado;
    public $path_file;
    public $es_curso;
    public $deleted_at;

    public function __construct()
    {
        $this->id_solicitud = "";
        $this->id_usuario = "";
        $this->titulo = "";
        $this->estado = "";
        $this->path_file = "";
        $this->es_curso = "";
        $this->deleted_at = "";
    }

    public function set($id_solicitud = null, $id_usuario = null, $titulo = null, $estado = null, $path_file = null, $es_curso = null, $deleted_at = null)
    {
        $this->id_solicitud = $id_solicitud;
        $this->id_usuario = $id_usuario;
        $this->titulo = $titulo;
        $this->estado = $estado;
        $this->path_file = $path_file;
        $this->es_curso = $es_curso;
        $this->deleted_at = $deleted_at;
    }

    public function save()
    {
        $array = json_decode(json_encode($this), true);
        $conn = new BaseDatos();
        $result = $conn->store(TITULOS, $array);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error al guardar un titulo';
            cargarLog($this->id_usuario, $this->id_solicitud, $error, get_class(), __FUNCTION__);
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
            cargarLog(null, null, $error, get_class(), __FUNCTION__);
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
            cargarLog(null, null, $error, get_class(), __FUNCTION__);
        }
        return $titulo;
    }

    public static function update($res, $id)
    {
        $conn = new BaseDatos();
        $result = $conn->update(TITULOS, $res, $id);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error a modificar el titulo ' . $id;
            cargarLog(null, null, $error, get_class(), __FUNCTION__);
        }
        return $result;
    }
}
