
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Registro</title>
</head>
<body>
    <header>
        <label class="bar" for="check">
            <input type="checkbox" id="check">
            <span class="top"></span>
            <span class="middle"></span>
            <span class="bottom"></span>
        </label>
        <a href="index.php"><img class="logos" src="fotos_logos/logo.png"></a>
        <div>
            <a href="productos-favoritos.html">
                <img class="icon" src="fotos_logos/heart-solid.svg">
            </a>
            <a href="shopping-cart.html">
                <img class="icon" src="fotos_logos/cart-shopping-solid.svg">
            </a>
            <a href="loginform.php">
                <img class="icon" src="fotos_logos/user-solid.svg">
            </a>
        </div>
    </header>


    <div class="login-container">
        <h2>REGISTRO</h2>
        <form action="register.php" method="post" class="form">
            <span class="input-span">
                <label for="Nombre" class="label">Usuario</label>
                <input type="text" name="Usuario" id="Nombre" required placeholder="Ingrese su nombre" />
            </span>
            <span class="input-span">
                <label for="Email" class="label">Email</label>
                <?php if(isset($_GET['error']) && $_GET['error'] == 0){ ?>
                    <label for="">Email en uso</label> <?php } ?>
                <input type="email" name="Email" id="Email" required placeholder="Ingrese su email" />
            </span>
            <span class="input-span">
                <label for="Contraseña" class="label">Contraseña</label>
                <input type="password" name="Contraseña" id="Contraseña" required placeholder="Ingrese su contraseña" />
            </span>
            <span class="input-span">
                <label for="ConfirmarContraseña" class="label">Confirmar Contraseña</label>
                <?php if(isset($_GET['error']) && $_GET['error'] == 1){ ?>
                <label for="">Las Contraseñas no coinciden</label> <?php } ?>
                <input type="password" name="ConfirmarContraseña" id="ConfirmarContraseña" required placeholder="Confirme su contraseña" />
            </span>
            <input class="submit" type="submit" value="Submit" />
            <span class="span">¿Ya tienes una cuenta? <a href="loginform.php">Sign in</a></span>
        </form>
        
    </div>
        
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
