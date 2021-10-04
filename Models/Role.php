<?php

namespace App\Models;

use App\DBConnection;

class Role{
    // Atributos de la clase.
    public $id;
    public $name;

    // Constructor de la clase.
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    // Solicita todos los elementos a la DB para crearlos en objetos y enviarlos al controller.
    public static function allRole(){
        $list_roles = [];
        try{
            // realiza a conexión con la DB.
            $connection = DBConnection::createConnection();

            // Almacenamos los valores que devuelve la DB en la variable $sql
            $sql = $connection->query('SELECT * FROM mostrar_roles()');

            // Se usó este método ya que se comprobó que es más rápido que el de arriba.
            $list_roles = $sql->fetchAll(\PDO::FETCH_ASSOC);

            // Lista de objetos.
            return $list_roles;
        }catch(\Exception $ex){

            //En caso de surgir algún problema, captura el error dado por la base de datos (en caso de ser ahí el problema).

            // La base de datos envía la exception entre los símolos $ por lo que se realiza un explode para obtener el mensaje.
            $error = explode("$", $ex->getMessage());

            // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
            throw new \Exception($error[1]);
        }
    }

    // Busca un elemento en específico con el id y lo retorna al controller.
    public static function findRole($id){
        try{
            // realiza a conexión con la DB.
            $connection = DBConnection::createConnection();

            // Prepara la consulta a la base de datos.
            $sql = $connection->prepare("SELECT * FROM buscar_rol(?)");

            // Se le indican los parámetros de la consulta.
            $sql->execute(array($id));

            // Se crea un objeto formato Json
            $role = $sql->fetch();

            // Retorna un nuevo objeto del elemento.
            return new Role($role['id'], $role['name']);
        }catch(\Exception $ex){

            //En caso de surgir algún problema, captura el error dado por la base de datos (en caso de ser ahí el problema).

            // La base de datos envía la exception entre los símolos $ por lo que se realiza un explode para obtener el mensaje.
            $error = explode("$", $ex->getMessage());

            // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
            throw new \Exception($error[1]);
        }
    }
}
?>