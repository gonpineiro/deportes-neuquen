<?php

class ActividadController
{
    /* Guarda un actividad */
    public function store($res)
    {
        $actividad = new Actividad();
        $actividad->set(...array_values($res));
        return $actividad->save();
    }

    /* Busca todos los actividad */
    public static function index($param = [], $ops = [])
    {
        return Actividad::list($param, $ops);
    }

    /* Busca un actividad */
    public static function get($params)
    {
        return Actividad::get($params);
    }

    /* Actualiza un actividad */
    public static function update($res, $id)
    {
        return Actividad::update($res, $id);
    }
}
