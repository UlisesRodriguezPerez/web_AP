<?php

namespace App\Models;

use App\DBConnection;

class Estudiante extends Usuario {
    // Atributos de la clase.
    private $idEstudiante;
    private $usuarioId;
    private $grado;

    // Contructor de la clase.
    public function __construct($id, $nombre, $apellido, $password, $cedula, $correo, $rol_id, $idEstudiante, $usuarioId, $grado)
    {
        parent::__construct($id, $nombre, $apellido, $password, $cedula, $correo, $rol_id);
        $this->idEstudiante = $idEstudiante;
        $this->usuarioId = $usuarioId;
        $this->grado = $grado;
    }

    /**
     * @return mixed
     */
    public function getIdEstudiante()
    {
        return $this->idEstudiante;
    }

    /**
     * @return mixed
     */
    public function getUsuarioId()
    {
        return $this->usuarioId;
    }

    /**
     * @return mixed
     */
    public function getGrado()
    {
        return $this->grado;
    }

//    // Recibe los valores del nuevo elemento y los envía a la DB para agregarlo.
    public static function create($nombre, $apellido, $password, $cedula, $correo, $gradoId){
        try{
            // realiza a conexión con la DB.
            $connection = DBConnection::createConnection();

            // Prepara la consulta a la base de datos.
            $sql = $connection->prepare("CALL insertarestudiante(?, ?, ?, ?, ?, ?)");

            // Se le indican los parámetros de la consulta.
            $sql->execute(array($nombre, $apellido, $password, $cedula, $correo, $gradoId));

        }catch(\Exception $ex){

            // La base de datos envía la exception entre los símolos $ por lo que se realiza un explode para obtener el mensaje.
            $error = explode("$", $ex->getMessage());

            // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
            throw new \Exception($error[1]);
        }
    }

    // Solicita todos los elementos a la base de datos.
    public static function allEstudiantes(){
        $list_estudiantes = [];
        try{
            // realiza a conexión con la DB.
            $connection = DBConnection::createConnection();

            startSession();
            $user_id = $_SESSION['user_id'];
            if ($_SESSION['user'] == "administrador"){

                // Prepara la consulta a la base de datos.
                $sql = $connection->prepare('SELECT * FROM estudiantes()');
                $sql->execute(array());
            }
            elseif ($_SESSION['user'] == "profesor"){

                //PENDIENTE DE IMPLEMENTAR
                $sql = $connection->prepare('SELECT * FROM estudiantesxprofesor(?)');
                $sql->execute(array($user_id));
            }


            foreach ($sql->fetchAll() as $estudiante){
                $list_estudiantes[] = new Estudiante($estudiante["ID"], $estudiante["nombre"], $estudiante["apellido"], $estudiante["password"],
                                                $estudiante["cedula"], $estudiante["correo"], $estudiante["rol_id"], $estudiante["idEstudiante"],
                                                $estudiante["ID"], $estudiante["grado"]);
            }

            return $list_estudiantes;

        }catch(\Exception $ex){

            //En caso de surgir algún problema, captura el error dado por la base de datos (en caso de ser ahí el problema).

            $error = "Ha surgido un error al cargar los datos, vuelva a intentarlo.";

            throw new \Exception($error);
        }
    }
//
//    // Recibe el id del elemento a eliminar y procede a ejecutar el stored procedure.
    public static function delete($idEstudiante){
        try{
            // realiza a conexión con la DB.
            $connection = DBConnection::createConnection();
            // Prepara la consulta a la base de datos.
            $sql = $connection->prepare("CALL eliminarestudiante(?)");
            var_dump($idEstudiante);
            // Se le indican los parámetros de la consulta.
            $sql->execute(array($idEstudiante));

        }catch(\Exception $ex){

            // La base de datos envía la exception entre los símolos $ por lo que se realiza un explode para obtener el mensaje.
            $error = explode("$", $ex->getMessage());

            // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
            throw new \Exception($error[1]);
        }
    }

//    // Busca un elemento en específico con el id.
    public static function findEstudiante($id){
        try{
            // realiza a conexión con la DB.
            $connection = DBConnection::createConnection();

            // Prepara la consulta a la base de datos.
            $sql = $connection->prepare("SELECT * FROM buscarestudiante(?)");

            // Se le indican los parámetros de la consulta.
            $sql->execute(array($id));

            // Se crea un objeto formato Json
            $estudiante = $sql->fetch();

            // Crea un objeto y lo retorna al controlador.
            return new Estudiante($estudiante["ID"], $estudiante["nombre"], $estudiante["apellido"], $estudiante["password"],
                                $estudiante["cedula"], $estudiante["correo"], $estudiante["rol_id"], $estudiante["idEstudiante"],
                                $estudiante["ID"], $estudiante["grado"]);

        }catch(\Exception $ex){

            // La base de datos envía la exception entre los símolos $ por lo que se realiza un explode para obtener el mensaje.
            $error = explode("$", $ex->getMessage());

            // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
            throw new \Exception($error[1]);
        }
    }
//
//    // Recibe los nuevos valores de un elemento para enviarlos a la Db y actualizarlos.
    public static function update($id, $nombre, $apellido, $password, $cedula, $correo, $gradoId){
        try{
            // realiza a conexión con la DB.
            $connection = DBConnection::createConnection();

            // Prepara la consulta a la base de datos.
            $sql = $connection->prepare("CALL actualizarestudiante(?, ?, ?, ?, ?, ?, ?)");

            // Se le indican los parámetros de la consulta.
            $sql->execute(array($id, $nombre, $apellido, $password, $cedula, $correo, $gradoId));

        }catch(\Exception $ex){

            // La base de datos envía la exception entre los símolos $ por lo que se realiza un explode para obtener el mensaje.
            $error = explode("$", $ex->getMessage());

            // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
            throw new \Exception($error[1]);
        }
    }

    public static function estudiantesPorCurso($idCurso){
        $list_estudiantes = [];
        try{
            // realiza a conexión con la DB.
            $connection = DBConnection::createConnection();



            // Prepara la consulta a la base de datos.
            $sql = $connection->prepare('SELECT * FROM estudiantesporcurso(?)');
            $sql->execute(array($idCurso));

            foreach ($sql->fetchAll() as $estudiante){
                $list_estudiantes[] = new Estudiante($estudiante["ID"], $estudiante["nombre"], $estudiante["apellido"], $estudiante["password"],
                    $estudiante["cedula"], $estudiante["correo"], $estudiante["rol_id"], $estudiante["idEstudiante"],
                    $estudiante["ID"], $estudiante["grado"]);
            }
            return $list_estudiantes;

        }catch(\Exception $ex){

            $error = "Ha surgido un error al cargar los datos (eestudiantesPorCurso) vuelva a intentarlo.";

            throw new \Exception($error);
        }
    }

    public static function estudiantesSinAsignarEnCurso($idCurso){
        $list_estudiantes = [];
        try{
            // realiza a conexión con la DB.
            $connection = DBConnection::createConnection();



            // Prepara la consulta a la base de datos.
            $sql = $connection->prepare('SELECT * FROM estudiantessinasignarencurso(?)');
            $sql->execute(array($idCurso));

            foreach ($sql->fetchAll() as $estudiante){
                $list_estudiantes[] = new Estudiante($estudiante["ID"], $estudiante["nombre"], $estudiante["apellido"], $estudiante["password"],
                    $estudiante["cedula"], $estudiante["correo"], $estudiante["rol_id"], $estudiante["idEstudiante"],
                    $estudiante["ID"], $estudiante["grado"]);
            }

            return $list_estudiantes;

        }catch(\Exception $ex){

            $error = "Ha surgido un error al cargar los datos (estudiantesSinAsignarEnCurso) vuelva a intentarlo.";

            throw new \Exception($error);
        }
    }

    public static function asignarACurso($idEstudiante, $idCurso){
        try{

            $connection = DBConnection::createConnection();

            $sql = $connection->prepare("CALL asignarestudiante(?,?)");


            $sql->execute(array($idEstudiante, $idCurso));

        }catch(\Exception $ex){

            // La base de datos envía la exception entre los símolos $ por lo que se realiza un explode para obtener el mensaje.
            $error = explode("$", $ex->getMessage());

            // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
            throw new \Exception($error[1]);
        }
    }

    public static function eliminarDeCurso($idEstudiante, $idCurso){
        try{

            $connection = DBConnection::createConnection();
            var_dump($idEstudiante);
            var_dump($idCurso);
            $sql = $connection->prepare("CALL eliminarestudiantecurso(?,?)");


            $sql->execute(array($idEstudiante, $idCurso));

        }catch(\Exception $ex){

            // La base de datos envía la exception entre los símolos $ por lo que se realiza un explode para obtener el mensaje.
            $error = explode("$", $ex->getMessage());

            // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
            throw new \Exception($error[1]);
        }
    }

}

?>
