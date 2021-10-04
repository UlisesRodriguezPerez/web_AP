<?php

    namespace App;
    use App\Config;

        class Router{
            // atributos de la clase
            public array $getRoutes = [];
            public array $postRoutes = [];

            // Creamos la función get y post que usará el index para las rutas
            // Recibe una url y una action y las asigna a cada lista correpondinte.
            public function get($url, $function){
                $this->getRoutes[$url] = $function;
            }

            // Recibe una url y una action y las asigna a cada lista correpondinte.
            public function post($url, $function){
                $this->postRoutes[$url] = $function;
            }

            // La función resolve se encarga de ejecutar el método que fue solicitado.
            public function resolve(){  

                // Obtenemos el PATH y el REQUES METHOD del $_SERVER
                $currentURL = $_SERVER[Config::$PATH] ?? '/';
                $method = $_SERVER['REQUEST_METHOD'];

                
                if ($method === "GET"){
                    // Cuando es GET asigna a la variable function la url en cado de haber desde el getRoutes
                    $function = $this->getRoutes[$currentURL] ?? null;
                }else{
                    // Cuando es POST asigna a la variable function la url en cado de haber desde el postRoutes
                    $function = $this->postRoutes[$currentURL] ?? null;
                }

                startSession();
                if (!isset($_SESSION['login']) && $currentURL != "/login"){
                    // echo "HOIHPI";
                    include_once Config::$INCLUDE;
                    session_destroy();
                    exit;
                }

                if (!hasPermission()){
                    $router = new Router();
                    $router->renderView("403");
                }

                // Cuando la función es diferente de null
                if ($function){
                    call_user_func($function, $this);
                }else{
                    // En caso de no existir una ruta, redirecciona a page not found.
                    $router = new Router();
                    $router->renderView("error");
                }
            }

            // Recibe una vista y en ocaciones los parámetros a pasar a las vistas.
            public function renderView($view, $parameters = []){

                // Se recorren los parámetros de la lista y se asignan a su respectiva llave para usar en la vista.
                foreach ($parameters as $key => $value){
                    $$key = $value;
                }
                // include_once __DIR__."/Views/layouts/app.php
                ob_start();
                include_once __DIR__."/Views/$view.php";
                $content = ob_get_clean();
                include_once __DIR__."/Views/layouts/app.php";
        
            }
        }
?>