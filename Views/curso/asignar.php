<!-- container -->
<!-- <div class="container"> -->
<div
        class="title">Asignar a curso
</div>
<br>
<!-- content -->
<div class="content">

    <form action="/curso/asignar" method="post">

        <!-- element details -->
        <div class="element-details">
            <!-- input box -->
            <div class="input-box">
                <!-- select -->
                <div><h2>Profesor</h2></div>
<!--                <span class="details"></span>-->
                <select class="select" name="profesorId" id="profesorId" required>
                    <?php if (isset($docenteActual)) {?>
<!--                        $docenteId = $docenteActual->getIdDocente() ?>-->
                        <option class="select-option"selected value='<?php echo $docenteActual->getIdDocente()?>'>
                            <?php echo $docenteActual->getNombre() . " " . $docenteActual->getApellido()?>
                        </option>

                    <?php }
                        else{ ?>
                        <option class="select-option"selected value="">Seleccione un profesor</option>
                    <?php } ?>

                    <?php if (isset($list_docentes)) {
                        foreach ($list_docentes as $docente){ ?>
                            <option value='<?php echo $docente->getIdDocente() ?>'> <?php echo $docente->getNombre() . " " . $docente->getApellido()?></option>;
                        <?php }
                    } ?>
                </select> <!-- end of select -->
            </div> <!-- end of input box -->

            <!-- input box -->
            <div class="input-box">

                <a href="/docente/asignar?id=<?php echo $docente->getIdDocente()?>&idCurso=<?php echo $cursoId?> " class="btn">Asignar</a>

            </div> <!-- end of input box -->
        </div><!-- end of element details -->

        <br>
        <div><h2>Estudiantes</h2></div>
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
                        <td data-label="Actions">
                            <!-- gruop -->
                            <div class="btn-group" role="group">
                                <a href="/estudiante/asignar?id=<?php echo $estudiante->getIdEstudiante() ?>&idCurso=<?php echo $cursoId?> " class="btn">Asignar</a>
                        </td> <!-- end action -->
                    </tr>
                <?php } ?>
            </tbody> <!-- end body -->
        </table> <!-- end table -->

        <div class="button">
            <input type="submit" value="Back">
            <a href="/curso">BACK Provisional</a>
        </div>

    </form> <!-- enf of form -->
</div> <!-- end of content -->
<!-- </div> end of container -->