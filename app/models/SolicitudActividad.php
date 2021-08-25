<?php

/**
 * This is the model class for table "solicitudes_actividades".
 *
 * @property int $id_solicitud
 * @property int $id_actividad
 * @property string $deleted_at
 * 
 */
class SolicitudActividad
{
    public $id_solicitud;
    public $id_actividad;
    public $deleted_at;

    public function __construct()
    {
        $this->id_solicitud = "";
        $this->id_actividad = "";
        $this->deleted_at = "";
    }

    public function set($id_solicitud = null, $id_actividad = null, $deleted_at = null)
    {
        $this->id_solicitud = $id_solicitud;
        $this->id_actividad = $id_actividad;
        $this->deleted_at = $deleted_at;
    }

    public function save()
    {
        $array = json_decode(json_encode($this), true);
        $conn = new BaseDatos();
        $result = $conn->store(SOLICITUDES_ACTIVIDADES, $array);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error al guardar solicitud_actividad';
            cargarLog(null, null, $error, get_class(), __FUNCTION__);
        }
        return $result;
    }

    public static function list($param = [], $ops = [])
    {
        $conn = new BaseDatos();
        $result = $conn->search(SOLICITUDES_ACTIVIDADES, $param, $ops);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error al listar las solicitud_actividad';
            cargarLog(null, null, $error, get_class(), __FUNCTION__);
        }
        return $result;
    }

    public static function get($params)
    {
        $conn = new BaseDatos();
        $result = $conn->search(SOLICITUDES_ACTIVIDADES, $params);
        $solicitud_actividad = $conn->fetch_assoc($result);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error a obtener la solicitud_actividad: ' . $params[0];
            cargarLog(null, null, $error, get_class(), __FUNCTION__);
        }
        return $solicitud_actividad;
    }

    public static function update($res, $id, $column = 'id')
    {
        $conn = new BaseDatos();
        $result = $conn->update(SOLICITUDES_ACTIVIDADES, $res, $id, $column);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error a modificar la solicitud_actividad ' . $id;
            cargarLog(null, null, $error, get_class(), __FUNCTION__);
        }
        return $result;
    }
}
