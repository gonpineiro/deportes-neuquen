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
            $error =  $conn->getError() . ' | Obtener una solicitud por estado';
            cargarLog(null, null, $error, get_class(), __FUNCTION__);
        }
        while ($row = odbc_fetch_array($query)) {
            $row = utf8_converter($row, false);

            $nombreApellido = explode(",", $row['nombre_te']);

            $row['nombre'] = $nombreApellido[1];
            $row['apellido'] = $nombreApellido[0];
            $row['fecha_alta'] = formatDate($row['fecha_alta']);
            $row['fecha_evaluacion'] = !is_null($row['fecha_evaluacion']) ? formatDate($row['fecha_evaluacion']) : null;

            unset($row['nombre_te']);
            array_push($array, $row);
        };

        return $array;
    }

    public function getAllData($id)
    {
        $solicitud = $this->getSolicitudesWhereID($id);

        $nombreApellido = explode(",", $solicitud['nombre_te']);
        $solicitud['nombre_te'] = $nombreApellido[0] . $nombreApellido[1];
        $solicitud['ciudad'] = is_null($solicitud['ciudad']) ? $solicitud['otra_ciudad'] : $solicitud['ciudad'];
        $solicitud['foto'] = getImageByRenaper($solicitud['genero'], $solicitud['dni'], false)['imagen'];

        /* Agregar los titulos */
        $solicitud['titulo']['actual'] = [];
        $solicitud['titulo']['viejos'] = [];
        $tituloController = new TituloController();

        /* Titulos Nuevos */
        $titulo = $tituloController->index(['id_solicitud' => $id, 'estado' => "'Nuevo'"]);
        while ($row = odbc_fetch_array($titulo)) array_push($solicitud['titulo']['actual'], $row);

        /* Titulos Aprobados de la solicitud actual */
        $titulo = $tituloController->index(['id_solicitud' => $id, 'estado' => "'Aprobado'"]);
        while ($row = odbc_fetch_array($titulo)) array_push($solicitud['titulo']['actual'], $row);

        /* Titulos Aprobados de solicitudes antiguas/aprobadas */
        $titulo = $tituloController->index(['id_usuario' => $solicitud['usu_id'], 'estado' => "'Aprobado'"]);
        while ($row = odbc_fetch_array($titulo)) array_push($solicitud['titulo']['viejos'], $row);

        $solicitud['titulo']['viejos'] = array_filter($solicitud['titulo']['viejos'], function ($data) {
            global $id;
            return $data['estado'] == 'Aprobado' && $data['id_solicitud'] == $id;
        });

        /* Titulos Rechazado de la solicitud actual */
        $titulo = $tituloController->index(['id_solicitud' => $id, 'estado' => "'Rechazado'"]);
        while ($row = odbc_fetch_array($titulo)) array_push($solicitud['titulo']['actual'], $row);

        /* Agregar los Trabajos */
        $trabajoController = new TrabajoController();
        $solicitud['trabajo']['actual'] = [];
        $solicitud['trabajo']['viejos'] = [];

        /* Trabajos Nuevos */
        $trabajo = $trabajoController->index(['id_solicitud' => $id, 'estado' => "'Nuevo'"]);
        while ($row = odbc_fetch_array($trabajo)) array_push($solicitud['trabajo']['actual'], $row);
        
        /* Trabajos Aprobado de la solicitud actual */
        $trabajo = $trabajoController->index(['id_solicitud' => $id, 'estado' => "'Aprobado'"]);
        while ($row = odbc_fetch_array($trabajo)) array_push($solicitud['trabajo']['actual'], $row);

        /* Trabajos Aprobados de solicitudes antiguas/aprobadas */
        $trabajo = $tituloController->index(['id_usuario' => $solicitud['usu_id'], 'estado' => "'Aprobado'"]);
        while ($row = odbc_fetch_array($trabajo)) array_push($solicitud['trabajo']['viejos'], $row);

        $solicitud['trabajo']['viejos'] = array_filter($solicitud['trabajo']['viejos'], function ($data) {
            global $id;
            return $data['estado'] == 'Aprobado' && $data['id_solicitud'] == $id;
        });

        /* Trabajo Rechazado de la solicitud actual */
        $trabajo = $tituloController->index(['id_solicitud' => $id, 'estado' => "'Rechazado'"]);
        while ($row = odbc_fetch_array($trabajo)) array_push($solicitud['trabajo']['actual'], $row);

        /* Agregar las actividades */
        $solicitudesActividadesController = new SolicitudActividadController();
        $solicitud['actividades'] = $solicitudesActividadesController->getActividad($id);

        return $solicitud;
    }

    /* Obtiene listado de solicitudes vinculado con el resto de las tablas, where estado */
    public function getSolicitudesWhereID($id)
    {
        $where = "WHERE sol.id = '$id'";
        $conn = new BaseDatos();
        $query =  $conn->query($this->insertSqlQuery($where));
        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Obtener una solicitud';
            cargarLog(null, $id, $error, get_class(), __FUNCTION__);
        }
        $solicitud = odbc_fetch_array($query);
        $solicitud = utf8_converter($solicitud, false);

        return $solicitud;
    }

    private function insertSqlQuery($where)
    {
        $sql =
            "SELECT 
            sol.id as id,
            wap_usr.nombre as nombre_te,
            wap_usr.documento as dni,
            wap_usr.genero as genero,
            usu.direccion_cp as cp,
            usu.id as usu_id,
            usu.direccion_calle as calle,
            usu.direccion_nro as nro_calle,
            usu.direccion_depto as depto,
            usu.direccion_piso as piso,
            usu.email as email,
            usu.telefono as telefono,
            usu.nacionalidad as nacionalidad,
            bar.nombre as barrio,
            usu_te.otro_barrio,   
            usu.otra_ciudad as otra_ciudad,         
            CASE
                WHEN bar.id IS NOT NULL      
                THEN (select nombre from deportes_ciudades dep_ciu where dep_ciu.id = bar.id_ciudad)          
                ELSE ciu.nombre    
            END as ciudad,
            ciu.nombre as ciudad_barrio,
            sol.path_ap as path_ap,
            sol.path_recibo as path_recibo,
            sol.nro_recibo as nro_recibo,
            sol.fecha_alta as fecha_alta,
            sol.fecha_evaluacion as fecha_evaluacion
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
            LEFT JOIN deportes_estados est ON est.id = sol.id_estado
            $where";

        return $sql;
    }
}
