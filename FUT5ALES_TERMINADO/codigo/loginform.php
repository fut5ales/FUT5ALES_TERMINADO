
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Inicio de Sesión</title>
</head>
<body>
    <header>
        <label class="bar" for="check">
            <input type="checkbox" id="check">
        
            <span class="top"></span>
            <span class="middle"></span>
            <span class="bottom"></span>
        </label>
            <a href="index.php"><img class ="logos" src="fotos_logos/logo.png">
          </a>
        
        <div>
            <a href="productos-favoritos.hmtl">
              <img class= "icon" src= "fotos_logos/heart-solid.svg"></a>
            <a href="shopping-cart.hmtl">
              <img class= "icon" src= "fotos_logos/cart-shopping-solid.svg"></a>
            <a href="loginform.php">
              <img class = "icon" src = "fotos_logos/user-solid.svg"></a>
        </div>

        </header>

<div class = "login-container">
    <h2>INICIO DE SESION</h2>
    <form class="form" action = "login.php" method = "post">
      <span class="input-span" >
        <label for="Usuario" class="label">Usuario</label>
        <input type="Usuario" name="Usuario" id="Usuario" required placeholder="Ingrese su Usuario"/></span>
      <span class="input-span">
        <label for="Contraseña" class="label">Contraseña</label>
        <input type="Contraseña" name="Contraseña" id="Contraseña" required placeholder="Ingrese su Contraseña"
      /> <?php if(isset($_GET['error']) && $_GET['error'] == 1){ ?>
                <label for="">Nombre de usuario o Contraseña incorrecta</label> <?php } ?></span>
      <span class="span"><a href="#">Forgot password?</a></span>
      <input class="submit" type="submit" value="Log in" />
      <span class="span">Don't have an account? <a href="registerform.php">Sign up</a></span>
    </form>
</div>
            
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
