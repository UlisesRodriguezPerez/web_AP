<?php

namespace App\Models;

use App\DBConnection;
use Exception;

class Login{
    // Atributos de la clase.
    public $id;
    public $nombre;
    public $user_id;

    // Constructor de la clase.
    public function __construct($id, $nombre, $user_id)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->user_id = $user_id;
    }

    public static function findLogin($correo, $password){
        // try{
            // realiza a conexión con la DB.
            $connection = DBConnection::createConnection();

            // Prepara la consulta a la base de datos.
            $sql = $connection->prepare("SELECT * FROM login(?, ?)");


            // Se le indican los parámetros de la consulta.
            $sql->execute(array($correo, $password));

            // Se crea un objeto formato Json
            $role = $sql->fetch();
            if ($role == null){
                throw new Exception("\$El usuario y/o la contraseña son incorrectos.$");
            }

            // Retorna un nuevo objeto del elemento.
            return new Login($role['id'], $role['nombre'], $role['user_id']);
        // }catch(\Exception $ex){

        //     //En caso de surgir algún problema, captura el error dado por la base de datos (en caso de ser ahí el problema).

        //     // La base de datos envía la exception entre los símolos $ por lo que se realiza un explode para obtener el mensaje.
        //     $error = explode("$", $ex->getMessage());

        //     // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
        //     throw new \Exception($error[1]);
        // }
    }
}
?>