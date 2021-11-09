<!-- container -->
<!-- <div class="container"> -->
  <div 
    class="title">Curso information
  </div>
    <!-- content -->
    <div class="content">

      

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

        <form action="/docente/calificar" method="post">
            <!-- element details -->
            <div class="element-details">
                <!-- input box -->
                <div class="input-box">
                     <span class="details"><strong>Calificación</strong></span>
                    <!-- <input type="number" min="0" max="5"  name="calificacion" id="calificacion" value="0" > -->
                </div> <!-- end of input box -->
                <!-- input box -->
                <div class="input-box">
                    <!-- <span class="details">Calificación</span> -->
                    <!-- <input type="number" min="0" max="5"  name="calificacion" id="calificacion" value="0" > -->
                    <p class="clasificacion">
                           <input id="radio1" type="radio" name="calificacion" value="5" ><!--
                        --><label for="radio1">★</label><!--
                        --><input id="radio2" type="radio" name="calificacion" value="4"><!--
                        --><label for="radio2">★</label><!--
                        --><input id="radio3" type="radio" name="calificacion" value="3"><!--
                        --><label for="radio3">★</label><!--
                        --><input id="radio4" type="radio" name="calificacion" value="2"><!--
                        --><label for="radio4">★</label><!--
                        --><input id="radio5" type="radio" name="calificacion" value="1"><!--
                        --><label for="radio5">★</label>
                    </p>
                    <input type="text" name="profesorId" id="profesorId" value="<?php echo $docente->getIdDocente() ?>" style="display: none;">
                    <input type="text" name="cursoId" id="profcursoIdesorId" value="<?php echo $cursoId ?>" style="display: none;">
                </div> <!-- end of input box -->
            </div><!-- end of element details -->
                
            <div class="button">
                <input type="submit" value="Calificar">
                <!-- <a href="/curso">BACK Provisional</a> -->
            </div>
        </form> <!-- enf of form -->
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
            <!-- <input type="submit" value="Back"> -->
              <a href="/curso" class="btn btn-cancel grey">BACK</a>
          </div>
          <?php
            // SOLO EL ADMIN TIENE ESTE ACCESSO.
            if ($_SESSION['user'] == 'administrador') { ?>
                <div class="button">
                <!-- <input type="submit" value="Back"> -->
                <a href="/curso/pdfDocente?id=<?php echo $cursoId ?>&idDocente=<?php echo $docente->getId() ?>" class="btn btn-cancel grey">Generar PDF</a>
          </div>
            <?php } ?>  
          
        
      
    </div> <!-- end of content -->
<!-- </div> end of container -->