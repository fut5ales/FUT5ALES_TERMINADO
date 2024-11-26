<?php
// Conexión a la base de datos
$servername = "localhost";
$database = "fut5ales";
$username = "alumno";
$password = "alumnoipm";

$conexion = mysqli_connect($servername, $username, $password, $database); // se crea la conexion


if (!$conexion) {
    die("Conexion fallida: " . mysqli_connect_error());
}
else{
    //insertamos el resultado del formulario
    $query = "select * from producto where  id = ". $_GET['id'].";";
    //esto es la consulta que realizo para saber si la contraseña coincide con el mail y la guardo en la variable query
    $resultado=mysqli_query($conexion, $query);
    //la variable resultado va a guardar el resultado del comando donde se realiza la consulta
    $producto=mysqli_fetch_assoc($resultado);
}
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>Inicio | FUT5ALES</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Sonsie+One" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="posible_producto.css" />
        <link rel="icon" href="fotos_logos/logo.png" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Jersey+10&display=swap" rel="stylesheet">

    </head>

    <body>
        <header>
        <label class="bar" for="check">
            <input type="checkbox" id="check">
        
            <span class="top"></span>
            <span class="middle"></span>
            <span class="bottom"></span>
        </label>
            <a href="index.html"><img class ="logos" src="fotos_logos/logo.png">
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

        <nav class="navegador">
            <div class = "secciones">

                <ul class = "lista">
                <li><a href="futsal.php?categoria=futsal">FUTSAL</a></li>
                <li><a href="futsal.php?categoria=futbol_11">FUTBOL 11</a></li>
                <li><a href="futsal.php?categoria=futbol_5">FUTBOL 5</a></li>
                <li><a href="futsal.php?categoria=accesorios">ACCESORIOS</a></li>

            </div>
            <div class="search">
              <input placeholder="Search" class="search__input" type="text" />
              <button class="search__button">
                <svg
                  viewBox="0 0 16 16"
                  class="bi bi-search"
                  fill="currentColor"
                  height="16"
                  width="16"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"
                  ></path>
                </svg>
              </button>
            </div>
            
      </nav>

    <!-- Contenido del Producto -->
    <div class="producto-container">
        <div class="imagen-producto">
            <img src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>" class="imagen-centrada">
        </div>
        <div class="descripcion-producto">
            <h2><?php echo $producto['nombre']; ?></h2>
            <p><strong>Precio:</strong> $<?php echo $producto['precio']; ?></p>
            <p><strong>Marca:</strong> <?php echo $producto['marca']; ?></p>
            <p><strong>Color:</strong> <?php echo $producto['color']; ?></p>
            <p><strong>Talles Disponibles:</strong> <?php echo $producto['talle']; ?></p>
                        
                    <div class="rating">
                    <input value="5" name="rate" id="star5" type="radio">
                    <label title="text" for="star5"></label>
                    <input value="4" name="rate" id="star4" type="radio">
                    <label title="text" for="star4"></label>
                    <input value="3" name="rate" id="star3" type="radio" checked="">
                    <label title="text" for="star3"></label>
                    <input value="2" name="rate" id="star2" type="radio">
                    <label title="text" for="star2"></label>
                    <input value="1" name="rate" id="star1" type="radio">
                    <label title="text" for="star1"></label>
                    </div>
                </div>  
        
    </div>
    
    <footer class="footer">
        <div class="footer-div1">
            <div class="footer-div-row">
                <div class="footer-div-links">
                    <h4>Marcas</h4>
                    <ul>
                        <li><a href="#"></a></li>
                        <li><a href="#">Nike</a></li>
                        <li><a href="#">Adidas</a></li>
                        <li><a href="#">New Balance</a></li>
                    </ul>
                </div>
                <div class="footer-div-links">
                    <h4>Ayuda</h4>
                    <ul>
                        <li><a href="#">Preguntas</a></li>
                        <li><a href="#">Términos y condiciones</a></li>
                    </ul>
                </div>
                <div class="footer-div-links siguenos">
                    <h4>Nuestras Redes</h4>
                    <div class="footer-social-link">
                        <a href="facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
    const checkBox = document.getElementById("check");
    const navegador = document.querySelector(".navegador");

    checkBox.addEventListener("change", function() {
        if (checkBox.checked) {
            navegador.style.display = "flex";  // Muestra el navegador
        } else {
            navegador.style.display = "none";  // Oculta el navegador
        }
    });
});

    </script>
</body>
</html> 

</body>
</html>
