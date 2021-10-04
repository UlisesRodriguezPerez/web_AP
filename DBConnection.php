<?php

namespace App;
use App\Config;
// Creamos la clase conexión, la cuál se conectará siempre con la DB.
class DBConnection{
    private static $connection = NULL;

    public static function createConnection(){
        try {
            // En caso de no existir una conexión entonces se crea.
            if(!isset(self::$connection)){
                $optionsPDO[\PDO::ATTR_ERRMODE] = \PDO::ERRMODE_EXCEPTION;
    
                self::$connection = new \PDO("pgsql:host=" . Config::$host .";port=". Config::$port . ";dbname=" . Config::$db, Config::$user, Config::$password, $optionsPDO);
            }
            // Se retorna la conexión.
            return self::$connection;
        } catch (\PDOException $ex) {
            // var_dump($ex->getMessage());

            // En caso de haber algún problema con la conexión, se crea el Exception.
            // throw new \Exception( "\$Ha ocurrido un problema con la conexión de la base de datos.$");
            throw new \Exception($ex->getMessage());
        }
    }
}

?>