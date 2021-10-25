<?php

namespace App\Models;

use App\DBConnection;

class Mensaje{
    // Atributos de la clase.
    private $id;
    private $texto;
    private $chatId;
    private $usuarioId;



    // Contructor de la clase.
    public function __construct($id, $texto, $chatId, $usuarioId)
    {
        $this->id = $id;
        $this->texto = $texto;
        $this->chatId = $chatId;
        $this->usuarioId = $usuarioId;
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
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * @return mixed
     */
    public function getChatId()
    {
        return $this->chatId;
    }

    /**
     * @return mixed
     */
    public function getUsuarioId()
    {
        return $this->usuarioId;
    }


    // Busca un elemento en específico con el id.
    public static function findMensajes($idCurso){
        try{
            $list_mensajes = [];
            // realiza a conexión con la DB.
            $connection = DBConnection::createConnection();

            // Prepara la consulta a la base de datos.
            $sql = $connection->prepare("SELECT * FROM buscarmensajes(?)");

            // Se le indican los parámetros de la consulta.
            $sql->execute(array($idCurso));

            // Se crea un objeto formato Json
            // $mensaje = $sql->fetch();
            // var_dump($sql->fetchAll());
            foreach ($sql->fetchAll() as $mensaje){
                $list_mensajes[] = new Mensaje($mensaje["id"], $mensaje["texto"], $mensaje["chatId"], $mensaje["usuarioId"]);
            }
            // Crea un objeto y lo retorna al controlador.
            return $list_mensajes;

        }catch(\Exception $ex){

            // La base de datos envía la exception entre los símolos $ por lo que se realiza un explode para obtener el mensaje.
            $error = explode("$", $ex->getMessage());

            // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
            throw new \Exception($error[1]);
        }
    }

    // // Recibe los valores del nuevo elemento y los envía a la DB para agregarlo.
    public static function create($texto, $chatId, $usuarioId){
        try{
            // realiza a conexión con la DB.
            $connection = DBConnection::createConnection();

            // Prepara la consulta a la base de datos.
            $sql = $connection->prepare("CALL insertarmensaje(?, ?, ?)");

            // Se le indican los parámetros de la consulta.
            $sql->execute(array($texto, $chatId, $usuarioId));

        }catch(\Exception $ex){

            // La base de datos envía la exception entre los símolos $ por lo que se realiza un explode para obtener el mensaje.
            $error = explode("$", $ex->getMessage());

            // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
            throw new \Exception($error[1]);
        }
    }

    // Solicita todos los elementos a la base de datos.
    // public static function findMensaje($cursoId){
    //     $list_mensajes = [];
    //     try{
    //         // realiza a conexión con la DB.
    //         $connection = DBConnection::createConnection();

    //         startSession();
    //         $user_id = $_SESSION['user_id'];

    //         if ($_SESSION['user'] == "administrador"){

    //             // Prepara la consulta a la base de datos.
    //             $sql = $connection->query('SELECT * FROM mensaje');

    //         }
    //         elseif ($_SESSION['user'] == "estudiante"){


    //             // Prepara la consulta a la base de datos.
    //             $sql = $connection->prepare('SELECT * FROM mensajesestudiante(?)');
    //             $sql->execute(array($user_id));
    //         }

    //         else{
    //             // Prepara la consulta a la base de datos.
    //             $sql = $connection->prepare('SELECT * FROM mensajesprofesor(?)');
    //             $sql->execute(array($user_id));
    //         }

    //         foreach ($sql->fetchAll() as $mensaje){
    //             $list_mensajes[] = new Mensaje($mensaje["id"], $mensaje["titulo"], $mensaje["descripcion"], $mensaje["cursoid"], $mensaje["fecha"]);
    //         }

    //         return $list_mensajes;

    //     }catch(\Exception $ex){

    //         $error = "Ha surgido un error al cargar los datos, vuelva a intentarlo.";

    //         // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
    //         throw new \Exception($error);
    //     }
    // }

    // // Recibe el id del elemento a eliminar y procede a ejecutar el stored procedure.
    // public static function delete($id){
    //     try{
    //         // realiza a conexión con la DB.
    //         $connection = DBConnection::createConnection();
    //         echo $id;
    //         // Prepara la consulta a la base de datos.
    //         $sql = $connection->prepare("CALL eliminarmensaje(?)");

    //         // Se le indican los parámetros de la consulta.
    //         $sql->execute(array($id));

    //     }catch(\Exception $ex){

    //         //En caso de surgir algún problema, captura el error dado por la base de datos (en caso de ser ahí el problema).

    //         // La base de datos envía la exception entre los símolos $ por lo que se realiza un explode para obtener el mensaje.
    //         $error = explode("$", $ex->getMessage());

    //         // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
    //         throw new \Exception($error[1]);
    //     }
    // }



    // // Recibe los nuevos valores de un elemento para enviarlos a la Db y actualizarlos.
    // public static function update($id, $codigo, $nombre, $gradoId, $diaSemama, $horaInicio,  $horaFin){
    //     try{
    //         // realiza a conexión con la DB.
    //         $connection = DBConnection::createConnection();

    //         // Prepara la consulta a la base de datos.
    //         $sql = $connection->prepare("CALL actualizarmensaje(?, ?, ?, ?, ?, ?, ?)");

    //         // Se le indican los parámetros de la consulta.
    //         $sql->execute(array($id, $codigo, $nombre, $gradoId, $diaSemama, $horaInicio,  $horaFin));

    //     }catch(\Exception $ex){

    //         //En caso de surgir algún problema, captura el error dado por la base de datos (en caso de ser ahí el problema).

    //         // La base de datos envía la exception entre los símolos $ por lo que se realiza un explode para obtener el mensaje.
    //         $error = explode("$", $ex->getMessage());

    //         // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
    //         throw new \Exception($error[1]);
    //     }
    // }

}

?>
