<!-- container -->
<!-- <div class="container"> -->
  <div 
    class="title">Docente
  </div>
    <!-- content -->
    <div class="content">

      <form action="/docente/find" method="post">

        <!-- element details -->
        <div class="element-details">
            <!-- input box -->
            <div class="input-box">
                <span class="details">Nombre</span>
                <input type="text" readonly value="<?php echo $docente->getNombre() ?>" name="nombre" id="nombre" required>
            </div> <!-- end of input box -->

            <!-- input box -->
            <div class="input-box">
                <span class="details">Apellido</span>
                <input type="text" readonly value="<?php echo $docente->getApellido() ?>" name="apellido" id="apellido" required>
            </div> <!-- end of input box -->

            <!-- input box -->
            <div class="input-box">
                <span class="details">Password</span>
                <input type="text" readonly value="<?php echo $docente->getPassword() ?>" name="password" id="password" required>
            </div> <!-- end of input box -->

            <!-- input box -->
            <div class="input-box">
                <span class="details">Cedula</span>
                <input type="text" readonly value="<?php echo $docente->getCedula() ?>" name="cedula" id="cedula" required>
            </div> <!-- end of input box -->

            <!-- input box -->
            <div class="input-box">
                <span class="details">Correo</span>
                <input type="text" readonly value="<?php echo $docente->getCorreo() ?>" name="correo" id="correo" required>
            </div> <!-- end of input box -->

            <!-- input box -->
            <div class="input-box">
                <span class="details">Calificación</span>
                <input type="text" readonly value="<?php echo $docente->getCalificacion() ?>" name="calificacion" id="calificacion" required>
            </div> <!-- end of input box -->

        </div> <!-- end of element details -->

        <div class="button">
          <input type="submit" value="Back">
        </div>
        
      </form> <!-- enf of form -->
    </div> <!-- end of content -->
<!-- </div> end of container -->