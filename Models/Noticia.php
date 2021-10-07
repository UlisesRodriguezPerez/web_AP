<?php

namespace App\Models;

use App\DBConnection;

class Noticia{
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
    public static function findNoticia($idCurso){
        try{
            $list_noticias = [];
            // realiza a conexión con la DB.
            $connection = DBConnection::createConnection();

            // Prepara la consulta a la base de datos.
            $sql = $connection->prepare("SELECT * FROM buscarnoticias(?)");

            // Se le indican los parámetros de la consulta.
            $sql->execute(array($idCurso));

            // Se crea un objeto formato Json
            // $noticia = $sql->fetch();

            foreach ($sql->fetchAll() as $noticia){
                $list_noticias[] = new Noticia($noticia["id"], $noticia["titulo"], $noticia["descripcion"], $noticia["cursoid"], $noticia["fecha"]);
            }
            // Crea un objeto y lo retorna al controlador.
            return $list_noticias;

        }catch(\Exception $ex){

            // La base de datos envía la exception entre los símolos $ por lo que se realiza un explode para obtener el mensaje.
            $error = explode("$", $ex->getMessage());

            // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
            throw new \Exception($error[1]);
        }
    }

    // // Recibe los valores del nuevo elemento y los envía a la DB para agregarlo.
    // public static function create($codigo, $nombre, $grado, $dia_semana, $hora_inicio,  $hora_fin){
    //     try{
    //         // realiza a conexión con la DB.
    //         $connection = DBConnection::createConnection();

    //         // Prepara la consulta a la base de datos.
    //         $sql = $connection->prepare("SELECT insertarnoticia(?, ?, ?, ?, ?, ?)");

    //         // Se le indican los parámetros de la consulta.
    //         $sql->execute(array($codigo, $nombre, $grado, $dia_semana, $hora_inicio,  $hora_fin));

    //     }catch(\Exception $ex){

    //         //En caso de surgir algún problema, captura el error dado por la base de datos (en caso de ser ahí el problema).

    //         // La base de datos envía la exception entre los símolos $ por lo que se realiza un explode para obtener el mensaje.
    //         $error = explode("$", $ex->getMessage());

    //         // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
    //         throw new \Exception($error[1]);
    //     }
    // }

    // Solicita todos los elementos a la base de datos.
    // public static function findNoticia($cursoId){
    //     $list_noticias = [];
    //     try{
    //         // realiza a conexión con la DB.
    //         $connection = DBConnection::createConnection();

    //         startSession();
    //         $user_id = $_SESSION['user_id'];

    //         if ($_SESSION['user'] == "administrador"){

    //             // Prepara la consulta a la base de datos.
    //             $sql = $connection->query('SELECT * FROM noticia');

    //         }
    //         elseif ($_SESSION['user'] == "estudiante"){


    //             // Prepara la consulta a la base de datos.
    //             $sql = $connection->prepare('SELECT * FROM noticiasestudiante(?)');
    //             $sql->execute(array($user_id));
    //         }

    //         else{
    //             // Prepara la consulta a la base de datos.
    //             $sql = $connection->prepare('SELECT * FROM noticiasprofesor(?)');
    //             $sql->execute(array($user_id));
    //         }

    //         foreach ($sql->fetchAll() as $noticia){
    //             $list_noticias[] = new Noticia($noticia["id"], $noticia["titulo"], $noticia["descripcion"], $noticia["cursoid"], $noticia["fecha"]);
    //         }

    //         return $list_noticias;

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
    //         $sql = $connection->prepare("CALL eliminarnoticia(?)");

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
    //         $sql = $connection->prepare("CALL actualizarnoticia(?, ?, ?, ?, ?, ?, ?)");

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
