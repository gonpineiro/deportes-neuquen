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

    public function getAllData($id)
    {
        $data = $this->getSolicitudesWhereID($id);

        $tituloController = new TituloController();
        $titulo = $tituloController->index(['id_solicitud' => $id]);
        $data['titulo'] = [];
        while ($row = odbc_fetch_array($titulo)) array_push($data['titulo'], $row);

        $trabajoController = new TrabajoController();
        $trabajo = $trabajoController->index(['id_solicitud' => $id]);
        $data['trabajo'] = [];
        while ($row = odbc_fetch_array($trabajo)) array_push($data['trabajo'], $row);

        $solicitudesActividadesController = new SolicitudActividadController();
        $data['actividades'] = $solicitudesActividadesController->getActividad($id);

        return $data;
    }

    /* Obtiene listado de solicitudes vinculado con el resto de las tablas, where estado */
    public function getSolicitudesWhereID($id)
    {
        $where = "WHERE sol.id = '$id'";
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
        return odbc_fetch_array($query);
    }

    private function insertSqlQuery($where)
    {
        $sql =
            "SELECT 
            sol.id as id,
            wap_usr.nombre as nombre_te,
            usu.direccion_cp as cp,
            usu.direccion_calle as calle,
            usu.direccion_nro as nro_calle,
            bar.nombre as barrio,
            usu_te.otro_barrio,
            ciu.nombre as ciudad_barrio,
            sol.path_ap as path_ap,
            sol.path_recibo as path_recibo,
            sol.nro_recibo as nro_recibo,
            CASE
                WHEN bar.id IS NOT NULL      
                THEN (select nombre from deportes_ciudades dep_ciu where dep_ciu.id = bar.id_ciudad)          
                ELSE ciu.nombre       
            END as ciudad
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
            LEFT JOIN deportes_usuarios usu ON usu.id = sol.id_usuario
            $where";

        return $sql;
    }
}
