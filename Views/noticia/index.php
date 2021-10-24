
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
<div class="section section-notifications">
    <div class="container-noticia mb-5">
        <h4>Noticias</h4>
    </div>
    <?php 
    // SOLO EL ADMIN TIENE ESTE ACCESSO.
        if ($_SESSION['user'] == 'profesor' || $_SESSION['user'] == 'administrador') { ?>
            <a name="newNoticia" id="newNoticia" class="btn new-btn green-blue" href="noticia/create?id=<?php echo $cursoId?>" role="button">New</a>
    <?php } ?>
    <!-- <div class="alert alert-success" role="alert">
        <div class="container-noticia">
            <div class="alert-icon">
                <i class="now-ui-icons ui-2_like"></i>
            </div>
            <strong>Well done!</strong> You successfully read this important alert message.
        </div>
    </div> -->
        <?php   
        // var_dump($list_noticias);
        // if (!empty($list_noticias)) {
            foreach ($list_noticias as $noticia){
                // echo "IHOÑ";
                ?>
                <div class="alert alert-info" role="alert">
                    <div class="container-noticia">
                        <div class="alert-icon">
                            <i class="now-ui-icons travel_info"></i>
                        </div>

                        <strong> <?php echo $noticia->getTitulo()?> </strong> <br>
                        <strong> <?php echo $noticia->getFecha()?> </strong> <br>
                        <?php echo $noticia->getDescripcion()?>
                    </div>
                </div>
            <?php }
        // }else{echo "IHOILHIP";}
         ?>
    
    <!-- <div class="alert alert-warning" role="alert">
        <div class="container-noticia">
            <div class="alert-icon">
                <i class="now-ui-icons ui-1_bell-53"></i>
            </div>
            <strong>Warning!</strong> Better check yourself, you're not looking too good.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    <i class="now-ui-icons ui-1_simple-remove"></i>
                </span>
            </button>
        </div>
    </div>
    <div class="alert alert-danger" role="alert">
        <div class="container-noticia">
            <div class="alert-icon">
                <i class="now-ui-icons objects_support-17"></i>
            </div>
            <strong>Oh snap!</strong> Change a few things up and try submitting again.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    <i class="now-ui-icons ui-1_simple-remove"></i>
                </span>
            </button>
        </div>
    </div> 
-->
</div>
                                                    
<footer class="footer text-center ">
    <a class="btn btn-cancel grey" href="/curso">VOLVER</a>
</footer>
                                                                                        