<?php

namespace App\Models;

use App\DBConnection;

class Grado{
    // Atributos de la clase.
    private $id;
    private $grado;


    // Contructor de la clase.
    public function __construct($id, $grado)
    {
        $this->id = $id;
        $this->grado = $grado;
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
    public function getGrado()
    {
        return $this->grado;
    }

    // Solicita todos los elementos a la base de datos.
    public static function allGrados(){
        $list_cursos = [];
        try{
            // realiza a conexión con la DB.
            $connection = DBConnection::createConnection();

            startSession();
            $user_id = $_SESSION['user_id'];
//            var_dump($user_id);

            // Prepara la consulta a la base de datos.
            $sql = $connection->query('SELECT * FROM grado');
//            $sql->execute(array($user_id));
            foreach ($sql->fetchAll() as $grado){
                $list_grados[] = new Grado($grado["ID"], $grado["clase"]);
            }


//            $list_grados = $sql->fetchAll(\PDO::FETCH_ASSOC);

            return $list_grados;

        }catch(\Exception $ex){

            //En caso de surgir algún problema, captura el error dado por la base de datos (en caso de ser ahí el problema).

            $error = "Ha surgido un error al cargar los datos, vuelva a intentarlo.";

            // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
            throw new \Exception($error);
        }
    }

        // Busca un elemento en específico con el id.
    public static function findGrado($id){
        try{
            // realiza a conexión con la DB.
            $connection = DBConnection::createConnection();

            // Prepara la consulta a la base de datos.
            $sql = $connection->prepare("SELECT * FROM buscargrado(?)");

            // Se le indican los parámetros de la consulta.
            $sql->execute(array($id));

            // Se crea un objeto formato Json
            $grado = $sql->fetch();
//            var_dump($grado);
            // Crea un objeto y lo retorna al controlador.
            return new Grado($grado["ID"], $grado["clase"]);

        }catch(\Exception $ex){

            // La base de datos envía la exception entre los símolos $ por lo que se realiza un explode para obtener el mensaje.
            $error = explode("$", $ex->getMessage());

            // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
            throw new \Exception($error[1]);
        }
    }

    public static function findGradoPorNombre($p_grado){
        try{
            // realiza a conexión con la DB.
            $connection = DBConnection::createConnection();

            // Prepara la consulta a la base de datos.
            $sql = $connection->prepare("SELECT * FROM buscargradopornombre(?)");

            // Se le indican los parámetros de la consulta.
            $sql->execute(array($p_grado));

            // Se crea un objeto formato Json
            $grado = $sql->fetch();

            return new Grado($grado["ID"], $grado["clase"]);

        }catch(\Exception $ex){

            // La base de datos envía la exception entre los símolos $ por lo que se realiza un explode para obtener el mensaje.
            $error = explode("$", $ex->getMessage());

            // Se crea la exception con el mensaje de error de la DB. El formato es [$,texto separado, $]
            throw new \Exception($error[1]);
        }
    }

}

?>
