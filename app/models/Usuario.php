<?php

/**
 * This is the model class for table "Usuarios".
 * @property int $id_wappersonas
 * @property string $nombre
 * @property string $apellido
 * @property string $telefono
 * @property int $dni
 * @property string $genero
 * @property string $email
 * @property string $nacionalidad 
 * @property string $id_ciudad
 * @property string $id_barrio
 * @property string $id_zona
 * @property string $direccion_calle
 * @property string $direccion_nro
 * @property string $direccion_depto
 * @property string $direccion_piso
 * @property string $direccion_cp
 */
class Usuario
{
    public $id_wappersonas;
    public $nombre;
    public $apellido;
    public $telefono;
    public $dni;
    public $genero;
    public $email;
    public $nacionalidad;
    public $id_ciudad;
    public $id_barrio;
    public $id_zona;
    public $direccion_calle;
    public $direccion_nro;
    public $direccion_depto;
    public $direccion_piso;
    public $direccion_cp;

    public function __construct()
    {
        $this->id_wappersonas = "";
        $this->nombre = "";
        $this->apellido = "";
        $this->telefono = "";
        $this->dni = "";
        $this->genero = "";
        $this->email = "";
        $this->nacionalidad = "";
        $this->id_ciudad = "";
        $this->id_barrio = "";
        $this->id_zona = "";
        $this->direccion_calle = "";
        $this->direccion_nro = "";
        $this->direccion_piso = "";
        $this->direccion_depto = "";
        $this->direccion_cp = "";
    }
    public function set($id_wappersonas = null, $nombre = null, $apellido = null, $telefono = null, $dni = null, $genero = null, $email = null, $nacionalidad = null, $id_ciudad = null, $id_barrio = null, $id_zona = null, $direccion_calle = null, $direccion_nro = null, $direccion_depto = null, $direccion_piso = null, $direccion_cp = null)
    {
        $this->id_wappersonas = $id_wappersonas;
        $this->nombre = substr($nombre, 0, LT_USU_NOMBRE);
        $this->apellido = substr($apellido, 0, LT_USU_APELLIDO);
        $this->telefono = substr($telefono, 0, LT_USU_TELEFONO);
        $this->dni = $dni;
        $this->genero = $genero;
        $this->email = substr($email, 0, LT_USU_EMAIL);
        $this->nacionalidad = $nacionalidad;
        $this->id_ciudad = $id_ciudad;
        $this->id_barrio = $id_barrio;
        $this->id_zona = $id_zona;
        $this->direccion_calle = $direccion_calle;
        $this->direccion_nro = $direccion_nro;
        $this->direccion_depto = $direccion_depto;
        $this->direccion_piso = $direccion_piso;
        $this->direccion_cp = $direccion_cp;
    }

    public function save()
    {
        $array = json_decode(json_encode($this), true);
        $conn = new BaseDatos();
        $result = $conn->store(USUARIOS, $array);
        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error al guardar un usuario';
            $log = new Log();
            $log->set($this->id_wappersonas, null, null, $error, get_class(), 'save');
            $log->save();
        }
        return $result;
    }

    public static function list($param = [], $ops = [])
    {
        $conn = new BaseDatos();
        $usuarios = $conn->search(USUARIOS, $param, $ops);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error al listar el usuario';
            $log = new Log();
            $log->set(null, null, null, $error, get_class(), 'list');
            $log->save();
        }
        return $usuarios;
    }

    public static function get($params)
    {
        $conn = new BaseDatos();
        $result = $conn->search(USUARIOS, $params);
        $usuario = $conn->fetch_assoc($result);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error a obtener la solicitud: ' . $params['id'];
            $log = new Log();
            $log->set(null, null, null, $error, get_class(), 'get');
            $log->save();
        }
        return $usuario;
    }

    public static function update($res, $id)
    {
        $conn = new BaseDatos();
        $result = $conn->update(USUARIOS, $res, $id);

        /* Guardamos los errores */
        if ($conn->getError()) {
            $error =  $conn->getError() . ' | Error a modificar el usuario';
            $log = new Log();
            $log->set(null,  $id, null, $error, get_class(), 'update');
            $log->save();
        }
        return $result;
    }
}
