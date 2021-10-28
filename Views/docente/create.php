<!-- container -->
<!-- <div class="container"> -->

    <div class="title">Create new docente</div>

    <!-- content -->
    <div class="content">

      <!-- form -->
      <form action="/docente/create" method="post">

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

        </div><!-- end of element details -->



        
        <div class="button">
          <input type="submit" value="CREATE">
          <a href="/docente" class="btn btn-cancel grey">CANCEL</a>
        </div>

      </form> <!-- end of form -->
    </div> <!-- end of content -->
  <!-- </div> end of container -->