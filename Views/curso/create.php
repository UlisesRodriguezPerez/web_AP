<!-- container -->
<!-- <div class="container"> -->

    <div class="title">Create new curso</div>

    <!-- content -->
    <div class="content">

      <!-- form -->
      <form action="/curso/create" method="post">

        <!-- element details -->
        <div class="element-details">

          <!-- input box -->
          <div class="input-box">
            <span class="details">Name</span>
            <input type="text" placeholder="Enter name" name="name" id="name" required>
          </div> <!-- end of input box -->

          <!-- input box -->
          <div class="input-box">
            <span class="details">Code</span>
            <input type="text" placeholder="Enter code" name="code" id="code" required>
          </div> <!-- end of input box -->

          <!-- input box -->
          <div class="input-box">
              <span class="details">Día de la semana</span>
              <input type="text" placeholder="ingrese el día" name="dia_semana" id="dia_semana" required>
          </div> <!-- end of input box -->

            <!-- input box -->
            <div class="input-box">
                <span class="details">Hora de inicio</span>
                <input type="text" placeholder="hora inicio" name="hora_inicio" id="hora_inicio" required>
            </div> <!-- end of input box -->

            <!-- input box -->
            <div class="input-box">
                <span class="details">Hora de fin</span>
                <input type="text" placeholder="hora fin" name="hora_fin" id="hora_fin" required>
            </div> <!-- end of input box -->

        </div><!-- end of element details -->

          <!-- select -->
          <select class="select" name="grado_id" id="grado_id" required>
              <option class="select-option"selected value="">Seleccione un grado</option>

              <!-- cargamos todas las compañías disponibles. -->
              <?php if (isset($list_grados)) {
                  foreach ($list_grados as $grado){ ?>
                      <option value='<?php echo $grado->getId() ?>'> <?php echo $grado->getGrado()?></option>;
                  <?php }
              } ?>
          </select> <!-- end of select -->


        
        <div class="button">
          <input type="submit" value="CREATE">
          <a href="/curso" class="btn btn-cancel grey">CANCEL</a>
        </div>

      </form> <!-- end of form -->
    </div> <!-- end of content -->
  <!-- </div> end of container -->