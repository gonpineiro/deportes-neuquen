<?php

class EstadoController
{
    /* Guarda un estado */
    public function store($res)
    {
        $estado = new Estado();
        $estado->set(...array_values($res));
        return $estado->save();
    }

    /* Busca todos los estado */
    public static function index($param = [], $ops = [])
    {
        return Estado::list($param, $ops);
    }

    /* Busca un estado */
    public static function get($params)
    {
        return Estado::get($params);
    }

    /* Actualiza un estado */
    public static function update($res, $id)
    {
        return Estado::update($res, $id);
    }
}
