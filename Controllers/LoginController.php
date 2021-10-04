<?php

namespace App\Controllers;

use App\Models\Login;
use App\Router;
use App\Config;

class LoginController{

    public static function logout(){
        // session_start();
        closeSession();
        include_once Config::$INCLUDE;

    }

        // La función login obtiene todos los valores del formulario login.
    public static function login(Router $router){
        try{
            
            // En caso de recibir un POST obtiene los valores del formulario y los envía al Model.
            if($_POST){
                
                $correo = $_POST['correo'];
                $password = $_POST['password'];

                
                // La base de datos retorna un 1 o un 0 según el rol.
                // $router->renderView("/gogogo");
                $access = Login::findLogin($correo, $password);
//                echo $access->nombre;
//                var_dump($access);
                // var_dump ($access);

                // role admin
                if($access->id == "1"){
                    startSession();
                    $_SESSION['user_id'] = $access->user_id;
                    $_SESSION['username'] = $access->nombre;
                    $_SESSION['user'] = "administrador";
                    $_SESSION['login'] = "true";
                    header("Location: /");
                    exit;
                }

                // role estudent
                elseif ($access->id == "2"){
                    startSession();


                    $_SESSION['user_id'] = $access->user_id;
                    $_SESSION['username'] = $access->nombre;
                    $_SESSION['user'] = "estudiante";
                    $_SESSION['login'] = "true";
                    header("Location: /");
                    exit;
                }

                // rol profe
                elseif($access->id == "3"){
                    startSession();
                    $_SESSION['user_id'] = $access->user_id;
                    $_SESSION['username'] = $access->nombre;
                    $_SESSION['user'] = "profesor";
                    $_SESSION['login'] = "true";
                    header("Location: /");
                    exit;
                }

                // No existe el usuario o contraseña.
                else{
                    startSession();
                    $_SESSION['message'] = "Correo y/o contraseña incorrectos.";
                    include_once Config::$INCLUDE;
                    // $router->renderView("/user/create");
                    // include_once "..\Views\login\login.php";
                }
            }

            // LOGIN
            include_once Config::$INCLUDE;
            

        }catch (\Exception $ex){

            // En caso de ocurrir algun problema se captura la excepcion y se redirige al index.
            $error = $ex->getMessage();

            // iniciamos el proceso session start para poder asignar la variable error.
            startSession();
            $_SESSION['error'] = $error;

            // redirigimos a la vista index donde se mostrará el error ocurrido.
            include_once Config::$INCLUDE;
        }
    }
}




?>