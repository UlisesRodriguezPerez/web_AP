<?php

namespace App\Controllers;

use App\Models\Docente;
use App\Router;


class DocenteController{

    // Vista principal del elemento.
    public static function index(Router $router){
        try{

            // Obtenemos todos los elementos desde el Model para después mostrarlos en la vista (table).
            $list_docentes = Docente::allDocentes();

            // Redirecionamos a la vista principal
            $router->renderView("docente/index", ['list_docentes' => $list_docentes]);

        } catch (\Exception $ex) {

            // Se recibe el error y se envía a la vista.
            $error = $ex->getMessage();

            // iniciamos el proceso session para poder asignar la variables error y verificar en la vista.
            session_start();
            $_SESSION['error'] = $error;

            // redirecionamosa la vista principal.
            header("Location: /");
        }
    }

//     // La función create obtiene todos los valores del formulario.
     public static function create(Router $router){
         try{
             // En caso de recibir un POST obtiene los valores del formulario y los envía al Model.
             if($_SERVER["REQUEST_METHOD"] === "POST"){

                 $nombre = $_POST['nombre'];
                 $apellido = $_POST['apellido'];
                 $password = $_POST['password'];
                 $cedula = $_POST['cedula'];
                 $correo = $_POST['correo'];


                 Docente::create($nombre, $apellido, $password, $cedula, $correo);

                 // finalmente volvemos a la vista index del elemento.
                 header("Location: /docente");
                 exit;
             }

             // llamamos a la función renderView quien recibe una vista y parámetros a utilizar en la vista.
             $router->renderView("/docente/create");

         }catch (\Exception $ex){

             // En caso de ocurrir algun problema se captura la excepcion y se redirige al index.
             $error = $ex->getMessage();

             // iniciamos el proceso session start para poder asignar la variable error.
             session_start();
             $_SESSION['error'] = $error;

             // redirigimos a la vista index donde se mostrará el error ocurrido.
             header("Location: /docente");
         }
     }


     public static function delete(){
         try{
             // Id del docente
             $id = $_GET['id'];

             Docente::delete($id);

             // redirecionamos al index del elemento.
             header("Location: /docente");
             exit;

         }catch(\Exception $ex){

             // En caso de ocurrir algun problema se captura la excepcion y se redirige al index.
             $error = $ex->getMessage();

             // iniciamos el proceso session start para poder asignar la variable error.
             session_start();
             $_SESSION['error'] = $error;

             // redirigimos a la vista index donde se mostrará el error ocurrido.
             header("Location: /docente");
         }
     }

//     // Reecibe los valores del formulario y los envía al modelo.
     public static function update(Router $router){
         try{

             // Cuando recive el POST envía los datos recibidos al modelo para proceder a la base de datos.
             if($_POST){
                 $id = $_POST['id'];
                 $nombre = $_POST['nombre'];
                 $apellido = $_POST['apellido'];
                 $password = $_POST['password'];
                 $cedula = $_POST['cedula'];
                 $correo = $_POST['correo'];

                 Docente::update($id, $nombre, $apellido, $password, $cedula, $correo);

                 // Después de actualizar redirecciona al index del elemento.
                 header("Location: /docente");
                 exit;
             }

             //  obtenemos el id del elemento.
             $id = $_GET['id'];

             // buscamos el elemento en la DB.
             $docente = Docente::findDocente($id);

             $router->renderView("/docente/update",['docente'=>$docente]);

         }catch(\Exception $ex){

             // En caso de ocurrir algun problema se captura la excepcion y se redirige al index.
             $error = $ex->getMessage();

             // iniciamos el proceso session start para poder asignar la variable error.
             session_start();
             $_SESSION['error'] = $error;

             // redirigimos a la vista index donde se mostrará el error ocurrido.
             header("Location: /docente");
         }
     }



     public static function find(Router $router){
         try{

             // En caso de recibir POST, vuelve al index (btn Back).
             if($_POST){
                 // SOLO EL ADMIN TIENE ESTE ACCESSO.
                 if ($_SESSION['user'] == 'administrador') {
                     header("Location: /docente");
                     exit;
                 }
                 else{
                     header("Location: /curso");
                     exit;
                 }
             }

             // Captura el id del elemento y lo envía al Model para proceder a la DB.
             $id = $_GET['id'];

             // Buscamos el elemento en la DB.
             $docente = Docente::findDocente($id);

             // enviamos la vista junto con los parámetros a utilizar.
             $router->renderView("docente/find", ['docente'=>$docente]);

         }catch(\Exception $ex){

             // En caso de ocurrir algun problema se captura la excepcion y se redirige al index.
             $error = $ex->getMessage();

             // iniciamos el proceso session start para poder asignar la variable error.
             session_start();
             $_SESSION['error'] = $error;

             // redirigimos a la vista index donde se mostrará el error ocurrido.
             header("Location: /docente");
         }
     }

    public static function eliminarDeCurso(Router $router){
        try{

            $idDocente = $_GET['id'];
            $idCurso = $_GET['idCurso'];
//            var_dump($idCurso);

            Docente::eliminarDeCurso($idDocente, $idCurso);
            header("Location: /curso/find?id=$idCurso");


        }catch (\Exception $ex){

            // En caso de ocurrir algun problema se captura la excepcion y se redirige al index.
            $error = $ex->getMessage();

            // iniciamos el proceso session start para poder asignar la variable error.
            session_start();
            $_SESSION['error'] = $error;

            // redirigimos a la vista index donde se mostrará el error ocurrido.
            header("Location: /curso");
        }
    }

    public static function asignarACurso(Router $router){
//        try{

            $idDocente = $_GET['id'];
            $idCurso = $_GET['idCurso'];
//            var_dump($idCurso);

            Docente::asignarACurso($idDocente, $idCurso);
            header("Location: /curso/asignar?id=$idCurso");

//
//        }catch (\Exception $ex){
//
//            // En caso de ocurrir algun problema se captura la excepcion y se redirige al index.
//            $error = $ex->getMessage();
//
//            // iniciamos el proceso session start para poder asignar la variable error.
//            session_start();
//            $_SESSION['error'] = $error;
//
//            // redirigimos a la vista index donde se mostrará el error ocurrido.
//            header("Location: /curso");
//        }
    }

}

?>