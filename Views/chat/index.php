



<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row  d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card card-bordered">
                    <div class="card-header">
                        <h4 class="card-title"><strong>Chat </strong></h4>
                    </div>
                    <div class="ps-container ps-theme-default ps-active-y" id="chat-content" style="overflow-y: scroll !important; height:400px !important;">

                        <?php
                            if (!empty($list_mensajes)) {
                                foreach ($list_mensajes as $mensaje){
                                    if($_SESSION["user_id"] == $mensaje->getUsuarioId()){?>
                                        <div class="media media-chat media-chat-reverse">
                                            <div class="media-body">
                                                <p><?php echo $mensaje->getTexto();?></p>

                                                <!-- <p class="meta"><time datetime="2018">00:06</time></p> -->
                                            </div>
                                        </div>
                                    <?php
                                    }else{ ?>
                                        <div class="media media-chat"> <img class="avatar" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
                                            <div class="media-body">
                                                <p><?php echo $mensaje->getTexto();?></p>
                                                <!-- <p class="meta"><time datetime="2018">23:58</time></p> -->
                                            </div>
                                        </div>
                                    <?php }
                                    } 
                                }?>
                        

                        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                            <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps-scrollbar-y-rail" style="top: 0px; height: 0px; right: 2px;">
                            <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 2px;"></div>
                        </div>
                    </div>
                          <!-- form -->
                        <form action="/mensaje/create" method="post">
                            <div class="publisher bt-1 border-light"> 
                                <img class="avatar avatar-xs" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="..."> 
                                <input class="publisher-input" type="text" placeholder="Escriba un mensaje" name="texto" id="texto"> 
                                <input class="publisher-input" type="text" value="<?php echo $chatId ?>" name="chatId" id="chatId" style="display: none"> 
                                <input class="publisher-input" type="text" value="<?php echo $cursoId ?>" name="cursoId" id="cursoId" style="display: none"> 
                                <input class="publisher-input" type="text" value="<?php echo $_SESSION['user_id'] ?>" name="usuarioId" id="usuarioId" style="display: none"> 
                                <!-- <a class="publisher-btn text-info" href="#" data-abc="true"> -->
                                    <!-- <i class="fa fa-paper-plane"></i></a>  -->
                            </div>

                            <div class="button">
                            <input type="submit" value="ENVIAR">
                            <a href="/curso" class="btn btn-cancel grey">CANCEL</a>
                            </div>

                        </form> <!-- end of form -->
                        
                </div>
            </div>
        </div>
    </div>
</div>
