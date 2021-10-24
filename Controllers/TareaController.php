<?php

namespace App\Controllers;

use App\Models\Curso;
use App\Models\Tarea;
use App\Models\Grado;
use App\Models\Estudiante;
use App\Models\Docente;
use App\Router;


class TareaController{

    // Vista principal del elemento.
    public static function index(Router $router){
        try{
            if($_POST){
                header("Location: /curso");
                exit;
            }
            $cursoId = $_GET['id'];
            // $cursoActual = Curso::findCurso($cursoId);
            $list_tareas = Tarea::findTareas($cursoId);

            $router->renderView("tarea/index", ['list_tareas'=>$list_tareas, 'cursoId' => $cursoId]);
            // var_dump($list_tareas);

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

                $titulo = $_POST['titulo'];
                $desciption = $_POST['description'];
                $cursoId = $_POST['curso_id'];
                $fecha = $_POST['fecha'];
                // var_dump($titulo);
                // echo $desciption;
                // echo $cursoId;
                // echo $fecha;
                Tarea::create($titulo, $desciption, $cursoId, $fecha);

                // finalmente volvemos a la vista index del elemento.
                header("Location: /tarea?id=$cursoId");
                exit;

            }
            // $list_cursos = Curso::allCursos();
            // $id = $_GET['id'];
            $cursoId = $_GET['id'];
            // var_dump($cursoId);
            // $cursoActual = Curso::findCurso($cursoId);

            // llamamos a la función renderView quien recibe una vista y parámetros a utilizar en la vista.
            $router->renderView("/tarea/create", ['cursoId' => $cursoId]);

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

}

?>