<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/../css/login.css">
    <title>LOGIN</title>
</head>
<body>
<?php
  // Captura errores.
    startSession();
    if (isset($_SESSION['error'])){?>
        <script>
            const exception = "<?php echo $_SESSION['error'];?>"
            alert(exception);
        </script>
    <?php
        // Finalmente se cierra este Session para que no quede en segundo plano sin necesidad. 
        unset($_SESSION['error']); } ?> 

  <section class="center">
    <div class="login">
        <h2 class="login-header">Log in</h2>
        <form action="/login" method="post" class="login-container">
            <p><input type="text" placeholder="Correo" name="correo" id="correo" required></p>
            <p><input type="password" placeholder="Password" name="password" id="password" required></p>
            <p><input type="submit" value="Log in"></p>
        </form>
    </div>
    </section>
</body>
</html>