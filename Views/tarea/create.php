<!-- container -->
<!-- <div class="container"> -->

<div class="title">Create new tarea</div>

<!-- content -->
<div class="content">

  <!-- form -->
  <form action="/tarea/create" method="post">

    <!-- element details -->
    <div class="element-details">

      <!-- input box -->
      <div class="input-box">
        <span class="details">Titulo</span>
        <input type="text" placeholder="Enter name" name="titulo" id="titulo" required>
      </div> <!-- end of input box -->

      <!-- input box -->
      <div class="input-box">
        <span class="details">Descripción</span>
        <input type="text" placeholder="Enter description" name="description" id="description" required>
      </div> <!-- end of input box -->

        <!-- input box -->
        <div class="input-box">
            <span class="details">Fecha entrega</span>
            <input type="date" placeholder="fecha" name="fecha" id="fecha" required>
        </div> <!-- end of input box -->
        <!-- input box -->
        <div class="input-box" style="display: none">
            <span class="details">Curso</span>
            <input type="text"  name="curso_id" id="curso_id" value="<?php echo $cursoId ?>" >
        </div> <!-- end of input box -->

    </div><!-- end of element details -->




    
    <div class="button">
      <input type="submit" value="CREATE">
      <a href="/tarea?id=<?php echo $cursoId ?>" class="btn btn-cancel grey">CANCEL</a>
    </div>

  </form> <!-- end of form -->
</div> <!-- end of content -->
<!-- </div> end of container -->