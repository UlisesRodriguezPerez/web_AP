<form action="/curso/pdfDocente" method="post">
    <?php ob_start(); ?>

    <!-- content -->
    <div class="content">
        <!-- table -->
        <table class="table">
            <!-- thead -->
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cedula</th>
                <th>Correo</th>
                <th>Grado</th>
            </tr>
            </thead> <!-- end thead -->

            <!-- body -->
            <tbody>
            <?php
                if(isset($list_estudiantes))
                    foreach ($list_estudiantes as $estudiante){?>
                        <tr>
                            <td data-label="Nombre"> <?php echo $estudiante->getNombre() ?> </td>
                            <td data-label="Apellido"> <?php echo $estudiante->getApellido() ?> </td>
                            <td data-label="Cedula"> <?php echo $estudiante->getCedula() ?> </td>
                            <td data-label="Correo"> <?php echo $estudiante->getCorreo() ?> </td>
                            <td data-label="Grado"> <?php echo $estudiante->getGrado() ?> </td>
                        </tr>
                    <?php } ?>
            </tbody> <!-- end body -->
        </table> <!-- end table -->

        <!-- <div class="button"> -->
        <!-- <input type="submit" value="Back"> -->
            <!-- <a href="/curso" class="btn btn-cancel grey">BACK</a> -->
        <!-- </div> -->
    </div>

    <?php 
        $html = ob_get_clean();
        startSession();
        $_SESSION['pdf'] = $html;
        echo $_SESSION["pdf"];
    ?>
    <input type="text" name="cursoId" id="cursoId" value="<?php echo $cursoId ?>" style="display: none;">
    <input type="text" name="idDocente" id="idDocente" value="<?php echo $idDocente ?>" style="display: none;">
    <div class="button">
        <input type="submit" value="Enviar">
    </div>
</form> <!-- enf of form -->