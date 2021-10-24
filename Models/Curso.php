<?php

namespace App\Models;

use App\DBConnection;

class Curso{
    // Atributos de la clase.
    private $id;
    private $nombre;
    private $gradoId;
    private $horaInicio;
    private $codigo;
    private $horaFin;
    private $diaSemana;


    // Contructor de la clase.
    public function __construct($id, $nombre, $gradoId, $horaInicio, $codigo, $horaFin, $diaSemana)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->gradoId = $gradoId;
        $this->horaInicio = $horaInicio;
        $this->codigo = $codigo;
        $this->horaFin = $horaFin;
        $this->diaSemana = $diaSemana;
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
    public function getGradoId()
    {
        return $this->gradoId;
    }

    /**
     * @return mixed
     */
    public function getHoraInicio()
    {
        return $this->horaInicio;
    }

    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @return mixed
     */
    public function getHoraFin()
    {
        return $this->horaFin;
    }

    /**
     * @return mixed
     */
    public function getDiaSemana()
    {
        return $this->diaSemana;
    }


    public function getGrado($gradoId)
    {
        $grado = Grado::findGrado($gradoId);
//        var_dump($grado);
        return $grado->getGrado();
    }


    // Recibe los valores del nuevo elemento y los envía a la DB para agregarlo.
    public static function create($codigo, $nombre, $grado, $dia_semana, $hora_inicio,  $hora_fin){
        try{
            // realiza a conexión con la DB.
            $connection = DBConnection::createConnection();

            // Prepara la consulta a la base de datos.
            $sql = $connection->prepare("SELECT insertarcurso(?, ?, ?, ?, ?, ?)");

            // Se le indican los parámetros de la consulta.
            $sql->execute(array($codigo, $nombre, $grado, $dia_semana, $hora_inicio,  $hora_fin));

        }catch(\Exception $ex){

            //En caso de surgir algún problema, captura el error dado por la base de datos (en caso de ser ahí el problema).

            // La base de datos envía la exception entre los símolos $ por lo que se realiza un explode para obtener el mensaje.
            $error = explode("$", $ex->getMessage());

            // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
            throw new \Exception($error[1]);
        }
    }

    // Solicita todos los elementos a la base de datos.
    public static function allCursos(){
        $list_cursos = [];
        try{
            // realiza a conexión con la DB.
            $connection = DBConnection::createConnection();

            startSession();
            $user_id = $_SESSION['user_id'];
//            var_dump($user_id);
            if ($_SESSION['user'] == "administrador"){

                // Prepara la consulta a la base de datos.
                $sql = $connection->query('SELECT * FROM curso');
//                $sql->execute(array($user_id));
            }
            elseif ($_SESSION['user'] == "estudiante"){

//                $user_id = $_SESSION['user_id'];

                // Prepara la consulta a la base de datos.
                $sql = $connection->prepare('SELECT * FROM cursosestudiante(?)');
                $sql->execute(array($user_id));
            }

            else{
                // Prepara la consulta a la base de datos.
                $sql = $connection->prepare('SELECT * FROM cursosprofesor(?)');
                $sql->execute(array($user_id));
            }

            foreach ($sql->fetchAll() as $curso){
                $list_cursos[] = new Curso($curso["ID"], $curso["nombre"], $curso["gradoId"], $curso["horaInicio"],
                    $curso["codigo"], $curso["horaFin"], $curso["diaSemana"]);
            }

            return $list_cursos;

        }catch(\Exception $ex){

            //En caso de surgir algún problema, captura el error dado por la base de datos (en caso de ser ahí el problema).

            $error = "Ha surgido un error al cargar los datos, vuelva a intentarlo.";

            // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
            throw new \Exception($error);
        }
    }

    // Recibe el id del elemento a eliminar y procede a ejecutar el stored procedure.
    public static function delete($id){
        try{
            // realiza a conexión con la DB.
            $connection = DBConnection::createConnection();
            echo $id;
            // Prepara la consulta a la base de datos.
            $sql = $connection->prepare("CALL eliminarcurso(?)");

            // Se le indican los parámetros de la consulta.
            $sql->execute(array($id));

        }catch(\Exception $ex){

            //En caso de surgir algún problema, captura el error dado por la base de datos (en caso de ser ahí el problema).

            // La base de datos envía la exception entre los símolos $ por lo que se realiza un explode para obtener el mensaje.
            $error = explode("$", $ex->getMessage());

            // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
            throw new \Exception($error[1]);
        }
    }

    // Busca un elemento en específico con el id.
    public static function findCurso($id){
        try{
            // realiza a conexión con la DB.
            $connection = DBConnection::createConnection();

            // Prepara la consulta a la base de datos.
            $sql = $connection->prepare("SELECT * FROM buscarcurso(?)");

            // Se le indican los parámetros de la consulta.
            $sql->execute(array($id));

            // Se crea un objeto formato Json
            $curso = $sql->fetch();

            // Crea un objeto y lo retorna al controlador.
            return new Curso($curso["ID"], $curso["nombre"], $curso["gradoId"], $curso["horaInicio"],
                $curso["codigo"], $curso["horaFin"], $curso["diaSemana"]);

        }catch(\Exception $ex){

            //En caso de surgir algún problema, captura el error dado por la base de datos (en caso de ser ahí el problema).

            // La base de datos envía la exception entre los símolos $ por lo que se realiza un explode para obtener el mensaje.
            $error = explode("$", $ex->getMessage());

            // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
            throw new \Exception($error[1]);
        }
    }

    // Recibe los nuevos valores de un elemento para enviarlos a la Db y actualizarlos.
    public static function update($id, $codigo, $nombre, $gradoId, $diaSemama, $horaInicio,  $horaFin){
        try{
            // realiza a conexión con la DB.
            $connection = DBConnection::createConnection();

            // Prepara la consulta a la base de datos.
            $sql = $connection->prepare("CALL actualizarcurso(?, ?, ?, ?, ?, ?, ?)");

            // Se le indican los parámetros de la consulta.
            $sql->execute(array($id, $codigo, $nombre, $gradoId, $diaSemama, $horaInicio,  $horaFin));

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
