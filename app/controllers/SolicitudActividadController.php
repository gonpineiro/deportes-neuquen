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
    public static function update($res, $id)
    {
        return SolicitudActividad::update($res, $id);
    }
}
