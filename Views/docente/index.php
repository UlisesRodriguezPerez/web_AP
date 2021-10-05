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
    <a name="newDocente" id="newDocente" class="btn new-btn green-blue" href="docente/create" role="button">New</a>
    
    <!-- thead -->
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Cedula</th>
            <th>Correo</th>
            <th>Calificación</th>
            <th>Action</th>
        </tr>
    </thead> <!-- end thead -->

    <!-- body -->
    <tbody>
        <?php   
            // Recibimos una lista de elementos y los recorremos para irlos mostrando en la tabla.
        if(isset($list_docentes))
            foreach ($list_docentes as $docente){?>
                <tr>
                    <td data-label="Nombre"> <?php echo $docente->getNombre() ?> </td>
                    <td data-label="Apellido"> <?php echo $docente->getApellido() ?> </td>
                    <td data-label="Cedula"> <?php echo $docente->getCedula() ?> </td>
                    <td data-label="Correo"> <?php echo $docente->getCorreo() ?> </td>
                    <td data-label="Calificación"> <?php echo $docente->getCalificacion() ?> </td>
                    
                    <!-- actions -->
                    <!-- contiene los botones de las vistas -->
                    <td data-label="Actions">
                        <!-- gruop -->
                        <div class="btn-group" role="group">
                            <a href="docente/find?id=<?php echo $docente->getId() ?>" class="btn green fas fa-eye"></a>

                            
                            <?php 
                            // SOLO EL ADMIN TIENE ESTE ACCESSO.
                                if ($_SESSION['user'] == 'administrador') { ?>
                                    <a href="docente/update?id=<?php echo $docente->getId() ?>" class="btn yellow fas fa-pen"></a>
                                    <a href="docente/delete?id=<?php echo $docente->getIdDocente() ?>" class="btn red fas fa-trash" onclick="return confirmDelete('e','docente')" > </a>
                                    <a href="docente/cursos?id=<?php echo $docente->getId() ?>" class="btn">Cursos (PENDIENTE)</a>
                            <?php } ?>
                        </div> <!-- end group -->
                    </td> <!-- end action -->
                </tr>
            <?php } ?>
    </tbody> <!-- end body -->
</table> <!-- end table -->