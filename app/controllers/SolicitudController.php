<?php

class SolicitudController
{
    /* Guarda un solicitud */
    public function store($res)
    {
        $solicitud = new Solicitud();
        $solicitud->set(...array_values($res));
        return $solicitud->save();
    }

    /* Busca todos los solicitud */
    public static function index($param = [], $ops = [])
    {
        return Solicitud::list($param, $ops);
    }

    /* Busca un solicitud */
    public static function get($params)
    {
        return Solicitud::get($params);
    }

    /* Actualiza un solicitud */
    public static function update($res, $id)
    {
        return Solicitud::update($res, $id);
    }

    /* Obtiene listado de solicitudes vinculado con el resto de las tablas, where estado */
    public function getSolicitudesWhereEstado($estado)
    {
        $where = "WHERE est.nombre = '$estado' AND sol.deleted_at IS NULL";
        $conn = new BaseDatos();
        $array = [];
        $query =  $conn->query($this->insertSqlQuery($where));
        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Obtener una solicitud';
            $log = new Log();
            $log->set(null, null, null, $error, get_class(), 'getSolicitudesWhereEstado');
            $log->save();
        }
        while ($row = odbc_fetch_array($query)) array_push($array, $row);
        return $array;
    }

    private function insertSqlQuery($where)
    {
        $sql =
            "SELECT 
            sol.id as id,
            wap_usr.nombre as nombre_te,
            wap_adm.nombre as nombre_admin,
            bar.nombre as barrio,    
            CASE
                WHEN bar.id IS NOT NULL      
                THEN (select nombre from deportes_ciudades dep_ciu where dep_ciu.id = bar.id_ciudad)          
                ELSE ciu.nombre       
            END as ciudad,
            est.nombre as estado,
            sol.fecha_alta
            FROM deportes_solicitudes sol
            -- Obtenemos el usuario de wappersona
            LEFT OUTER JOIN (
                dbo.wappersonas as wap_usr
                LEFT JOIN deportes_usuarios usu_te ON wap_usr.ReferenciaID = usu_te.id_wappersonas
            ) ON sol.id_usuario = usu_te.id
            -- Obtenemos el admin de wappersona
            LEFT OUTER JOIN (
                dbo.wappersonas as wap_adm
                LEFT JOIN deportes_usuarios usu_adm ON wap_adm.ReferenciaID = usu_adm.id_wappersonas
            ) ON sol.id_usuario_admin = usu_adm.id
            -- Obtenemos el barrio
            LEFT OUTER JOIN (
                dbo.deportes_barrios as bar
                LEFT JOIN deportes_usuarios usu_bar ON bar.id = usu_bar.id_barrio
            ) ON sol.id_usuario = usu_bar.id 
            -- Obtenemos la ciudad    
            LEFT OUTER JOIN (
                dbo.deportes_ciudades as ciu
                LEFT JOIN deportes_usuarios usu_ciu ON ciu.id = usu_ciu.id_ciudad
            ) ON sol.id_usuario = usu_ciu.id 
            LEFT JOIN deportes_estados est ON est.id = sol.id_estado
            $where";

        return $sql;
    }
}
