<?php

namespace App\Models;

use App\DBConnection;

class Docente extends Usuario {
    // Atributos de la clase.
    private $idDocente;
    private $usuarioId;
    private $calificacion;

    // Contructor de la clase.
    public function __construct($id, $nombre, $apellido, $password, $cedula, $correo, $rol_id, $idDocente, $usuarioId, $calificacion)
    {
        parent::__construct($id, $nombre, $apellido, $password, $cedula, $correo, $rol_id);
//        $this->id = $id;
//        $this->nombre = $nombre;
//        $this->apellido = $apellido;
//        $this->password = $password;
//        $this->cedula = $cedula;
//        $this->correo = $correo;
//        $this->rol_id = $rol_id;
        $this->idDocente = $idDocente;
        $this->usuarioId = $usuarioId;
        $this->calificacion = $calificacion;
    }


    /**
     * @return mixed
     */
    public function getIdDocente()
    {
        return $this->idDocente;
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
    public function getCalificacion()
    {
        return $this->calificacion;
    }

//    // Recibe los valores del nuevo elemento y los envía a la DB para agregarlo.
    public static function create($nombre, $apellido, $password, $cedula, $correo){
        try{
            // realiza a conexión con la DB.
            $connection = DBConnection::createConnection();

            // Prepara la consulta a la base de datos.
            $sql = $connection->prepare("CALL insertardocente(?, ?, ?, ?, ?)");

            // Se le indican los parámetros de la consulta.
            $sql->execute(array($nombre, $apellido, $password, $cedula, $correo));

        }catch(\Exception $ex){

            // La base de datos envía la exception entre los símolos $ por lo que se realiza un explode para obtener el mensaje.
            $error = explode("$", $ex->getMessage());

            // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
            throw new \Exception($error[1]);
        }
    }

    // Solicita todos los elementos a la base de datos.
    public static function allDocentes(){
        $list_docentes = [];
        try{
            // realiza a conexión con la DB.
            $connection = DBConnection::createConnection();

            startSession();
            $user_id = $_SESSION['user_id'];
//            var_dump($user_id);
            if ($_SESSION['user'] == "administrador"){

                // Prepara la consulta a la base de datos.
                $sql = $connection->prepare('SELECT * FROM profesores()');
                $sql->execute(array());
            }
            elseif ($_SESSION['user'] == "estudiante"){

//                $user_id = $_SESSION['user_id'];

                //PENDIENTE DE IMPLEMENTAR
                $sql = $connection->prepare('SELECT * FROM profesoresxestudiante(?)');
                $sql->execute(array($user_id));
            }


            foreach ($sql->fetchAll() as $docente){
                $list_docentes[] = new Docente($docente["ID"], $docente["nombre"], $docente["apellido"], $docente["password"],
                                                $docente["cedula"], $docente["correo"], $docente["rol_id"], $docente["idDocente"],
                                                $docente["ID"], $docente["calificacion"]);
            }

            return $list_docentes;

        }catch(\Exception $ex){

            //En caso de surgir algún problema, captura el error dado por la base de datos (en caso de ser ahí el problema).

            $error = "Ha surgido un error al cargar los datos, vuelva a intentarlo.";

            throw new \Exception($error);
        }
    }
//
//    // Recibe el id del elemento a eliminar y procede a ejecutar el stored procedure.
    public static function delete($idDocente){
        try{
            // realiza a conexión con la DB.
            $connection = DBConnection::createConnection();
            // Prepara la consulta a la base de datos.
            $sql = $connection->prepare("CALL eliminardocente(?)");
            var_dump($idDocente);
            // Se le indican los parámetros de la consulta.
            $sql->execute(array($idDocente));

        }catch(\Exception $ex){

            // La base de datos envía la exception entre los símolos $ por lo que se realiza un explode para obtener el mensaje.
            $error = explode("$", $ex->getMessage());

            // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
            throw new \Exception($error[1]);
        }
    }

//    // Busca un elemento en específico con el id.
    public static function findDocente($id){
        try{
            // realiza a conexión con la DB.
            $connection = DBConnection::createConnection();

            // Prepara la consulta a la base de datos.
            $sql = $connection->prepare("SELECT * FROM buscardocente(?)");

            // Se le indican los parámetros de la consulta.
            $sql->execute(array($id));

            // Se crea un objeto formato Json
            $docente = $sql->fetch();

            // Crea un objeto y lo retorna al controlador.
            return new Docente($docente["ID"], $docente["nombre"], $docente["apellido"], $docente["password"],
                                $docente["cedula"], $docente["correo"], $docente["rol_id"], $docente["idDocente"],
                                $docente["ID"], $docente["calificacion"]);

        }catch(\Exception $ex){

            // La base de datos envía la exception entre los símolos $ por lo que se realiza un explode para obtener el mensaje.
            $error = explode("$", $ex->getMessage());

            // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
            throw new \Exception($error[1]);
        }
    }
//
//    // Recibe los nuevos valores de un elemento para enviarlos a la Db y actualizarlos.
    public static function update($id, $nombre, $apellido, $password, $cedula, $correo){
        try{
            // realiza a conexión con la DB.
            $connection = DBConnection::createConnection();

            // Prepara la consulta a la base de datos.
            $sql = $connection->prepare("CALL actualizardocente(?, ?, ?, ?, ?, ?)");

            // Se le indican los parámetros de la consulta.
            $sql->execute(array($id, $nombre, $apellido, $password, $cedula, $correo));

        }catch(\Exception $ex){

            // La base de datos envía la exception entre los símolos $ por lo que se realiza un explode para obtener el mensaje.
            $error = explode("$", $ex->getMessage());

            // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
            throw new \Exception($error[1]);
        }
    }

    public static function docentePorCurso($cursoId){
        try{
            // realiza a conexión con la DB.
            $connection = DBConnection::createConnection();

            // Prepara la consulta a la base de datos.
            $sql = $connection->prepare("SELECT * FROM docenteporcurso(?)");

            // Se le indican los parámetros de la consulta.
            $sql->execute(array($cursoId));

            // Se crea un objeto formato Json
            $docente = $sql->fetch();

            // EN caso de no haber resultado en la base de datos, creamos un Docente vacío (PENDIENTE MEJORAR para no hacer esto)
            if($docente == null)
                return new Docente(null,null,null,null,null,null,null,null,null,null);

            // Crea un objeto y lo retorna al controlador.
            return new Docente($docente["ID"], $docente["nombre"], $docente["apellido"], $docente["password"],
                $docente["cedula"], $docente["correo"], $docente["rol_id"], $docente["idDocente"],
                $docente["ID"], $docente["calificacion"]);

        }catch(\Exception $ex){

            // La base de datos envía la exception entre los símolos $ por lo que se realiza un explode para obtener el mensaje.
            $error = explode("$", $ex->getMessage());

            // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
            throw new \Exception($error[1]);
        }
    }

    public static function eliminarDeCurso($idDocente, $idCurso){
        try{

            $connection = DBConnection::createConnection();
            var_dump($idDocente);
            var_dump($idCurso);
            $sql = $connection->prepare("CALL eliminardocentecurso(?,?)");


            $sql->execute(array($idDocente, $idCurso));

        }catch(\Exception $ex){

            // La base de datos envía la exception entre los símolos $ por lo que se realiza un explode para obtener el mensaje.
            $error = explode("$", $ex->getMessage());

            // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
            throw new \Exception($error[1]);
        }
    }

    public static function asignarACurso($idDocente, $idCurso){
        try{

            $connection = DBConnection::createConnection();

            $sql = $connection->prepare("CALL asignardocente(?,?)");


            $sql->execute(array($idDocente, $idCurso));

        }catch(\Exception $ex){

            // La base de datos envía la exception entre los símolos $ por lo que se realiza un explode para obtener el mensaje.
            $error = explode("$", $ex->getMessage());

            // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
            throw new \Exception($error[1]);
        }
    }

}

?>
