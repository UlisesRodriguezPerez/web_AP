<?php

// En caso de no existir una sesión, inicia.
function startSession(){
    if (session_status() != "2")
        session_start();
}

// Cierra la sessión existente
function closeSession(){
    if (session_status() == "2")
        session_destroy();
}

// Optiene la primera parte de la URI
function getRouteName(){
    $url = $_SERVER['REQUEST_URI'];
    return explode('/', $url)[1];  
}


// Esta función limita al usuario no admin a ciertas rutas.
function hasPermission(){
    startSession();
    if(isset($_SESSION['user'])){
        $role = $_SESSION['user'];

        if ($role == "estudiante"){
            $uri = $_SERVER['REQUEST_URI'];
            $accessDenied = array("/curso/delete"); // Todas las rutas a las que no tienen acceso

            if (in_array($uri, $accessDenied)){
                return false;
            }
            return true;
        }
        else{
            return true;
        }
    }
    return true;
}

function currentURL_linuxWindows(){
    $os = php_uname();
    
    var_dump($os);

    // if (strpos(strtolower($os), 'linux'))){

    // }
    
}

function randomPassword(){
    $characters = [""];
}
