<!-- <div class="container"> -->
    <div class="title">Update curso</div>


    <!-- content -->
    <div class="content">

      <!-- Form update -->
      <form action="/curso/update" method="post">
          <!-- element details -->
          <div class="element-details">

              <!-- input box -->
              <div class="input-box">
                  <span class="details">Name</span>
                  <input type="text" placeholder="Enter name" value="<?php echo $curso->getNombre() ?>" name="name" id="name" required>
              </div> <!-- end of input box -->

              <!-- input box -->
              <div class="input-box">
                  <span class="details">Code</span>
                  <input type="text" placeholder="Enter code" value="<?php echo $curso->getCodigo() ?>" name="code" id="code" required>
              </div> <!-- end of input box -->

              <!-- input box -->
              <div class="input-box">
                  <span class="details">Día de la semana</span>
                  <input type="text" placeholder="ingrese el día" value="<?php echo $curso->getDiaSemana() ?>" name="dia_semana" id="dia_semana" required>
              </div> <!-- end of input box -->

              <!-- input box -->
              <div class="input-box">
                  <span class="details">Hora de inicio</span>
                  <input type="text" placeholder="hora inicio" value="<?php echo $curso->getHoraInicio() ?>" name="hora_inicio" id="hora_inicio" required>
              </div> <!-- end of input box -->

              <!-- input box -->
              <div class="input-box">
                  <span class="details">Hora de fin</span>
                  <input type="text" placeholder="hora fin" value="<?php echo $curso->getHoraFin() ?>" name="hora_fin" id="hora_fin" required>
              </div> <!-- end of input box -->

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

          </div><!-- end of element details -->

          <!-- input box -->


        <div class="button">
          <input type="submit" value="UPDATE">
          <a href="/curso" class="btn btn-cancel grey">CANCEL</a>
        </div>
          <!-- Ocultamos el ID . -->
          <input type="text" hidden placeholder="ID Curso" value="<?php echo $curso->getId() ?>" name="id" id="id" required>
          
      </form><!-- end of form update -->
    </div> <!-- end of content -->
  <!-- </div> -->