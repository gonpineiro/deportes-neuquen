<?php

class TrabajoController
{
    /* Guarda un trabajo */
    public function store($res)
    {
        $trabajo = new Trabajo();
        $trabajo->set(...array_values($res));
        return $trabajo->save();
    }

    /* Busca todos los trabajo */
    public static function index($param = [], $ops = [])
    {
        return Trabajo::list($param, $ops);
    }

    /* Busca un trabajo */
    public static function get($params)
    {
        return Trabajo::get($params);
    }

    /* Actualiza un trabajo */
    public static function update($res, $id)
    {
        return Trabajo::update($res, $id);
    }
}
