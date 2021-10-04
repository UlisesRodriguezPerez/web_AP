<?php 

    // En caso de haber un error, se almacena en $_SESSION y se recibe en la vista para mostrar la alerta.
    
    // Se inicia el session
    // session_start();
    if (!isset($_SESSION['login'])){
        header("Location: /login");
    }
    
    // Captura errores.
    if (isset($_SESSION['error'])){?>
        <script>
            const exception = "<?php echo $_SESSION['error'];?>"
            alert(exception);
        </script>
    <?php
        // Finalmente se cierra este Session para que no quede en segundo plano sin necesidad. 
        unset($_SESSION['error']);} ?> 

    
<!-- PENDIENTE PERSONALIZAR. -->
    <h1 class="h1-home">Welcome <?php echo $_SESSION['user'], " ", $_SESSION['username']; ?>!! </h1>



