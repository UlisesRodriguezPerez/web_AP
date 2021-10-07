<!-- <div class="container"> -->
<div class="title">Actualizar Docente</div>


<!-- content -->
<div class="content">

    <!-- Form update -->
    <form action="/docente/update" method="post">
        <!-- element details -->
        <div class="element-details">

            <!-- input box -->
            <div class="input-box">
                <span class="details">Nombre</span>
                <input type="text" placeholder="Enter name" value="<?php echo $docente->getNombre() ?>" name="nombre" id="namnombre" required>
            </div> <!-- end of input box -->

            <!-- input box -->
            <div class="input-box">
                <span class="details">Apellido</span>
                <input type="text" placeholder="Enter last name" value="<?php echo $docente->getApellido() ?>" name="apellido" id="apellido" required>
            </div> <!-- end of input box -->

            <!-- input box -->
            <div class="input-box">
                <span class="details">Segundo Apellido</span>
                <input type="text" placeholder="Segundo apellido" value="<?php echo $docente->getSegundoApellido() ?>" name="segundoApellido" id="segundoApellido" required>
            </div> <!-- end of input box -->

            <!-- input box -->
            <div class="input-box">
                <span class="details">Password</span>
                <input type="text" placeholder="ingrese la contraseña" value="<?php echo $docente->getPassword() ?>" name="password" id="password" required>
            </div> <!-- end of input box -->

            <!-- input box -->
            <div class="input-box">
                <span class="details">Cedula</span>
                <input type="text" placeholder="Cedula" value="<?php echo $docente->getCedula() ?>" name="cedula" id="cedula" required>
            </div> <!-- end of input box -->

            <!-- input box -->
            <div class="input-box">
                <span class="details">Correo</span>
                <input type="text" placeholder="Correo" value="<?php echo $docente->getCorreo() ?>" name="correo" id="correo" required>
            </div> <!-- end of input box -->


        </div><!-- end of element details -->

        <div class="button">
            <input type="submit" value="UPDATE">
            <a href="/docente" class="btn btn-cancel grey">CANCEL</a>
        </div>
        <!-- Ocultamos el ID . -->
        <input type="text" hidden placeholder="Id docente" value="<?php echo $docente->getId() ?>" name="id" id="id" required>

    </form><!-- end of form update -->
</div> <!-- end of content -->
<!-- </div> -->