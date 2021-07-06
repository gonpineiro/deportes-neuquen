<?php

class ProfesionController
{
    /* Guarda un profesion */
    public function store($res)
    {
        $profesion = new Profesion();
        $profesion->set(...array_values($res));
        return $profesion->save();
    }

    /* Busca todos los profesion */
    public static function index($param = [], $ops = [])
    {
        return Profesion::list($param, $ops);
    }

    /* Busca un profesion */
    public static function get($params)
    {
        return Profesion::get($params);
    }

    /* Actualiza un profesion */
    public static function update($res, $id)
    {
        return Profesion::update($res, $id);
    }
}
