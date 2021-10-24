<?php

require_once __DIR__."/vendor/autoload.php";

use App\Router;
use App\Controllers\HomeController;
use App\Controllers\CursosController;
use App\Controllers\DocenteController;
use App\Controllers\EstudianteController;
use App\Controllers\NoticiaController;
use App\Controllers\TareaController;
use App\Controllers\LoginController;

$router = new Router();

// home
$router->get('/', [HomeController::class, 'index']);



// curso
$router->get('/curso', [CursosController::class, 'index']);
$router->get('/curso/create', [CursosController::class, 'create']);
$router->post('/curso/create', [CursosController::class, 'create']);
$router->get('/curso/update', [CursosController::class, 'update']);
$router->post('/curso/update', [CursosController::class, 'update']);
$router->get('/curso/delete', [CursosController::class, 'delete']);
$router->get('/curso/find', [CursosController::class, 'find']);
$router->post('/curso/find', [CursosController::class, 'find']);
$router->get('/curso/asignar', [CursosController::class, 'asignar']);
$router->post('/curso/asignar', [CursosController::class, 'asignar']);

// noticia
$router->get('/noticia', [NoticiaController::class, 'index']);
$router->get('/noticia/create', [NoticiaController::class, 'create']);
$router->post('/noticia/create', [NoticiaController::class, 'create']);
$router->get('/noticia/update', [NoticiaController::class, 'update']);
$router->post('/noticia/update', [NoticiaController::class, 'update']);
$router->get('/noticia/delete', [NoticiaController::class, 'delete']);
$router->get('/noticia/find', [NoticiaController::class, 'find']);
$router->post('/noticia/find', [NoticiaController::class, 'find']);

// tarea
$router->get('/tarea', [TareaController::class, 'index']);
$router->get('/tarea/create', [TareaController::class, 'create']);
$router->post('/tarea/create', [TareaController::class, 'create']);
$router->get('/tarea/update', [TareaController::class, 'update']);
$router->post('/tarea/update', [TareaController::class, 'update']);
$router->get('/tarea/delete', [TareaController::class, 'delete']);
$router->get('/tarea/find', [TareaController::class, 'find']);
$router->post('/tarea/find', [TareaController::class, 'find']);

// docente
$router->get('/docente', [DocenteController::class, 'index']);
$router->get('/docente/create', [DocenteController::class, 'create']);
$router->post('/docente/create', [DocenteController::class, 'create']);
$router->get('/docente/update', [DocenteController::class, 'update']);
$router->post('/docente/update', [DocenteController::class, 'update']);
$router->get('/docente/delete', [DocenteController::class, 'delete']);
$router->get('/docente/find', [DocenteController::class, 'find']);
$router->post('/docente/find', [DocenteController::class, 'find']);
$router->get('/docente/asignar', [DocenteController::class, 'asignarACurso']);
$router->get('/docente/eliminarDeCurso', [DocenteController::class, 'eliminarDeCurso']);

// estudiante
$router->get('/estudiante', [EstudianteController::class, 'index']);
$router->get('/estudiante/create', [EstudianteController::class, 'create']);
$router->post('/estudiante/create', [EstudianteController::class, 'create']);
$router->get('/estudiante/update', [EstudianteController::class, 'update']);
$router->post('/estudiante/update', [EstudianteController::class, 'update']);
$router->get('/estudiante/delete', [EstudianteController::class, 'delete']);
$router->get('/estudiante/find', [EstudianteController::class, 'find']);
$router->post('/estudiante/find', [EstudianteController::class, 'find']);
$router->get('/estudiante/asignar', [EstudianteController::class, 'asignarACurso']);
$router->get('/estudiante/eliminarDeCurso', [EstudianteController::class, 'eliminarDeCurso']);

// login
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

// Detecta cuál es la dirección que se está llamando.
$router->resolve();
?>