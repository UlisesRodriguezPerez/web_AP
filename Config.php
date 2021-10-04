<?php
namespace App;

class Config{

//    static $host= 'localhost';
    static $host= 'postgresql-53009-0.cloudclusters.net';

    // Nombre de la base de datos
    static $db = 'Ap_project';

    // Usuario de la base de datos (creado al instalar postgresql)
//    static $user = 'postgres';
    static $user = 'AP';

    // Contraseña para acceder a la base de datos en postgresql
//    static $password = 'Ulises';
    static $password = 'Ap_project';

    // Puerto de la instancia de postgresql (normalmente es 5432)
//    static $port = '5432';
    static $port = '10199';


    
// VARIABLES SEGÚN SISTEMA OPERATIVO.

     static $PATH = "PATH_INFO"; //WINDOWS
//    static $PATH = "REDIRECT_URL"; //LINUX

//    static $INCLUDE = "Views/login/login.php"; //LINUX
     static $INCLUDE = "Views\login\login.php"; //WINDOWS
}




?>