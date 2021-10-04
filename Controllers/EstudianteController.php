<?php

namespace App\Controllers;

use App\Models\Estudiante;
use App\Models\Grado;
use App\Router;


class EstudianteController{

    // Vista principal del elemento.
    public static function index(Router $router){
        try{

            // Obtenemos todos los elementos desde el Model para después mostrarlos en la vista (table).
            $list_estudiantes = Estudiante::allEstudiantes();
//            var_dump($list_estudiantes);
            // Redirecionamos a la vista principal
            $router->renderView("estudiante/index", ['list_estudiantes' => $list_estudiantes]);

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
                $gradoId = $_POST['grado_id'];


                Estudiante::create($nombre, $apellido, $password, $cedula, $correo, $gradoId);

                // finalmente volvemos a la vista index del elemento.
                header("Location: /estudiante");
                exit;
            }
            $list_grados = Grado::allGrados();
            // llamamos a la función renderView quien recibe una vista y parámetros a utilizar en la vista.
            $router->renderView("/estudiante/create", ['list_grados' => $list_grados]);

        }catch (\Exception $ex){

            // En caso de ocurrir algun problema se captura la excepcion y se redirige al index.
            $error = $ex->getMessage();

            // iniciamos el proceso session start para poder asignar la variable error.
            session_start();
            $_SESSION['error'] = $error;

            // redirigimos a la vista index donde se mostrará el error ocurrido.
            header("Location: /estudiante");
        }
    }


    public static function delete(){
        try{
            // Id del estudiante
            $id = $_GET['id'];

            Estudiante::delete($id);

            // redirecionamos al index del elemento.
            header("Location: /estudiante");
            exit;

        }catch(\Exception $ex){

            // En caso de ocurrir algun problema se captura la excepcion y se redirige al index.
            $error = $ex->getMessage();

            // iniciamos el proceso session start para poder asignar la variable error.
            session_start();
            $_SESSION['error'] = $error;

            // redirigimos a la vista index donde se mostrará el error ocurrido.
            header("Location: /estudiante");
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
                $gradoId = $_POST['grado_id'];

                Estudiante::update($id, $nombre, $apellido, $password, $cedula, $correo, $gradoId);

                // Después de actualizar redirecciona al index del elemento.
                header("Location: /estudiante");
                exit;
            }

            //  obtenemos el id del elemento.
            $id = $_GET['id'];


            // buscamos el elemento en la DB.
            $estudiante = Estudiante::findEstudiante($id);

            $Grado = $estudiante->getGrado();

            $list_grados = Grado::allGrados();

//            var_dump($list_grados);
            $gradoActual = Grado::findGradoPorNombre($Grado);
//            var_dump($estudiante);
            $router->renderView("/estudiante/update",['estudiante'=>$estudiante, 'list_grados' => $list_grados, 'gradoActual'=>$gradoActual]);

        }catch(\Exception $ex){

            // En caso de ocurrir algun problema se captura la excepcion y se redirige al index.
            $error = $ex->getMessage();

            // iniciamos el proceso session start para poder asignar la variable error.
            session_start();
            $_SESSION['error'] = $error;

            // redirigimos a la vista index donde se mostrará el error ocurrido.
            header("Location: /estudiante");
        }
    }



    public static function find(Router $router){
        try{

            // En caso de recibir POST, vuelve al index (btn Back).
            if($_POST){
                header("Location: /estudiante");
                exit;
            }

            // Captura el id del elemento y lo envía al Model para proceder a la DB.
            $id = $_GET['id'];

            // Buscamos el elemento en la DB.
            $estudiante = Estudiante::findEstudiante($id);

            // enviamos la vista junto con los parámetros a utilizar.
            $router->renderView("estudiante/find", ['estudiante'=>$estudiante]);

        }catch(\Exception $ex){

            // En caso de ocurrir algun problema se captura la excepcion y se redirige al index.
            $error = $ex->getMessage();

            // iniciamos el proceso session start para poder asignar la variable error.
            session_start();
            $_SESSION['error'] = $error;

            // redirigimos a la vista index donde se mostrará el error ocurrido.
            header("Location: /estudiante");
        }
    }

}

?>