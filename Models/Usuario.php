<?php

namespace App\Models;

use App\DBConnection;

class Usuario{
    // Atributos de la clase.
    private $id;
    private $nombre;
    private $apellido;
    private $segundoApellido;
    private $password;
    private $cedula;
    private $correo;
    private $rol_id;

    // Contructor de la clase.
    public function __construct($id, $nombre, $apellido, $segundoApellido, $password, $cedula, $correo, $rol_id)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->segundoApellido = $segundoApellido;
        $this->password = $password;
        $this->cedula = $cedula;
        $this->correo = $correo;
        $this->rol_id = $rol_id;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @return mixed
     */
    public function getSegundoApellido()
    {
        return $this->segundoApellido;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * @return mixed
     */
    public function getRolId()
    {
        return $this->rol_id;
    }

}