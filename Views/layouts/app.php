<!DOCTYPE html>
<html lang="en">
 <!--head --> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta http-equiv="expires" content="0">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Pragma" CONTENT="no-cache">
    
    <title>Test</title>

    <!-- importamos los estilos -->
    <link rel="stylesheet" type="text/css" href="/../css/styles.css">
    <link rel="stylesheet" type="text/css" href="/../css/header.css">
    <link rel="stylesheet" type="text/css" href="/../css/form.css">
    

    <!-- importamos los js con el atributo defer para que se carguen después del todo. -->
    <script defer src="/../js/header.js"></script>
    <script defer src="/../js/utils.js"></script>

    <!-- Para el icono de menu (responsive) -->
    <script src="https://kit.fontawesome.com/1691e7b94a.js" crossorigin="anonymous"></script>
</head> <!-- end of head -->

<!-- body -->
<body>
    <!-- header -->
    <header class="header">
        <!-- nav -->
        <nav class="nav">
                <!-- el logo redirecciona a la vista principal. -->
            <a href="/" class="logo nav-link" >Logo</a>
            <button class="nav-toggle">
                <i class="fas fa-bars"></i>
            </button>

            <!-- nav menu -->
            <ul class="nav-menu">

                <!-- nav menu item -->
                <li class="nav-menu-item">
                    <a href="/curso" class="nav-menu-link nav-link <?php if(getRouteName() == "curso") echo "nav-menu-link_active";?>">Cursos</a>
                </li> <!-- end nav menu item -->

                <?php
                // SOLO EL ADMIN TIENE ESTE ACCESSO.
                if ($_SESSION['user'] == 'administrador') { ?>
                    <!-- nav menu item -->
                    <li class="nav-menu-item">
                        <a href="/docente" class="nav-menu-link nav-link <?php if(getRouteName() == "docente") echo "nav-menu-link_active";?>">Docentes</a>
                    </li> <!-- end nav menu item -->
                <?php } ?>


                <?php
                // SOLO EL ADMIN TIENE ESTE ACCESSO.
                if ($_SESSION['user'] == 'administrador') { ?>
                    <!-- nav menu item -->
                    <li class="nav-menu-item">
                        <a href="/estudiante" class="nav-menu-link nav-link <?php if(getRouteName() == "estudiante") echo "nav-menu-link_active";?>">Estudiantes</a>
                    </li> <!-- end nav menu item -->
                <?php } ?>

                
                <!-- nav menu item -->
                <li class="nav-menu-item">
                    <a href="/logout" class="nav-menu-link nav-link ">Exit</a>
                </li> <!-- end nav menu item -->

            </ul> <!-- end of nav menu -->
        </nav> <!-- end of nav -->
    </header> <!-- end of header -->

    <!-- Centrar el contenido -->
    <section class="center">
        <!-- content -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- col 12 -->
                <div class="col-12">
                        <!-- Aquí mostramos todas las demás vistas que se pasan por la variable $content -->
                    <?php echo $content ?>
                </div> <!-- end of col 12 -->
            </div> <!-- end of row -->
        </div> <!-- end of content -->
    </section> <!-- end of center -->


</body> <!-- end of body -->
</html>