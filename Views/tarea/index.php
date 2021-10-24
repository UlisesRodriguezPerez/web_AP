
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
<div class="section section-notifications">
    <div class="container-noticia mb-5">
        <h4>Tareas</h4>
    </div>
    <?php 
    // SOLO EL ADMIN TIENE ESTE ACCESSO.
        if ($_SESSION['user'] == 'profesor' || $_SESSION['user'] == 'administrador') { ?>
            <a name="newTarea" id="newTarea" class="btn new-btn green-blue" href="tarea/create?id=<?php echo $cursoId?>" role="button">New</a>
    <?php } ?>
    <!-- <div class="alert alert-success" role="alert">
        <div class="container-tarea">
            <div class="alert-icon">
                <i class="now-ui-icons ui-2_like"></i>
            </div>
            <strong>Well done!</strong> You successfully read this important alert message.
        </div>
    </div> -->
        <?php   
        // var_dump($list_tareas);
        // if (!empty($list_tareas)) {
            foreach ($list_tareas as $tarea){
                // echo "IHOÑ";
                ?>
                <div class="alert alert-info" role="alert">
                    <div class="container-noticia">
                        <div class="alert-icon">
                            <i class="now-ui-icons travel_info"></i>
                        </div>

                        FECHA ENTREGA: <strong> <?php echo $tarea->getFecha()?> </strong> <br>
                        TÍTULO: <strong> <?php echo $tarea->getTitulo()?> </strong> <br>
                        DESCIPCIÓN: <?php echo $tarea->getDescripcion()?> <br>
                        ID: <?php echo $tarea->getCodigoID()?>
                    </div>
                </div>
            <?php }
         ?>
</div>
                                                    
<footer class="footer text-center ">
    <a class="btn btn-cancel grey" href="/curso">VOLVER</a>
</footer>
                                                                                        