<?php

class UsuarioController
{
    /* Guarda un usuario */
    public function store($res)
    {
        $usuario = new Usuario();
        $usuario->set(...array_values($res));
        $usuario->save();
    }

    /* Busca todos los usuarios */
    static public function index($param = [], $ops = [])
    {
        return Usuario::list($param, $ops);
    }

    /* Busca un usuario */
    static public function get($params)
    {
        return Usuario::get($params);
    }

    /* Actualiza un usuario */
    static public function update($res, $id)
    {
        return Usuario::update($res, $id);
    }

    public function getSolicitud($id)
    {
        /* Esto se debe cambiar */
        $sql = "SELECT
        TOP 1
        usu.id_wappersonas, 
        sol.id as id_solicitud,
        sol.fecha_alta,
        sol.id_estado,
        sol.fecha_vencimiento,
        sol.fecha_evaluacion
        FROM dbo.deportes_usuarios usu 
        LEFT JOIN dbo.deportes_solicitudes sol ON usu.id = sol.id_usuario
        WHERE id_wappersonas = $id ORDER BY sol.fecha_alta DESC ";

        $conn = new BaseDatos();
        $query =  $conn->query($sql);
        return odbc_fetch_array($query);
    }
}
