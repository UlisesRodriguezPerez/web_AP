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
    <a name="newEstudiante" id="newEstudiante" class="btn new-btn green-blue" href="estudiante/create" role="button">New</a>
    
    <!-- thead -->
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Cedula</th>
            <th>Correo</th>
            <th>Grado</th>
            <th>Action</th>
        </tr>
    </thead> <!-- end thead -->

    <!-- body -->
    <tbody>
        <?php   
            // Recibimos una lista de elementos y los recorremos para irlos mostrando en la tabla.
        if(isset($list_estudiantes))
            foreach ($list_estudiantes as $estudiante){?>
                <tr>
                    <td data-label="Nombre"> <?php echo $estudiante->getNombre() ?> </td>
                    <td data-label="Apellido"> <?php echo $estudiante->getApellido() ?> </td>
                    <td data-label="Cedula"> <?php echo $estudiante->getCedula() ?> </td>
                    <td data-label="Correo"> <?php echo $estudiante->getCorreo() ?> </td>
                    <td data-label="Grado"> <?php echo $estudiante->getGrado() ?> </td>
                    
                    <!-- actions -->
                    <!-- contiene los botones de las vistas -->
                    <td data-label="Actions">
                        <!-- gruop -->
                        <div class="btn-group" role="group">
                            <a href="estudiante/find?id=<?php echo $estudiante->getId() ?>" class="btn green fas fa-eye"></a>

                            
                            <?php 
                            // SOLO EL ADMIN TIENE ESTE ACCESSO.
                                if ($_SESSION['user'] == 'administrador') { ?>
                                    <a href="estudiante/update?id=<?php echo $estudiante->getId() ?>" class="btn yellow fas fa-pen"></a>
                                    <a href="estudiante/delete?id=<?php echo $estudiante->getIdEstudiante() ?>" class="btn red fas fa-trash" onclick="return confirmDelete('e','estudiante')" > </a>
                                    <a href="estudiante/cursos?id=<?php echo $estudiante->getId() ?>" class="btn">Cursos (PENDIENTE)</a>
                            <?php } ?>
                        </div> <!-- end group -->
                    </td> <!-- end action -->
                </tr>
            <?php } ?>
    </tbody> <!-- end body -->
</table> <!-- end table -->