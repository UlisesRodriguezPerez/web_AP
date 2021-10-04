<?php
namespace App\Controllers;

use App\Router;

class HomeController{
    public static function index(Router $router){
        $router->renderView("home");
        // include_once("../Views/home.php");
    }
}



?>


