<?php

class BarrioController
{
    /* Guarda un barrio */
    public function store($res)
    {
        $barrio = new Barrio();
        $barrio->set(...array_values($res));
        return $barrio->save();
    }

    /* Busca todos los barrio */
    public static function index($param = [], $ops = [])
    {
        return Barrio::list($param, $ops);
    }
    /* Busca todos los barrio */
    public static function indexOrderBy($param = [], $ops = [])
    {
        return Barrio::listOrderBy($param, $ops, "nombre", "ASC");
    }
    /* Busca un barrio */
    public static function get($params)
    {
        return Barrio::get($params);
    }

    /* Actualiza un barrio */
    public static function update($res, $id)
    {
        return Barrio::update($res, $id);
    }
}
