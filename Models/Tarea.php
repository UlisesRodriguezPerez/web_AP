<?php

namespace App\Models;

use App\DBConnection;

class Tarea{
    // Atributos de la clase.
    private $id;
    private $titulo;
    private $descripcion;
    private $cursoId;
    private $fecha;
    private $codidoID;



    // Contructor de la clase.
    public function __construct($id, $titulo, $descripcion, $cursoId, $fecha, $codidoID)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->cursoId = $cursoId;
        $this->fecha = $fecha;
        $this->codidoID = $codidoID;
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

        /**
     * @return mixed
     */
    public function getCodigoID()
    {
        return $this->codidoID;
    }

    // Busca un elemento en específico con el id.
    public static function findTareas($idCurso){
        try{
            $list_tareas = [];
            // realiza a conexión con la DB.
            $connection = DBConnection::createConnection();

            // Prepara la consulta a la base de datos.
            $sql = $connection->prepare("SELECT * FROM buscartareas(?)");

            // Se le indican los parámetros de la consulta.
            $sql->execute(array($idCurso));

            // Se crea un objeto formato Json
            // $tarea = $sql->fetch();

            foreach ($sql->fetchAll() as $tarea){
                $list_tareas[] = new Tarea($tarea["id"], $tarea["titulo"], $tarea["descripcion"], $tarea["cursoid"], $tarea["fecha"], $tarea["codigoID"]);
            }
            // Crea un objeto y lo retorna al controlador.
            return $list_tareas;

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
            $sql = $connection->prepare("CALL insertartarea(?, ?, ?, ?)");

            // Se le indican los parámetros de la consulta.
            $sql->execute(array($titulo, $descripcion, $cursoId, $fecha));

        }catch(\Exception $ex){

            // La base de datos envía la exception entre los símolos $ por lo que se realiza un explode para obtener el mensaje.
            $error = explode("$", $ex->getMessage());

            // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
            throw new \Exception($error[1]);
        }
    }

}

?>
