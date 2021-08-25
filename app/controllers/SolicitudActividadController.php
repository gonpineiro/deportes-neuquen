<?php

class SolicitudActividadController
{
    /* Guarda un solicitud_actividad */
    public function store($res)
    {
        $solicitud_actividad = new SolicitudActividad();
        $solicitud_actividad->set(...array_values($res));
        return $solicitud_actividad->save();
    }

    /* Busca todos los solicitud_actividad */
    public static function index($param = [], $ops = [])
    {
        return SolicitudActividad::list($param, $ops);
    }

    /* Busca un solicitud_actividad */
    public static function get($params)
    {
        return SolicitudActividad::get($params);
    }

    /* Actualiza un solicitud_actividad */
    public static function update($res, $id, $column = 'id')
    {
        return SolicitudActividad::update($res, $id, $column);
    }

    public function getActividad($id)
    {
        $where = "WHERE id_solicitud = '$id' AND sol_act.deleted_at IS NULL";
        $conn = new BaseDatos();
        $query =  $conn->query($this->insertSqlQuery($where));
        $array = [];
        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Obtener las actividades';
            cargarLog(null, $id, $error, get_class(), __FUNCTION__);
        }
        while ($row = odbc_fetch_array($query)) array_push($array, $row);
        return $array;
    }

    private function insertSqlQuery($where)
    {
        $sql =
            "SELECT 
            act.nombre
            FROM deportes_solicitudes_actividades sol_act
            LEFT JOIN dbo.deportes_actividades act ON act.id = sol_act.id_actividad 
            $where";

        return $sql;
    }
}
