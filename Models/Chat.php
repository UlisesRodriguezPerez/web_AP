<?php

namespace App\Models;

use App\DBConnection;

class Chat{
    // Atributos de la clase.
    private $id;
    private $titulo;
    private $descripcion;
    private $cursoId;
    private $fecha;



    // Contructor de la clase.
    public function __construct($id, $titulo, $descripcion, $cursoId, $fecha)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->cursoId = $cursoId;
        $this->fecha = $fecha;
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
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @return mixed
     */
    public function getCursoId()
    {
        return $this->cursoId;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    // Busca un elemento en específico con el id.
    public static function findChat($idCurso){
        try{
            $list_chats = [];
            // realiza a conexión con la DB.
            $connection = DBConnection::createConnection();

            // Prepara la consulta a la base de datos.
            $sql = $connection->prepare("SELECT * FROM buscarchats(?)");

            // Se le indican los parámetros de la consulta.
            $sql->execute(array($idCurso));

            // Se crea un objeto formato Json
            // $chat = $sql->fetch();

            foreach ($sql->fetchAll() as $chat){
                $list_chats[] = new Chat($chat["id"], $chat["titulo"], $chat["descripcion"], $chat["cursoid"], $chat["fecha"]);
            }
            // Crea un objeto y lo retorna al controlador.
            return $list_chats;

        }catch(\Exception $ex){

            // La base de datos envía la exception entre los símolos $ por lo que se realiza un explode para obtener el mensaje.
            $error = explode("$", $ex->getMessage());

            // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
            throw new \Exception($error[1]);
        }
    }

    // // Recibe los valores del nuevo elemento y los envía a la DB para agregarlo.
    public static function create($titulo, $descripcion, $cursoId, $fecha){
        try{
            // realiza a conexión con la DB.
            $connection = DBConnection::createConnection();

            // Prepara la consulta a la base de datos.
            $sql = $connection->prepare("CALL insertarchat(?, ?, ?, ?)");

            // Se le indican los parámetros de la consulta.
            $sql->execute(array($titulo, $descripcion, $cursoId, $fecha));

        }catch(\Exception $ex){

            // La base de datos envía la exception entre los símolos $ por lo que se realiza un explode para obtener el mensaje.
            $error = explode("$", $ex->getMessage());

            // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
            throw new \Exception($error[1]);
        }
    }

    // Solicita todos los elementos a la base de datos.
    // public static function findChat($cursoId){
    //     $list_chats = [];
    //     try{
    //         // realiza a conexión con la DB.
    //         $connection = DBConnection::createConnection();

    //         startSession();
    //         $user_id = $_SESSION['user_id'];

    //         if ($_SESSION['user'] == "administrador"){

    //             // Prepara la consulta a la base de datos.
    //             $sql = $connection->query('SELECT * FROM chat');

    //         }
    //         elseif ($_SESSION['user'] == "estudiante"){


    //             // Prepara la consulta a la base de datos.
    //             $sql = $connection->prepare('SELECT * FROM chatsestudiante(?)');
    //             $sql->execute(array($user_id));
    //         }

    //         else{
    //             // Prepara la consulta a la base de datos.
    //             $sql = $connection->prepare('SELECT * FROM chatsprofesor(?)');
    //             $sql->execute(array($user_id));
    //         }

    //         foreach ($sql->fetchAll() as $chat){
    //             $list_chats[] = new Chat($chat["id"], $chat["titulo"], $chat["descripcion"], $chat["cursoid"], $chat["fecha"]);
    //         }

    //         return $list_chats;

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
    //         $sql = $connection->prepare("CALL eliminarchat(?)");

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
    //         $sql = $connection->prepare("CALL actualizarchat(?, ?, ?, ?, ?, ?, ?)");

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
