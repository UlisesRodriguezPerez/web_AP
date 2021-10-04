<?php
namespace App;

class Config{

    static $host= 'localhost';

    // Nombre de la base de datos
    static $db = 'Ap_project';

    // Usuario de la base de datos (creado al instalar postgresql)
    static $user = 'postgres';

    // Contraseña para acceder a la base de datos en postgresql
    static $password = 'Ulises';

    // Puerto de la instancia de postgresql (normalmente es 5432)
    static $port = '5432';


    
// VARIABLES SEGÚN SISTEMA OPERATIVO.

     static $PATH = "PATH_INFO"; //WINDOWS
//    static $PATH = "REDIRECT_URL"; //LINUX

//    static $INCLUDE = "Views/login/login.php"; //LINUX
     static $INCLUDE = "Views\login\login.php"; //WINDOWS
}




?>