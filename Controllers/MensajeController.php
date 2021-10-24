<?php

namespace App\Controllers;

use App\Models\Curso;
use App\Models\Mensaje;
use App\Models\Grado;
use App\Models\Estudiante;
use App\Models\Docente;
use App\Router;


class MensajeController{

    // Vista principal del elemento.
    public static function index(Router $router){
        try{
            if($_POST){
                header("Location: /curso");
                exit;
            }
            $cursoId = $_GET['id'];
            // $cursoActual = Curso::findCurso($cursoId);
            $list_mensajes = Mensaje::findMensajes($cursoId);

            $router->renderView("mensaje/index", ['list_mensajes'=>$list_mensajes, 'cursoId' => $cursoId]);
            // var_dump($list_mensajes);

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
                Mensaje::create($titulo, $desciption, $cursoId, $fecha);

                // finalmente volvemos a la vista index del elemento.
                header("Location: /mensaje?id=$cursoId");
                exit;

            }
            // $list_cursos = Curso::allCursos();
            // $id = $_GET['id'];
            $cursoId = $_GET['id'];
            // var_dump($cursoId);
            $cursoActual = Curso::findCurso($cursoId);

            // llamamos a la función renderView quien recibe una vista y parámetros a utilizar en la vista.
            $router->renderView("/mensaje/create", ['cursoActual' => $cursoActual]);

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


//     public static function delete(){
//         try{

//             // Se recibe el id del elemento y se envía al Model para proceder a la DB, finalmente se redirige al index..
//             $id = $_GET['id'];
// //            var_dump($id);
//             // buscamos el elemento en la DB
//             Mensaje::delete($id);

//             // redirecionamos al index del elemento.
//             header("Location: /mensaje");
//             exit;

//         }catch(\Exception $ex){

//             // En caso de ocurrir algun problema se captura la excepcion y se redirige al index.
//             $error = $ex->getMessage();

//             // iniciamos el proceso session start para poder asignar la variable error.
//             session_start();
//             $_SESSION['error'] = $error;

//             // redirigimos a la vista index donde se mostrará el error ocurrido.
//             header("Location: /mensaje");
//         }
//     }

//     // Reecibe los valores del formulario y los envía al modelo.
//     public static function update(Router $router){
//         try{

//             // Cuando recive el POST envía los datos recibidos al modelo para proceder a la base de datos.
//             if($_POST){
//                 $id = $_POST['id'];
//                 $nombre = $_POST['name'];
//                 $codigo = $_POST['code'];
//                 $gradoId = $_POST['grado_id'];
//                 $horaInicio = $_POST['hora_inicio'];
//                 $horaFin = $_POST['hora_fin'];
//                 $diaSemama = $_POST['dia_semana'];

//                 Mensaje::update($id, $codigo, $nombre, $gradoId, $diaSemama, $horaInicio,  $horaFin);

//                 // Después de actualizar redirecciona al index del elemento.
//                 header("Location: /mensaje");
//                 exit;
//             }

//             //  obtenemos el id del elemento.
//             $id = $_GET['id'];

//             // buscamos el elemento en la DB.
//             $mensaje = Mensaje::findMensaje($id);
// //            var_dump($mensaje);
//             $idGrado = $mensaje->getGradoId();

//             $list_grados = Grado::allGrados();

// //            var_dump($list_grados);
//             $gradoActual = Grado::findGrado($idGrado);
// //            var_dump($gradoActual);
//             // Enviamos la ruta y parámetros al renderView.
//             $router->renderView("/mensaje/update",['mensaje'=>$mensaje, 'list_grados' => $list_grados, 'gradoActual'=>$gradoActual]);

//         }catch(\Exception $ex){

//             // En caso de ocurrir algun problema se captura la excepcion y se redirige al index.
//             $error = $ex->getMessage();

//             // iniciamos el proceso session start para poder asignar la variable error.
//             session_start();
//             $_SESSION['error'] = $error;

//             // redirigimos a la vista index donde se mostrará el error ocurrido.
//             header("Location: /mensaje");
//         }
//     }



//     public static function find(Router $router){
//         try{

//             // En caso de recibir POST, vuelve al index (btn Back).
//             if($_POST){
//                 header("Location: /mensaje");
//                 exit;
//             }
// //            echo "LKBKBLK";
//             // Captura el id del elemento y lo envía al Model para proceder a la DB.
//             $id = $_GET['id'];
//             $mensajeId = $id;
//             $list_estudiantes = Estudiante::estudiantesPorMensaje($id);
//             $docente = Docente::docentePorMensaje($id);
// //            var_dump($docente);

// //            var_dump($list_estudiantes);


//             $router->renderView("mensaje/find", ['list_estudiantes'=>$list_estudiantes, 'docente'=>$docente, 'mensajeId'=>$mensajeId]);

//         }catch(\Exception $ex){

//             // En caso de ocurrir algun problema se captura la excepcion y se redirige al index.
//             $error = $ex->getMessage();

//             // iniciamos el proceso session start para poder asignar la variable error.
//             session_start();
//             $_SESSION['error'] = $error;

//             // redirigimos a la vista index donde se mostrará el error ocurrido.
//             header("Location: /mensaje");
//         }
//     }

}

?>