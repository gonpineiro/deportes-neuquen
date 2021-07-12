<?php

class CatActividadController
{
    /* Guarda un cat_actividad */
    public function store($res)
    {
        $cat_actividad = new CatActividad();
        $cat_actividad->set(...array_values($res));
        return $cat_actividad->save();
    }

    /* Busca todos los cat_actividad */
    public static function index($param = [], $ops = [])
    {
        return CatActividad::list($param, $ops);
    }

    /* Busca un cat_actividad */
    public static function get($params)
    {
        return CatActividad::get($params);
    }

    /* Actualiza un cat_actividad */
    public static function update($res, $id)
    {
        return CatActividad::update($res, $id);
    }
}
