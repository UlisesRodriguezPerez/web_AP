<?php

namespace App\Controllers;

use App\Models\Curso;
use App\Models\Noticia;
use App\Models\Grado;
use App\Models\Estudiante;
use App\Models\Docente;
use App\Router;


class NoticiaController{

    // Vista principal del elemento.
    public static function index(Router $router){
        try{
            if($_POST){
                header("Location: /curso");
                exit;
            }
            $cursoId = $_GET['id'];
            // $cursoActual = Curso::findCurso($cursoId);
            $list_noticias = Noticia::findNoticia($cursoId);

            $router->renderView("noticia/index", ['list_noticias'=>$list_noticias, 'cursoId' => $cursoId]);
            // var_dump($list_noticias);

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
                Noticia::create($titulo, $desciption, $cursoId, $fecha);

                // finalmente volvemos a la vista index del elemento.
                header("Location: /noticia?id=$cursoId");
                exit;

            }
            // $list_cursos = Curso::allCursos();
            // $id = $_GET['id'];
            $cursoId = $_GET['id'];
            // var_dump($cursoId);
            $cursoActual = Curso::findCurso($cursoId);

            // llamamos a la función renderView quien recibe una vista y parámetros a utilizar en la vista.
            $router->renderView("/noticia/create", ['cursoActual' => $cursoActual]);

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
//             Noticia::delete($id);

//             // redirecionamos al index del elemento.
//             header("Location: /noticia");
//             exit;

//         }catch(\Exception $ex){

//             // En caso de ocurrir algun problema se captura la excepcion y se redirige al index.
//             $error = $ex->getMessage();

//             // iniciamos el proceso session start para poder asignar la variable error.
//             session_start();
//             $_SESSION['error'] = $error;

//             // redirigimos a la vista index donde se mostrará el error ocurrido.
//             header("Location: /noticia");
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

//                 Noticia::update($id, $codigo, $nombre, $gradoId, $diaSemama, $horaInicio,  $horaFin);

//                 // Después de actualizar redirecciona al index del elemento.
//                 header("Location: /noticia");
//                 exit;
//             }

//             //  obtenemos el id del elemento.
//             $id = $_GET['id'];

//             // buscamos el elemento en la DB.
//             $noticia = Noticia::findNoticia($id);
// //            var_dump($noticia);
//             $idGrado = $noticia->getGradoId();

//             $list_grados = Grado::allGrados();

// //            var_dump($list_grados);
//             $gradoActual = Grado::findGrado($idGrado);
// //            var_dump($gradoActual);
//             // Enviamos la ruta y parámetros al renderView.
//             $router->renderView("/noticia/update",['noticia'=>$noticia, 'list_grados' => $list_grados, 'gradoActual'=>$gradoActual]);

//         }catch(\Exception $ex){

//             // En caso de ocurrir algun problema se captura la excepcion y se redirige al index.
//             $error = $ex->getMessage();

//             // iniciamos el proceso session start para poder asignar la variable error.
//             session_start();
//             $_SESSION['error'] = $error;

//             // redirigimos a la vista index donde se mostrará el error ocurrido.
//             header("Location: /noticia");
//         }
//     }



//     public static function find(Router $router){
//         try{

//             // En caso de recibir POST, vuelve al index (btn Back).
//             if($_POST){
//                 header("Location: /noticia");
//                 exit;
//             }
// //            echo "LKBKBLK";
//             // Captura el id del elemento y lo envía al Model para proceder a la DB.
//             $id = $_GET['id'];
//             $noticiaId = $id;
//             $list_estudiantes = Estudiante::estudiantesPorNoticia($id);
//             $docente = Docente::docentePorNoticia($id);
// //            var_dump($docente);

// //            var_dump($list_estudiantes);


//             $router->renderView("noticia/find", ['list_estudiantes'=>$list_estudiantes, 'docente'=>$docente, 'noticiaId'=>$noticiaId]);

//         }catch(\Exception $ex){

//             // En caso de ocurrir algun problema se captura la excepcion y se redirige al index.
//             $error = $ex->getMessage();

//             // iniciamos el proceso session start para poder asignar la variable error.
//             session_start();
//             $_SESSION['error'] = $error;

//             // redirigimos a la vista index donde se mostrará el error ocurrido.
//             header("Location: /noticia");
//         }
//     }

}

?>