<?php

namespace App\Controllers;

use App\Models\Curso;
use App\Models\Grado;
use App\Models\Estudiante;
use App\Models\Docente;
use App\Router;


class CursosController{

    // Vista principal del elemento.
    public static function index(Router $router){
        try{

            // Obtenemos todos los elementos desde el Model para después mostrarlos en la vista (table).
            $list_cursos = Curso::allCursos();
            $router->renderView("curso/index", ['list_cursos' => $list_cursos]);

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

    // La función create obtiene todos los valores del formulario.
    public static function create(Router $router){
        try{
            // En caso de recibir un POST obtiene los valores del formulario y los envía al Model.
            if($_SERVER["REQUEST_METHOD"] === "POST"){

                $nombre = $_POST['name'];
                $codigo = $_POST['code'];
                $gradoId = $_POST['grado_id'];
                $horaInicio = $_POST['hora_inicio'];
                $horaFin = $_POST['hora_fin'];
                $diaSemama = $_POST['dia_semana'];

//                echo $codigo, $nombre, $gradoId, $diaSemama, $horaInicio,  $horaFin;
                // Una vez almacenados los valores en variables, se le pasa al Model función create para registrar el nuevo elemento a la DB.
                Curso::create($codigo, $nombre, $gradoId, $diaSemama, $horaInicio,  $horaFin);

                // finalmente volvemos a la vista index del elemento.
                header("Location: /curso");
                exit;

            }
            $list_grados = Grado::allGrados();
//            var_dump($list_grados);

            // llamamos a la función renderView quien recibe una vista y parámetros a utilizar en la vista.
            $router->renderView("/curso/create", ['list_grados' => $list_grados]);

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


    public static function delete(){
        try{

            // Se recibe el id del elemento y se envía al Model para proceder a la DB, finalmente se redirige al index..
            $id = $_GET['id'];
//            var_dump($id);
            // buscamos el elemento en la DB
            Curso::delete($id);

            // redirecionamos al index del elemento.
            header("Location: /curso");
            exit;

        }catch(\Exception $ex){

            // En caso de ocurrir algun problema se captura la excepcion y se redirige al index.
            $error = $ex->getMessage();

            // iniciamos el proceso session start para poder asignar la variable error.
            session_start();
            $_SESSION['error'] = $error;

            // redirigimos a la vista index donde se mostrará el error ocurrido.
            header("Location: /curso");
        }
    }

    // Reecibe los valores del formulario y los envía al modelo.
    public static function update(Router $router){
        try{

            // Cuando recive el POST envía los datos recibidos al modelo para proceder a la base de datos.
            if($_POST){
                $id = $_POST['id'];
                $nombre = $_POST['name'];
                $codigo = $_POST['code'];
                $gradoId = $_POST['grado_id'];
                $horaInicio = $_POST['hora_inicio'];
                $horaFin = $_POST['hora_fin'];
                $diaSemama = $_POST['dia_semana'];

                Curso::update($id, $codigo, $nombre, $gradoId, $diaSemama, $horaInicio,  $horaFin);

                // Después de actualizar redirecciona al index del elemento.
                header("Location: /curso");
                exit;
            }

            //  obtenemos el id del elemento.
            $id = $_GET['id'];

            // buscamos el elemento en la DB.
            $curso = Curso::findCurso($id);
//            var_dump($curso);
            $idGrado = $curso->getGradoId();

            $list_grados = Grado::allGrados();

//            var_dump($list_grados);
            $gradoActual = Grado::findGrado($idGrado);
//            var_dump($gradoActual);
            // Enviamos la ruta y parámetros al renderView.
            $router->renderView("/curso/update",['curso'=>$curso, 'list_grados' => $list_grados, 'gradoActual'=>$gradoActual]);

        }catch(\Exception $ex){

            // En caso de ocurrir algun problema se captura la excepcion y se redirige al index.
            $error = $ex->getMessage();

            // iniciamos el proceso session start para poder asignar la variable error.
            session_start();
            $_SESSION['error'] = $error;

            // redirigimos a la vista index donde se mostrará el error ocurrido.
            header("Location: /curso");
        }
    }



    public static function find(Router $router){
        try{

            // En caso de recibir POST, vuelve al index (btn Back).
            if($_POST){
                header("Location: /curso");
                exit;
            }
//            echo "LKBKBLK";
            // Captura el id del elemento y lo envía al Model para proceder a la DB.
            $id = $_GET['id'];
            $cursoId = $id;
            $list_estudiantes = Estudiante::estudiantesPorCurso($id);
            $docente = Docente::docentePorCurso($id);
//            var_dump($docente);

//            var_dump($list_estudiantes);


            $router->renderView("curso/find", ['list_estudiantes'=>$list_estudiantes, 'docente'=>$docente, 'cursoId'=>$cursoId]);

        }catch(\Exception $ex){

            // En caso de ocurrir algun problema se captura la excepcion y se redirige al index.
            $error = $ex->getMessage();

            // iniciamos el proceso session start para poder asignar la variable error.
            session_start();
            $_SESSION['error'] = $error;

            // redirigimos a la vista index donde se mostrará el error ocurrido.
            header("Location: /curso");
        }
    }

    public static function asignar(Router $router){
        try{

            // En caso de recibir POST, vuelve al index (btn Back).
            if($_POST){

                header("Location: /curso");
                exit;
            }
//            echo "LKBKBLK";
            // Captura el id del elemento y lo envía al Model para proceder a la DB.
            $id = $_GET['id'];
            $cursoId = $id;
            $list_estudiantes = Estudiante::estudiantesSinAsignarEnCurso($id);
            $list_docentes = Docente::allDocentes();
            $docenteActual = Docente::docentePorCurso($cursoId);

//            var_dump($docenteActual);


            $router->renderView("curso/asignar", ['list_estudiantes'=>$list_estudiantes, 'list_docentes'=>$list_docentes,
                                                'cursoId'=>$cursoId, 'docenteActual'=>$docenteActual]);

        }catch(\Exception $ex){

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