<!-- <div class="container"> -->
<div class="title">Actualizar Estudiante</div>


<!-- content -->
<div class="content">

    <!-- Form update -->
    <form action="/estudiante/update" method="post">
        <!-- element details -->
        <div class="element-details">

            <!-- input box -->
            <div class="input-box">
                <span class="details">Nombre</span>
                <input type="text" placeholder="Enter name" value="<?php echo $estudiante->getNombre() ?>" name="nombre" id="namnombre" required>
            </div> <!-- end of input box -->

            <!-- input box -->
            <div class="input-box">
                <span class="details">Apellido</span>
                <input type="text" placeholder="Enter last name" value="<?php echo $estudiante->getApellido() ?>" name="apellido" id="apellido" required>
            </div> <!-- end of input box -->

            <!-- input box -->
            <div class="input-box">
                <span class="details">Password</span>
                <input type="text" placeholder="ingrese la contraseña" value="<?php echo $estudiante->getPassword() ?>" name="password" id="password" required>
            </div> <!-- end of input box -->

            <!-- input box -->
            <div class="input-box">
                <span class="details">Cedula</span>
                <input type="text" placeholder="Cedula" value="<?php echo $estudiante->getCedula() ?>" name="cedula" id="cedula" required>
            </div> <!-- end of input box -->

            <!-- input box -->
            <div class="input-box">
                <span class="details">Correo</span>
                <input type="text" placeholder="Correo" value="<?php echo $estudiante->getCorreo() ?>" name="correo" id="correo" required>
            </div> <!-- end of input box -->

            <!-- input box -->
            <div class="input-box">
                <div class="input-box">
                    <span class="details">Grado</span>
                    <!-- select -->
                    <select class="select" name="grado_id" id="grado_id" required>
                        <option class="select-option"selected value="<?php echo $gradoActual->getId() ?>"><?php echo $gradoActual->getGrado()?></option>

                        <!-- cargamos todas las compañías disponibles. -->
                        <?php if (isset($list_grados)) {
                            foreach ($list_grados as $grado){ ?>
                                <option value='<?php echo $grado->getId() ?>'> <?php echo $grado->getGrado()?></option>;
                            <?php }
                        } ?>
                    </select> <!-- end of select -->
                </div><!-- end of input box -->
            </div> <!-- end of input box -->

        </div><!-- end of element details -->

        <div class="button">
            <input type="submit" value="UPDATE">
            <a href="/estudiante" class="btn btn-cancel grey">CANCEL</a>
        </div>
        <!-- Ocultamos el ID . -->
        <input type="text" hidden placeholder="Id estudiante" value="<?php echo $estudiante->getId() ?>" name="id" id="id" required>

    </form><!-- end of form update -->
</div> <!-- end of content -->
<!-- </div> -->