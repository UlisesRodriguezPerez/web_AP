<!-- container -->
<!-- <div class="container"> -->
  <div 
    class="title">Curso information
  </div>
    <!-- content -->
    <div class="content">

      <form action="/curso/find" method="post">

          <div><h2>Profesor</h2></div>
          <!-- table -->
          <table class="table">

              <!-- thead -->
              <thead>
              <tr>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Cedula</th>
                  <th>Correo</th>
                  <th>Calificación</th>
                  <th>Actions</th>
              </tr>
              </thead> <!-- end thead -->

              <!-- body -->
              <tbody>
                  <?php
                  if(isset($docente)){ ?>
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
                                      <a href="/docente/find?id=<?php echo $docente->getId() ?>" class="btn green fas fa-eye"></a>
                                      <?php
                                      // SOLO EL ADMIN TIENE ESTE ACCESSO.
                                      if ($_SESSION['user'] == 'administrador') { ?>
                                          <a href="/docente/eliminarDeCurso?id=<?php echo $docente->getIdDocente() ?>&idCurso=<?php echo $cursoId?>" class="btn red fas fa-trash"></a>
                                      <?php } ?>
                                  </div> <!-- end group -->
                              </td> <!-- end action -->
                          </tr>
                      <?php } ?>

              </tbody> <!-- end body -->
          </table> <!-- end table -->

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
                  <th>Actions</th>
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
                              <!-- actions -->
                              <!-- contiene los botones de las vistas -->
                              <td data-label="Actions">
                                  <!-- gruop -->
                                  <div class="btn-group" role="group">
                                      <a href="/estudiante/find?id=<?php echo $estudiante->getId() ?>" class="btn green fas fa-eye"></a>
                                      <?php
                                      // SOLO EL ADMIN TIENE ESTE ACCESSO.
                                      if ($_SESSION['user'] == 'administrador') { ?>
                                          <a href="/estudiante/eliminarDeCurso?id=<?php echo $estudiante->getIdEstudiante() ?>&idCurso=<?php echo $cursoId?>" class="btn red fas fa-trash"></a>
                                      <?php } ?>
                                  </div> <!-- end group -->
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