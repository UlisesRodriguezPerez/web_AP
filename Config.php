<?php
namespace App;

class Config{

     // DATOS PARA LA CONEXIÓN CON LA DB

    // static $host= 'localhost';
     static $host= 'postgresql-55574-0.cloudclusters.net';

    // Nombre de la base de datos
    static $db = 'Ap_project';

    // Usuario de la base de datos (creado al instalar postgresql)
    // static $user = 'postgres';
     static $user = 'AP';

    // Contraseña para acceder a la base de datos en postgresql
    // static $password = 'Ulises';
    static $password = '12345678';

    // Puerto de la instancia de postgresql (normalmente es 5432)
    // static $port = '5432';
    static $port = '17054';


     // DATOS PARA EL ENVÍO DE CORREOS.

     static $hostMail = "smtp.gmail.com";

     static $usernameMail = "proyecto2.ap.web@gmail.com";

     static $passwordMail = "Proyecto2AP";

     static $portMail = 587;

    



// VARIABLES SEGÚN SISTEMA OPERATIVO.

     static $PATH = "PATH_INFO"; //WINDOWS
//    static $PATH = "REDIRECT_URL"; //LINUX

//    static $INCLUDE = "Views/login/login.php"; //LINUX
     static $INCLUDE = "Views\login\login.php"; //WINDOWS



}
?>
