<?php

class TituloController
{
    /* Guarda un titulo */
    public function store($res)
    {
        $titulo = new Titulo();
        $titulo->set(...array_values($res));
        return $titulo->save();
    }

    /* Busca todos los titulo */
    public static function index($param = [], $ops = [])
    {
        return Titulo::list($param, $ops);
    }

    /* Busca un titulo */
    public static function get($params)
    {
        return Titulo::get($params);
    }

    /* Actualiza un titulo */
    public static function update($res, $id)
    {
        return Titulo::update($res, $id);
    }
}
