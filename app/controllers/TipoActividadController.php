<?php

class TipoActividadController
{
    /* Guarda un tipo_actividad */
    public function store($res)
    {
        $tipo_actividad = new TipoActividad();
        $tipo_actividad->set(...array_values($res));
        return $tipo_actividad->save();
    }

    /* Busca todos los tipo_actividad */
    public static function index($param = [], $ops = [])
    {
        return TipoActividad::list($param, $ops);
    }

    /* Busca un tipo_actividad */
    public static function get($params)
    {
        return TipoActividad::get($params);
    }

    /* Actualiza un tipo_actividad */
    public static function update($res, $id)
    {
        return TipoActividad::update($res, $id);
    }
}
