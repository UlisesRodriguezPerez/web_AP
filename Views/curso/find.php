<!-- container -->
<!-- <div class="container"> -->
  <div 
    class="title">Curso information
  </div>
    <!-- content -->
    <div class="content">

      <form action="/curso/find" method="post">

          <div class="element-details">

              <!-- input box -->
              <div class="input-box">
                  <span class="details">Name</span>
                  <input type="text" readonly value="<?php echo $curso->getNombre() ?>" name="name" id="name" >
              </div> <!-- end of input box -->

              <!-- input box -->
              <div class="input-box">
                  <span class="details">Code</span>
                  <input type="text" readonly value="<?php echo $curso->getCodigo() ?>" name="code" id="code" >
              </div> <!-- end of input box -->

              <!-- input box -->
              <div class="input-box">
                  <span class="details">Día de la semana</span>
                  <input type="text" readonly value="<?php echo $curso->getDiaSemana() ?>" name="dia_semana" id="dia_semana" >
              </div> <!-- end of input box -->

              <!-- input box -->
              <div class="input-box">
                  <span class="details">Hora de inicio</span>
                  <input type="text" readonly value="<?php echo $curso->getHoraInicio() ?>" name="hora_inicio" id="hora_inicio" >
              </div> <!-- end of input box -->

              <!-- input box -->
              <div class="input-box">
                  <span class="details">Hora de fin</span>
                  <input type="text" readonly value="<?php echo $curso->getHoraFin() ?>" name="hora_fin" id="hora_fin" >
              </div> <!-- end of input box -->

              <!-- input box -->
              <div class="input-box">
                  <span class="details">Grado</span>
                  <input type="text" readonly value="<?php echo $gradoActual->getGrado() ?>" >
              </div> <!-- end of input box -->

          </div><!-- end of element details -->


        <div class="button">
          <input type="submit" value="Back">
        </div>
        
      </form> <!-- enf of form -->
    </div> <!-- end of content -->
<!-- </div> end of container -->