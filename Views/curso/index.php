<?php 
    // En caso de haber un error, se almacena en $_SESSION y se recibe en la vista para mostrar la alerta.
    
    // Se inicia el session
    // session_start();
    if (isset($_SESSION['error'])){?>
        <script>
            const exception = "<?php echo $_SESSION['error'];?>"
            alert(exception);
        </script>
    <?php
        // Finalmente se cierra este Session para que no quede en segundo plano sin necesidad. 
        } unset($_SESSION['error']);?> 


<!-- table -->
<table class="table">
    <?php 
    // SOLO EL ADMIN TIENE ESTE ACCESSO.
        if ($_SESSION['user'] == 'administrador') { ?>
            <a name="newCurso" id="newCurso" class="btn new-btn green-blue" href="curso/create" role="button">New</a>
    <?php } ?>
    
    <!-- thead -->
    <thead>
        <tr>
            <th>Name</th>
            <th>Code</th>
            <th>Hora Inicio</th>
            <th>Hora Fin</th>
            <th>Dia</th>
            <th>Grado</th>
            <th>Action</th>
        </tr>
    </thead> <!-- end thead -->

    <!-- body -->
    <tbody>
        <?php   
            // Recibimos una lista de elementos y los recorremos para irlos mostrando en la tabla. 
        if (!empty($list_cursos)) {
            foreach ($list_cursos as $curso){?>
                <tr>
                    <td data-label="Name"> <?php echo $curso->getNombre() ?> </td>
                    <td data-label="Code"> <?php echo $curso->getCodigo() ?> </td>
                    <td data-label="Hora Inicio"> <?php echo $curso->getHoraInicio() ?> </td>
                    <td data-label="Hora Fin"> <?php echo $curso->getHoraFin() ?> </td>
                    <td data-label="Día"> <?php echo $curso->getDiaSemana() ?> </td>
                    <td data-label="Grado"> <?php echo $curso->getGrado($curso->getGradoId()) ?> </td>

                    <!-- actions -->
                    <!-- contiene los botones de las vistas -->
                    <td data-label="Actions">
                        <!-- gruop -->
                        <div class="btn-group" role="group">
                            <a href="curso/find?id=<?php echo $curso->getId() ?>" class="btn green fas fa-eye"></a>

                            <?php
                            // SOLO EL ADMIN TIENE ESTE ACCESSO.
                                if ($_SESSION['user'] == 'administrador') { ?>
                                        <a href="curso/update?id=<?php echo $curso->getId() ?>" class="btn yellow fas fa-pen"></a>

                                        <!-- e btn delete llama una funciónd js para mostrar una alerta sobre si desea eliminar o no el elemento.-->
                                        <a href="curso/delete?id=<?php echo $curso->getId() ?>" class="btn red fas fa-trash" onclick="return confirmDelete('o','curso')" ></a>

                                    <a href="#" class="btn ">Asignar</a>

                            <?php } ?>
                            </div> <!-- end group -->
                    </td> <!-- end action -->
                </tr>
            <?php }
        } ?>
    </tbody> <!-- end body -->
</table> <!-- end table -->