<!-- container -->
<!-- <div class="container"> -->

    <div class="title">Create new estudiante</div>

    <!-- content -->
    <div class="content">

      <!-- form -->
      <form action="/estudiante/create" method="post">

        <!-- element details -->
        <div class="element-details">

          <!-- input box -->
          <div class="input-box">
            <span class="details">Nombre</span>
            <input type="text" placeholder="Enter name" name="nombre" id="nombre" required>
          </div> <!-- end of input box -->

          <!-- input box -->
          <div class="input-box">
            <span class="details">Apellido</span>
            <input type="text" placeholder="Enter last name" name="apellido" id="apellido" required>
          </div> <!-- end of input box -->

          <!-- input box -->
          <div class="input-box">
            <span class="details">Segundo Apellido</span>
            <input type="text" placeholder="Segundo apellido" name="segundoApellido" id="segundoApellido" required>
          </div> <!-- end of input box -->

            <!-- input box -->
            <!-- <div class="input-box">
                <span class="details">Password</span>
                <input type="text" placeholder="Enter password" name="password" id="password" required>
            </div>  -->
              <!-- end of input box -->

            <!-- input box -->
            <div class="input-box">
                <span class="details">Cedula</span>
                <input type="text" placeholder="Ingrese la cédula" name="cedula" id="cedula" required>
            </div> <!-- end of input box -->

            <!-- input box -->
            <div class="input-box">
                <span class="details">Correo</span>
                <input type="text" placeholder="Enter email" name="correo" id="correo" required>
            </div> <!-- end of input box -->

            <!-- input box -->
            <div class="input-box">
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
            </div> <!-- end of input box -->



        </div><!-- end of element details -->



        
        <div class="button">
          <input type="submit" value="CREATE">
          <a href="/estudiante" class="btn btn-cancel grey">CANCEL</a>
        </div>

      </form> <!-- end of form -->
    </div> <!-- end of content -->
  <!-- </div> end of container -->